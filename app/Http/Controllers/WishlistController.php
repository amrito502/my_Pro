<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    public function index(){
        $items = Cart::instance('wishlist')->content();
        return view('app.customer.components.wishlist.wishlist',compact('items'));
    }
    public function add_to_wishlist(Request $request){
        Cart::instance('wishlist')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            ['image' => $request->image]
        )->associate('App\Models\Product');
        return redirect()->back()->with('success','wishlist added');
    }



    public function remove_wishlist_item($rowId){
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back()->with('success','wishlist removed');
    }

    public function destroy_wishlist(){
        Cart::instance('wishlist')->destroy();
        return redirect()->back()->with('success','wishlist destroyed');
    }

    public function move_to_cart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,$item->qty,$item->price,['image' => $item->options->image])->associate('App\Models\Product');

        return redirect()->back()->with('success','item moved to cart');
    }
}
