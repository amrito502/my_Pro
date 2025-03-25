<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SliderItem;
use Illuminate\Http\Request;
use App\Models\ProductSlider;
use Illuminate\Support\Facades\File;

class ProductSliderController extends Controller
{
    public function index()
    {
        $productSliders = ProductSlider::with('product', 'sliderItems')->paginate(10);
        return view('admin.components.product.index_slider', compact('productSliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view("admin.components.product.create_slider", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:active,inactive',
            'slider_items' => 'required|array|min:4|max:4',
            'slider_items.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slider_items.*.title_1' => 'required|string|max:255',
            'slider_items.*.title_2' => 'required|string|max:255',
            'slider_items.*.title_3' => 'required|string|max:255',
            'slider_items.*.link_4' => 'required|url',
        ]);

        // Create Product Slider
        
        $productSlider = new ProductSlider;
        $productSlider->product_id = $request->product_id;
        $productSlider->status = $request->status;

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/background_image', $fileName);
            $productSlider->background_image = $fileName;
        }

        $productSlider->save();
        

        // Store Slider Items
        foreach ($request->slider_items as $item) {

            if ($item['image']) {
                $image = $item['image'];
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('uploads/products_sliders');

                if (!File::exists($imagePath)) {
                    File::makeDirectory($imagePath, 0755, true);
                }

                $image->move($imagePath, $imageName);
                $imagePath = 'uploads/products_sliders/' . $imageName;
            }

            SliderItem::create([
                'product_slider_id' => $productSlider->id,
                'image' => $imagePath,
                'title_1' => $item['title_1'],
                'title_2' => $item['title_2'],
                'title_3' => $item['title_3'],
                'link_4' => $item['link_4'],
            ]);
        }

        return redirect()->route('product_sliders.index')->with('success', 'Product Slider added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSlider $productSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::all();
        $productSlider = ProductSlider::with('sliderItems')->findOrFail($id);
        return view('admin.components.product.edit_slider', compact('productSlider', 'products'));
    }

    /**
     * Update the specified product slider.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
            'slider_items' => 'required|array|min:4|max:4',
            'slider_items.*.title_1' => 'required|string|max:255',
            'slider_items.*.title_2' => 'required|string|max:255',
            'slider_items.*.title_3' => 'required|string|max:255',
            'slider_items.*.link_4' => 'required|url',
            'slider_items.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image if it's present
        ]);

        // Find the product slider by id
        $productSlider = ProductSlider::findOrFail($id);
        $productSlider->product_id = $request->product_id;
        $productSlider->status = $request->status;

        if ($request->hasFile('background_image')) {
            $destination = 'uploads/background_image/' . $productSlider->background_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('background_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/background_image', $fileName);
            $productSlider->background_image = $fileName;
        }

        $productSlider->save();

        // Update Slider Items
        foreach ($request->slider_items as $index => $item) {
            $sliderItem = $productSlider->sliderItems[$index];

            // Handle the image update if a new image is uploaded
            if (isset($item['image']) && $item['image']) {
                $image = $item['image'];
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('uploads/products_sliders');

                // Delete the old image if it exists
                if ($sliderItem->image && File::exists(public_path('storage/' . $sliderItem->image))) {
                    File::delete(public_path('storage/' . $sliderItem->image));
                }

                // Ensure the directory exists
                if (!File::exists($imagePath)) {
                    File::makeDirectory($imagePath, 0755, true);
                }

                // Move the new image to the specified directory
                $image->move($imagePath, $imageName);

                // Set the new image path
                $imagePath = 'uploads/products_sliders/' . $imageName;
            } else {
                // If no image is uploaded, retain the old image
                $imagePath = $sliderItem->image;
            }

            // Update the slider item with the new data
            $sliderItem->update([
                'image' => $imagePath, // Image path is either updated or kept the same
                'title_1' => $item['title_1'],
                'title_2' => $item['title_2'],
                'title_3' => $item['title_3'],
                'link_4' => $item['link_4'],
            ]);
        }

        return redirect()->route('product_sliders.index')->with('success', 'Product Slider updated successfully!');
    }


    /**
     * Delete a product slider.
     */
    public function destroy($id)
    {
        $productSlider = ProductSlider::findOrFail($id);

        // Delete associated slider items and their images
        foreach ($productSlider->sliderItems as $item) {
            if ($item->image && File::exists(public_path($item->image))) {
                File::delete(public_path($item->image));
            }
            $item->delete();
        }

        // Delete the product slider record
        $productSlider->delete();

        return redirect()->route('product_sliders.index')->with('success', 'Product Slider deleted successfully!');
    }
}
