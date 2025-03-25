<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // =======user======================

    
    public function admin_user_index(){
        $user = User::with(['district', 'subDistrict'])->where('id', '=', auth()->user()->id)->first();
        return view('admin.components.user_manage.index',compact('user'));
    }

    public function admin_user_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
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
        return redirect()->back()->with('success', 'Admin Profile Updated Successfully!');
    }

    public function admin_user_create(){
        return view('admin.components.user_manage.create');
    }

    public function admin_user_store(Request $request){
       
    }


    // ==================================
    public function admin_login(){
        return view('admin.login');
    }

    public function admin_dashboard(){
        $orders = OrderItem::latest()
        ->with('order') 
        ->get();
        $total_earnings = $orders->sum(function ($orderItem) {
            return $orderItem->order ? $orderItem->order->total : 0;
        });
        $totalorders = Order::count();
        $totalordersdelivered = Order::where('status','delivered')->count();
        $totalorderscanceled = Order::where('status','canceled')->count();

        $totalseller = User::where('role','seller')->count();
        $totalcustomer = User::where('role','customer')->count();

        $totalproduct = Product::count();
        $totalblogpost = Blog::count();

        return view('admin.dashboard',[
            'orders' => $orders,
            'total_earnings' => $total_earnings,
            'totalorders' => $totalorders,
            'totalordersdelivered' => $totalordersdelivered,
            'totalorderscanceled' => $totalorderscanceled,
            'totalseller' => $totalseller,
            'totalcustomer' => $totalcustomer,
            'totalproduct' => $totalproduct,
            'totalblogpost' => $totalblogpost,
        ]);
    }


    public function users()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.status', compact('users'));
    }

    // Block a user
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'blocked';
        $user->save();

    if (Auth::id() == $id) {
        Auth::logout();
        Session::flush();
    }
        return redirect()->route('admin.users')->with('success', 'User blocked successfully.');
    }


    // Unblock a user
    public function unblockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User unblocked successfully.');
    }
}
