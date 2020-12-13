<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductDetail;
use App\ProductImage;
use App\Category;
use App\Order;
use App\Brand;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
   public function homepage(){
       $product_detials=ProductDetail::all();
       $product_images=ProductDetail::all();
       $categories=Category::all();
       $products=Product::all();
       $brands=Brand::all();
       return view('welcome',compact('products','product_detials','product_images','categories','brands'));
   }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders=Order::all();
        return view('admin.home',compact('orders'));
    }

    public function userIndex()
    {
        return view('users.home');
    }
    public function sellerIndex()
    {
        return view('sellers.home');
    }

    public function notApprovedSeller()
    {
        return view('auth.notApproved');
    }
    public function searchResult(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
        ]);
        $query = $request->name;
        $products = Product::where('name','like','%'.$request->name.'%')->paginate(12);
        $categories = Category::all();
        $price['max'] = Product::max('price');
        $price['min'] = Product::min('price');
        $brands = Brand::all();
        $products->appends($request->all());
        return view('layouts.searchResult',compact('products','query','categories','brands','price'));
    }
    public function showOrders()
    {
        return view('order.sellerIndex');
    }
}
