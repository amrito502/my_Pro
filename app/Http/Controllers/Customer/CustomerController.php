<?php

namespace App\Http\Controllers\Customer;

use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscribe;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{


    public function getCategorySub($slug, $subslug = ''){
        $getCategory = Category::getSingleSlug($slug);
        $getSubCategory = SubCategory::getSingleSlug($subslug);


        $data['getBrand'] = Brand::getRecordActive();


        if(!empty($getCategory) && !empty($getSubCategory)){
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keyword'] = $getSubCategory->meta_keyword;
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            $data['getProduct'] = Product::getProduct($getCategory->id,$getSubCategory->id);
            $data['getSubCategoryFilter'] = SubCategory::getRecordSubCategory($getCategory->id);
            return view('app.customer.components.list_product.list_category_subcategory',$data);
        }
        else if(!empty($getCategory)){


            $data['getSubCategoryFilter'] = SubCategory::getRecordSubCategory($getCategory->id);


            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keyword'] = $getCategory->meta_keyword;
            $data['getCategory'] = $getCategory;
            $data['getProduct'] = Product::getProduct($getCategory->id);
            return view('app.customer.components.list_product.list_category_subcategory',$data);
        }
        else
        {
            abort(404);
        }


    }

    public function index(){
        $data['meta_title'] = "Zamanshops | Ecommerce";
        $data['meta_description'] = "Zamanshops";
        $data['meta_keyword'] = "Zamanshops";
        return view('app.customer.pages.index',$data);
    }


    public function all_customer_list(){
        $customers = User::where('role','customer')->get();
        return view('admin.components.customers.index',compact('customers'));
    }

    public function all_seller_list(){
        $sellers = User::where('role','seller')->get();
        return view('admin.components.sellers.index',compact('sellers'));
    }

    public function admin_customer_delete($id){
        $customers = User::where('role','customer')->find($id);
        $customers->delete();
        return redirect()->back()->with('success','Customer Deleted Successfully');
    }

    public function admin_seller_delete($id){
        $customers = User::where('role','seller')->find($id);
        $customers->delete();
        return redirect()->back()->with('success','Deller Deleted Successfully');
    }



    public function admin_subscribe_reports(){
        $subscribes = Subscribe::latest()->get();
        return view('admin.components.subscribe.index',compact('subscribes'));
    }

    public function admin_subscribe_delete($id){
        $Subscribe = Subscribe::find($id);
        $Subscribe->delete();
        return redirect()->back()->with('success','Subscribe Deleted Successfully!');
    }


    public function subscribe_newsletter(Request $request){
        $request->validate([
            'email' => 'required',
        ]);

        $Subscribe = new Subscribe;
        $Subscribe->email = $request->email ?? 'N/A';
        $Subscribe->save();

        return redirect()->back()->with('success','Subscribed Successfully!');
    }


    // public function product_details($id)
    // {
    //     return $product = Product::find($id);

    //     if ($product->size_id) {
    //         $sizeIds = json_decode($product->size_id, true);
    //         $product->sizes = Size::whereIn('id', $sizeIds)->get();
    //     } else {
    //         $product->sizes = collect();
    //     }
    //     if ($product->color_id) {
    //         $colorIds = json_decode($product->color_id, true);
    //         $product->colors = Color::whereIn('id', $colorIds)->get();
    //     } else {
    //         $product->colors = collect();
    //     }
    //     return view('app.customer.components.product.product_details',compact('product'));
    // }


    public function product_details($id)
{
     $product = Product::find($id);

    //  dd($product);

    if (!$product) {
        // Handle the case where the product is not found
        abort(404, 'Product not found');
    }

    if ($product->size_id) {
        $sizeIds = json_decode($product->size_id, true);
        $product->sizes = Size::whereIn('id', $sizeIds)->get();
    } else {
        $product->sizes = collect();
    }

    if ($product->color_id) {
        $colorIds = json_decode($product->color_id, true);
        $product->colors = Color::whereIn('id', $colorIds)->get();
    } else {
        $product->colors = collect();
    }

    return view('app.customer.components.product.product_details', compact('product'));
}





















    public function dashboard(){
        $user = User::with(['district','subDistrict'])->where('id', '=', auth()->user()->id)->first();
        return view('app.customer.dashboard', compact('user'));
    }

    public function customer_update_profile_page(){
        return view('app.customer.components.dashboard.update_profile');
    }

    public function customer_update_password_page(){
        return view('app.customer.components.dashboard.change_password');
    }

    public function customer_my_order_page(){
        return view('app.customer.components.dashboard.my_orders');
    }

    public function customer_update_profile(Request $request,$id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->city = $request->city;
        $user->district = $request->district;
        $user->sub_district = $request->sub_district;
        $user->address = $request->address;
        $user->password = $request->password;

        if ($request->hasFile('image')) {
            $destination = 'uploads/profile/' . $user->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile', $fileName);
            $user->image = $fileName;
        }
        $user->save();
        return redirect()->back()->with('success','Customer Profile Updated Successfully!');
    }


}
