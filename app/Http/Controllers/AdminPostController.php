<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['role:admin|user'])->only(['index', 'edit', 'create', 'store', 'destroy']);
        $this->middleware(['permission:post_create'])->only('create');
        $this->middleware(['permission:post_read'])->only('index');
        $this->middleware(['permission:post_update'])->only('edit');
        $this->middleware(['permission:post_delete'])->only('destroy');
    }

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(5)
        ]);
    }

    public function edit(Post $post)
    {
        if(! $post){
            throw new ModelNotFoundException();
        }

        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'ar.*' => ['required', 'min:3'],
            'en.*' => ['required', 'min:3'],
            'ar.title' => ['required', 'min:3', 'max:255', Rule::unique('post_translations', 'title')],
            'en.title' => ['required', 'min:3', 'max:255', Rule::unique('post_translations', 'title')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $file_extension = request("thumbnail") -> getClientOriginalExtension();
        $file_name = time() . "." . $file_extension;
                
        Image::make(request("thumbnail"))->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('pictures-upload/posts/'. $file_name));

        $attributes['thumbnail'] = $file_name;
        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect()->back()->with('success', 'Post Was Published!');
    }


    public function destroy(Post $post)
    {
        if(! $post){
            throw new ModelNotFoundException();
        }

        Storage::disk('public_upload')->delete('/posts/' . $post->thumbnail);

        $post->delete();
        
        return redirect()->route('allPosts')->with('success', 'The Post Was Deleted Successfully.');
    }

    public function update(Post $post)
    {
        // MAKE VALIDATION FOR REQUEST
        $attributes = request()->validate([
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => ['image'],
            'ar.*' => ['required', 'min:3'],
            'en.*' => ['required', 'min:3'],
            'ar.title' => ['required', 'min:3', 'max:255', Rule::unique('post_translations', 'title')->ignore($post->id, 'post_id')],
            'en.title' => ['required', 'min:3', 'max:255', Rule::unique('post_translations', 'title')->ignore($post->id, 'post_id')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        // IF ISSET REQUEST OF THUMBNAIL 
        if( isset($attributes['thumbnail']) ){

            // DELETE THE OLD PICTUER OF POST
            Storage::disk('public_upload')->delete('/posts/' . $post->thumbnail);
            
            // STORAGE THE NEW PICTURE OF POST IN FILES
            $file_extension = request("thumbnail") -> getClientOriginalExtension();
            $file_name = time() . "." . $file_extension;
                    
            Image::make(request("thumbnail"))->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('pictures-upload/posts/'. $file_name));

            // STORAGE THE NEW PICTURE OF POST IN DATABASE
            $attributes['thumbnail'] = $file_name;
        }
        
        // UPDATE THE POSTS WITH NEW VALUES
        $post->update($attributes);

        // REDIRECT TO DASHBOURD OF POSTS WITH FLASH MESSAGE
        return redirect()->route('allPosts')->with('success', 'Post Updated!');
    }
}