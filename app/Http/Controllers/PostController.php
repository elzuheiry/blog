<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('storeComment');
    }

    public function show(Post $post)
    {
        if(! $post){
            throw new ModelNotFoundException();
        }

        return view('posts.post', [
            'post' => $post,
        ]);   
    }

    public function storeComment(Post $post)
    {
        request()->validate([
            'body' => ['required']
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}