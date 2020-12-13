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
class AboutusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function aboutuspage(){
       $product_detials=ProductDetail::all();
       $product_images=ProductDetail::all();
       $categories=Category::all();
       $products=Product::all();
       $brands=Brand::all();
       return view('aboutus',compact('products','product_detials','product_images','categories','brands'));
   }
}
