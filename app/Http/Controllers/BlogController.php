<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function blog_list_front(){
        return view('app.customer.components.blog.blog_list');
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.components.blog.index', compact('blogs'));
    }

    // Show the form to create a new blog
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.components.blog.create', compact('categories'));
    }

    // Store a newly created blog in the database
    public function store(Request $request)
    {
        $request->validate([
            // 'title' => 'required|string',
            // 'short_desc' => 'nullable|string',
            // 'long_desc' => 'nullable|string',
            // 'slug' => 'nullable|string',
            // 'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $blog = new Blog;
        $blog->title = $request->title ?? 'N/A';
        $blog->short_desc = $request->short_desc ?? 'N/A';
        $blog->long_desc = $request->long_desc ?? 'N/A';
        $blog->slug = $slug;
        $blog->status = $request->status ?? 'N/A';
        $blog->blog_category_id = $request->blog_category_id ?? 'N/A';
        $blog->user_id = auth()->id();
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/blog', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show a specific blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.components.blog.show', compact('blog'));
    }

    // Show the form to edit a specific blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.components.blog.edit', compact('blog', 'categories'));
    }

    // Update a specific blog in the database
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $blog->title = $request->title ?? 'N/A';
        $blog->short_desc = $request->short_desc ?? 'N/A';
        $blog->long_desc = $request->long_desc ?? 'N/A';
        $blog->slug = $slug;
        $blog->status = $request->status ?? 'N/A';
        $blog->blog_category_id = $request->blog_category_id ?? 'N/A';
        $blog->user_id = auth()->id();
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        if ($request->hasFile('image')) {
            $destination = 'uploads/category/' . $blog->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/blog', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Delete a specific blog from the database
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
