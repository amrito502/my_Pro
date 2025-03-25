<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
        // Display a listing of colors
        public function index()
        {
            $colors = Color::all();
            return view('admin.components.color.index', compact('colors'));
        }
    
        // Show the form for creating a new color
        public function create()
        {
            return view('admin.components.color.create');
        }
    
        // Store a newly created color in the database
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255|unique:colors,name',
                'hex_code' => 'nullable|string|max:7',
                'rgb_code' => 'nullable|string|max:50',
                'description' => 'nullable|string|max:255',
            ]);
    
            Color::create($request->all());
    
            return redirect()->route('colors.index')->with('success', 'Color added successfully');
        }
    
        // Show the form for editing the specified color
        public function edit($id)
        {
            $color = Color::findOrFail($id);
            return view('admin.components.color.edit', compact('color'));
        }
    
        // Update the specified color in the database
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255|unique:colors,name,' . $id,
                'hex_code' => 'nullable|string|max:7',
                'rgb_code' => 'nullable|string|max:50',
                'description' => 'nullable|string|max:255',
            ]);
    
            $color = Color::findOrFail($id);
            $color->update($request->all());
    
            return redirect()->route('colors.index')->with('success', 'Color updated successfully');
        }
    
        // Remove the specified color from the database
        public function destroy($id)
        {
            $color = Color::findOrFail($id);
            $color->delete();
    
            return redirect()->route('colors.index')->with('success', 'Color deleted successfully');
        }
}
