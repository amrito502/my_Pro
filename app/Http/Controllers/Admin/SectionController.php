<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function index()
    {
        $data['sections'] = Section::latest()->get();
        return view('admin.components.section.index', $data);
    }

    
    public function create()
    {
        $data['categories'] = Category::all();
        // $categories = json_decode(json_encode($data['categories']), true);
        // echo "<pre>"; print_r($categories); die;
        return view('admin.components.section.create', $data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $sections = new Section();
        $sections->name = $request->name;
        $sections->status = $request->has('status') ? 1 : 0;
        $sections->category_id = $request->category_id;
        $sections->save();
        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

  
    public function show(Section $section)
    {
        //
    }

  
    public function edit(Section $section)
    {

        $data['section'] = $section;
        $data['categories'] = Category::all();

        return view('admin.components.section.edit', $data);
    }

   
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $section->name = $request->name;
        $section->status = $request->has('status') ? 1 : 0;
        $section->category_id = $request->category_id;
        $section->save();
        return redirect()->route('sections.index')->with('success', 'Section Updated successfully.');
    }

    
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
