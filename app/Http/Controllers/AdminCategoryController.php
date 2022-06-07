<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;



class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->only(['index', 'edit', 'create', 'store', 'destroy']);
    }

    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'ar.name' => ['required', 'min:3', 'max:150', Rule::unique('category_translations', 'name')],
            'en.name' => ['required', 'min:3', 'max:150', Rule::unique('category_translations', 'name')],
            'slug' => ['required', 'min:3', 'max:150', Rule::unique('categories', 'slug')],
        ]);

        Category::create($attributes);
        return redirect()->back()->with('success', 'Category Was Published!');
    }

    public function edit(Category $category)
    {
        if(! $category){
            throw new ModelNotFoundException();
        }

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function destroy(Category $category)
    {
        if(! $category){
            throw new ModelNotFoundException();
        }

        $category->delete();    
        return redirect()->route('allCategories')->with('success', 'The Category Was Deleted Successfully.');
    }

    public function update(Category $category)
    {
        
        $attributes = request()->validate([
            'ar.name' => ['required', 'min:3', 'max:150', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')],
            'en.name' => ['required', 'min:3', 'max:150', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')],
            'slug' => ['required', 'min:3', 'max:150', Rule::unique('categories', 'slug')->ignore($category)],
        ]);

        // UPDATE THE POSTS WITH NEW VALUES
        $category->update($attributes);

        // REDIRECT TO DASHBOURD OF POSTS WITH FLASH MESSAGE
        return redirect()->route('allCategories')->with('success', 'Category Updated!');
    }
}