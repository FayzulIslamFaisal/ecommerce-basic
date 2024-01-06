<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{

    public function index() {
        // shoow product item
        $products = Product::latest()->simplePaginate(3);
        return view('home.userpage',compact('products') );
    }
    public function redirect() {
        $usertype = Auth::User()->usertype;
        if ($usertype == '1') {
          return view('admin.home');
        }
         else {
            // shoow product item
            $products = Product::latest()->simplePaginate(3);
            return view('home.userpage',compact('products') );
        }

    }
    // product_details function
    public function product_details($id) {
        $products = Product::findOrFail($id);
        return view('home.product_detail', compact('products'));
    }
// -------------------------add to cart function-----------------------------//
    public function add_cart(Request $request ,$id) {
        if (Auth::id()) {
           $user = Auth::user();
           $product = Product::findOrFail($id);
           $cart = new Cart();
           $cart->name          = $user->name;
           $cart->email         = $user->email;
           $cart->phone         = $user->phone;
           $cart->address       = $user->address;
           $cart->user_id       = $user->id;
           $cart->product_title = $product->title;
           if ($product->discount_price!=null) {
            $cart->price        = $product->discount_price * $request->quantity;
           }else {
            $cart->price        = $product->price * $request->quantity;
           }
           $cart->image         = $product->image;
           $cart->product_id    = $product->id;
           $cart->quantity      = $request->quantity;
           $cart->save();
           return redirect()->back();
        }else {
            return redirect('login');
        }

    }


}
