<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('admin.components.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'status' => 'required|in:active,inactive',
        ]);


        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Brand::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $brands = new Brand();
        $brands->name = $request->name;
        $brands->slug = $slug;
        $brands->status = $request->status;
        $brands->user_id = auth()->id();
        $brands->meta_title = $request->meta_title;
        $brands->meta_description = $request->meta_description;
        $brands->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/brands', $fileName);
            $brands->image = $fileName;
        }

        $brands->save();

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.components.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ]);


        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Brand::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = $slug;
        $brand->status = $request->status;
        $brand->user_id = auth()->id();
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
            $destination = 'uploads/brands/' . $brand->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/brands', $fileName);
            $brand->image = $fileName;
        }
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $destination = 'uploads/brands/' . $brand->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
