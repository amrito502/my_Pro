<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();  // Fetch all sizes
        return view('admin.components.size.index', compact('sizes'));
    }

    // Show the form for creating a new size
    public function create()
    {
        return view('admin.components.size.create');
    }

    // Store a newly created size
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes,name',
            'slug' => 'required|string|max:255|unique:sizes,slug',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        Size::create($request->all());

        return redirect()->route('sizes.index')->with('success', 'Size created successfully');
    }

    // Show the form for editing a size
    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.components.size.edit', compact('size'));
    }

    // Update a size
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes,name,' . $id,
            'slug' => 'required|string|max:255|unique:sizes,slug,' . $id,
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $size = Size::findOrFail($id);
        $size->update($request->all());

        return redirect()->route('sizes.index')->with('success', 'Size updated successfully');
    }

    // Delete a size
    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        return redirect()->route('sizes.index')->with('success', 'Size deleted successfully');
    }
}
