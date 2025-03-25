<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $data["categories"] = BlogCategory::all();
        return view('admin.components.blogcategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (BlogCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->status = $request->status;
        $category->user_id = auth()->id();
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;

     
        $category->save();
        return redirect()->route('blog_categories.index')->with('success', 'Blog Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data["category"]  = BlogCategory::findOrFail($id);
        return view('admin.components.blogcategory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (BlogCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->status = $request->status;
        $category->user_id = auth()->id();
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;

     
        $category->save();
        return redirect()->route('blog_categories.index')->with('success', 'Blog Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $category = BlogCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('blog_categories.index')->with('success', 'Blog Category deleted successfully.');
    }
}
