<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\District;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Validate the search input
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        $query = $request->input('query');

        // If there is a query, search across multiple models
        if ($query) {
            // Search in products, categories, brands, subcategories, districts, and subdistricts
            $products = Product::where('name', 'like', '%' . $query . '%')->get();
            $categories = Category::where('name', 'like', '%' . $query . '%')->get();
            $brands = Brand::where('name', 'like', '%' . $query . '%')->get();
            $subcategories = SubCategory::where('name', 'like', '%' . $query . '%')->get();
            $districts = District::where('name', 'like', '%' . $query . '%')->get();
            $subdistricts = SubDistrict::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $products = $categories = $brands = $subcategories = $districts = $subdistricts = collect();
        }

        // Return results to the view
        return view('search.results', compact('products', 'categories', 'brands', 'subcategories', 'districts', 'subdistricts', 'query'));
    }
}
