<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.components.company.index', compact('companies'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.components.company.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'linkedine_link' => 'nullable|string',
            'youtube_link' => 'nullable|string',
        ]);

        $company = new Company();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/logo', $fileName);
            $company->logo = $fileName;
        }
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->facebook_link = $request->facebook_link;
        $company->instagram_link = $request->instagram_link;
        $company->linkedine_link = $request->linkedine_link;
        $company->youtube_link = $request->youtube_link;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    // Display the specified resource
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    // Show the form for editing the specified resource
    public function edit(Company $company)
    {
        return view('admin.components.company.edit', compact('company'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'instagram_link' => 'nullable|string',
            'linkedine_link' => 'nullable|string',
            'youtube_link' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $destination = 'uploads/logo/' . $company->logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/logo', $fileName);
            $company->logo = $fileName;
        }
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->facebook_link = $request->facebook_link;
        $company->instagram_link = $request->instagram_link;
        $company->linkedine_link = $request->linkedine_link;
        $company->youtube_link = $request->youtube_link;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
