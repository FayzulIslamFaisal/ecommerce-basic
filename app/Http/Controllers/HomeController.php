<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

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
            $totalProduct = Product::all()->count();
            $total_Order = Order::all()->count();
            $total_User = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            foreach ($order as  $order) {
                $total_revenue += $order->price;
            }

            $order_delivered = Order::where('delivery_status','=','delivered')->get()->count();
            $order_processing = Order::where('delivery_status','=','processing')->get()->count();

          return view('admin.home',compact('totalProduct','total_Order','total_User','total_revenue','order_delivered','order_processing'));
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

    public function show_cart() {
        if (Auth::id()) {
            $id   = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart',compact('cart'));
        } else {
           return redirect('login');
        }
    }

    public function remove_cart($id) {
        $product = Cart::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Cart Product Deleted successfully');

    }
// -------------------------Order Function -----------------------------//
    public function cash_order() {
        $userid = Auth::user()->id;
        $cartdata = Cart::where('user_id', '=',$userid)->get();
        // dd($cartdata);
        foreach ($cartdata as $data) {
           $order = new Order();
           $order->name             = $data->name;
           $order->email            = $data->email;
           $order->phone            = $data->phone;
           $order->address          = $data->address;
           $order->user_id          = $data->user_id;

           $order->product_title    = $data->product_title;
           $order->quantity         = $data->quantity;
           $order->price            = $data->price;
           $order->image            = $data->image;
           $order->product_id       = $data->product_id;

           $order->payment_status   = 'cash on delivery';
           $order->delivery_status  = 'processing';
           $order->save();
           $cart_id = $data->id;
           $cart    = Cart::find($cart_id);
           $cart->delete();

        }
        return redirect()->back();

    }
    // -------------------------Stripe Function -----------------------------//
    public function stripe($totalprice){
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment",
        ]);
        $userid = Auth::user()->id;
        $cartdata = Cart::where('user_id', '=',$userid)->get();
        // dd($cartdata);
        foreach ($cartdata as $data) {
           $order = new Order();
           $order->name             = $data->name;
           $order->email            = $data->email;
           $order->phone            = $data->phone;
           $order->address          = $data->address;
           $order->user_id          = $data->user_id;

           $order->product_title    = $data->product_title;
           $order->quantity         = $data->quantity;
           $order->price            = $data->price;
           $order->image            = $data->image;
           $order->product_id       = $data->product_id;

           $order->payment_status   = 'Paid';
           $order->delivery_status  = 'processing';
           $order->save();
           $cart_id = $data->id;
           $cart    = Cart::find($cart_id);
           $cart->delete();

        }

        Session::flash('success', 'Payment Successfull!');

        return back();
    }



}
