<?php

namespace App\Http\Controllers;

use App\Shop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function addShop(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        $shop = Shop::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->route('seller.home')->with('success', 'Shop request complete.');

    }

    public function viewRequests()
    {
        $inactiveShop = Shop::where('approved',false)->get();
        return view('admin.shop.requests', compact('inactiveShop'));
    }

    public function approve(Shop $shop)
    {
        $shop->approved = true;
        $shop->save();
        return redirect()->route('shop.approvedShops')->with('success','Shop Approved Successfully');
    }

    public function delete(Shop $shop)
    {

        $shop->delete();
        return redirect()->route('shop.approvedShops')->with('error','Shop Deleted Successfully');
    }

    public function approvedShops()
    {
        $activeShop = Shop::where('approved',true)->get();
        return view('admin.shop.approved', compact('activeShop'));
    }


    public function editShop(Shop $shop)
    {
        return view('shop.editShop', compact('shop'));
    }

    public function updateShop(Request $request, Shop $shop)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required'
        ]);

        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->save();

        return redirect()->route('shop.request')->with('success','Shop Updated Successfully');
    }

    public function deleteShop(Shop $shop)
    {
        $shop->delete();
        return redirect()->back()->with('success','Shop Deleted Successfully');
    }
}
