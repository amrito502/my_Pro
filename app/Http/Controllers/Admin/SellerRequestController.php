<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;

class SellerRequestController extends Controller
{
    public function create()
    {
        return view('seller.request.create');
    }





    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'store_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:seller_requests,email',
    //         'phone' => 'nullable|string|max:15',
    //         'address' => 'nullable|string',
    //         'city' => 'nullable|string',
    //         'district' => 'nullable|string',
    //         'sub_district' => 'nullable|string',
    //         'country' => 'nullable|string',
    //         'postal_code' => 'nullable|string|max:10',
    //         'nid' => 'nullable|string|max:20',
    //         'store_description' => 'nullable|string',
    //         'message' => 'nullable|string',
    //         'store_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    //     ]);



    //     // Create new SellerRequest instance
    //     $sellerRequest = new SellerRequest;

    //     // Assign data to the SellerRequest
    //     $sellerRequest->name = $request->input('name');
    //     $sellerRequest->store_name = $request->input('store_name');
    //     $sellerRequest->email = $request->input('email');
    //     $sellerRequest->phone = $request->input('phone');
    //     $sellerRequest->address = $request->input('address');
    //     $sellerRequest->city = $request->input('city');
    //     $sellerRequest->district = $request->input('district');
    //     $sellerRequest->sub_district = $request->input('sub_district');
    //     $sellerRequest->country = $request->input('country');
    //     $sellerRequest->postal_code = $request->input('postal_code');
    //     $sellerRequest->nid = $request->input('nid');
    //     $sellerRequest->store_description = $request->input('store_description');
    //     $sellerRequest->user_id = auth()->id();
    //     $sellerRequest->message = $request->input('message');
    //     $sellerRequest->status = 'pending';

    //     if ($request->hasFile('store_image')) {
    //         $file = $request->file('store_image');
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move('uploads/store_image', $fileName);
    //         $sellerRequest->store_image = $fileName;
    //     }

    //     $sellerRequest->save();
    //     return redirect()->route('dashboard')->with('success', 'Your request to become a seller has been submitted.');
    // }





    public function store(Request $request)
{
    // Check if the user has already submitted a request
    $existingRequest = SellerRequest::where('user_id', auth()->id())->first();

    if ($existingRequest) {
        return redirect()->route('dashboard')->with('error', 'You have already submitted a request to become a seller.');
    }

    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'store_name' => 'required|string|max:255',
        'email' => 'required|email|unique:seller_requests,email',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string',
        'city' => 'nullable|string',
        'district' => 'nullable|string',
        'sub_district' => 'nullable|string',
        'country' => 'nullable|string',
        'postal_code' => 'nullable|string|max:10',
        'nid' => 'nullable|string|max:20',
        'store_description' => 'nullable|string',
        'message' => 'nullable|string',
        'store_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    // Create new SellerRequest instance
    $sellerRequest = new SellerRequest;

    // Assign data to the SellerRequest
    $sellerRequest->name = $request->input('name');
    $sellerRequest->store_name = $request->input('store_name');
    $sellerRequest->email = $request->input('email');
    $sellerRequest->phone = $request->input('phone');
    $sellerRequest->address = $request->input('address');
    $sellerRequest->city = $request->input('city');
    $sellerRequest->district = $request->input('district');
    $sellerRequest->sub_district = $request->input('sub_district');
    $sellerRequest->country = $request->input('country');
    $sellerRequest->postal_code = $request->input('postal_code');
    $sellerRequest->nid = $request->input('nid');
    $sellerRequest->store_description = $request->input('store_description');
    $sellerRequest->user_id = auth()->id();
    $sellerRequest->message = $request->input('message');
    $sellerRequest->status = 'pending';

    // Handle image upload
    if ($request->hasFile('store_image')) {
        $file = $request->file('store_image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/store_image', $fileName);
        $sellerRequest->store_image = $fileName;
    }

    // Save the new seller request
    $sellerRequest->save();

    // Redirect with success message
    return redirect()->route('dashboard')->with('success', 'Your request to become a seller has been submitted.');
}

    public function index()
    {
        $requests = SellerRequest::with('user')->where('status', 'pending')->get();
        return view('admin.seller.requests', compact('requests'));
    }



    public function verified($id)
    {
        $sellerRequest = SellerRequest::findOrFail($id);
        $sellerRequest->update(['status' => 'verified']);
        $user = User::findOrFail($sellerRequest->user_id);
        $user->role = 'seller';
        $user->save();

        return redirect()->route('admin.seller.requests')->with('success', 'Seller request verified.');
    }

        // Reject a seller request
        public function canceled($id)
        {
            $sellerRequest = SellerRequest::findOrFail($id);
            $sellerRequest->update(['status' => 'canceled']);

            return redirect()->route('admin.seller.requests')->with('success', 'Seller request rejected.');
        }


}
