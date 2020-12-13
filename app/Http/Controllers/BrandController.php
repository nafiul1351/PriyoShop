<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Brand;
use App\Category;

class BrandController extends Controller
{
    public function addBrand(){
        $brands=Brand::all();
        return view('sellers.brand.addBrand',compact('brands'));
    }
    protected function StoreBand(Request $request)
    {
        $this->validate($request, [
                'brand_name'=>'required',
                'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image')) {
             $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = '/brand/' .'/image/' . $filename;
            $file->move(public_path() . "/brand/" ."/image/", $filename);
        }
        $brand = Brand::create([
            'name' => $request['brand_name'],
            'image' => $path,

        ]);
        return redirect()->back()->with('success','Brand Added Successfully!');
}
public function delete(Brand $brand)
    {
        $brand->delete();
        return redirect()->back()->with('success','Brand Deleted Successfully');
    }
    public function brandwiseProduct(Brand $brand){
        $categories=Category::all();
        $brands=Brand::all();
      return view('layouts.brandwiseProduct',compact('brand','categories','brands'));
    }
    public function editBrand(Brand $brand){
        $brands=Brand::all();
        return view('sellers.brand.editBrand',compact('brands','brand'));
    }
     public function updateBrand(Request $request, Brand $brand){
        $this->validate($request, [
            'brand_name'=>'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $path = '/brand/' .'/image/' . $filename;
        $file->move(public_path() . "/brand/" ."/image/", $filename);

        // $image_path = public_path().$brand->image;
        // //dd($image_path);
        // if (File::exists($image_path)) {
        //     File::delete($image_path);
        //     //unlink($image_path);
        // }
    } else {
        $path = $brand->image;
    }
    $brand->update([
        'name' => $request['brand_name'],
        'image' => $path,
      
    ]);
    return redirect()->route('add.band')->with('status', 'Update successfully!');
    }
}
