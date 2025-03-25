<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['subCategories'] = SubCategory::with('category')->get();
        return view('admin.components.subcategory.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.components.subcategory.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|in:active,inactive',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->slug = $slug;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;
        $subcategory->user_id = auth()->id();
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/subcategory', $fileName);
            $subcategory->image = $fileName;
        }

        $subcategory->save();

        return redirect()->route('subcategories.index')->with('success', 'SubCategory created successfully.');
    }

    public function edit($id)
    {
        $data['subCategory'] = SubCategory::findOrFail($id);
        $data['categories'] = Category::all();
        return view('admin.components.subcategory.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'status' => 'required|in:active,inactive',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->slug = $slug;
        $subcategory->status = $request->status;
        $subcategory->category_id = $request->category_id;
        $subcategory->user_id = auth()->id();
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        $subcategory->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
            $destination = 'uploads/subcategory/' . $subcategory->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/subcategory', $fileName);
            $subcategory->image = $fileName;
        }


        $subcategory->save();

        return redirect()->route('subcategories.index')->with('success', 'SubCategory updated successfully.');
    }


    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $destination = 'uploads/subcategory/' . $subCategory->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $subCategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'SubCategory deleted successfully.');
    }
}
