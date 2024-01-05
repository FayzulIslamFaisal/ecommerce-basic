<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
// ================================
// ======      category      ======
// ================================
    public function view_category(){
        $data = Category::latest()->simplePaginate(3);
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request){
        $rull = [
            'category' => 'required'
        ];
        $this->validate($request,$rull);

        $data = new Category();
        // database fiel name = form field name
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully!!!');
    }
    public function delete_category($id) {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully!!!');
    }

// ================================
// ======      product      =======
// ================================

    public function view_product(){
        $categorys = Category::all();
        return view('admin.product',compact('categorys'));
    }
    public function add_product(Request $request){
        $rulls = [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'dis_price' => 'required|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
        $this->validate($request,$rulls);

        $product = new Product();
        // Set product attributes from the request data
        $product->title = $request->title;
        $product->description = Str::limit($request->input('description'), 10);
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);
            $product->image = 'product/' . $imageName;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product added successfully');

    }

    public function show_product(){
        $products = Product::all();
        return view('admin.show-product',compact('products'));
    }






}
