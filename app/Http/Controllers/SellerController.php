<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Shop;

class SellerController extends Controller
{
    public function viewRequests()
    {
        $inactiveSellers = User::where('type','seller')->where('approved',false)->get();
        return view('admin.seller.requests',compact('inactiveSellers'));
    }

    public function approve(User $seller)
    {
        $seller->approved = true;
        $seller->save();
        return redirect()->route('seller.approvedSellers')->with('success','Seller Approved Successfully');
    }

    public function delete(User $seller)
    {

        $seller->delete();
        return redirect()->route('seller.approvedSellers')->with('success','Seller Deleted Successfully');
    }

    public function approvedSellers()
    {
        $activeSellers = User::where('type','seller')->where('approved',true)->get();
        return view('admin.seller.approved',compact('activeSellers'));
    }

    public function shopRequest()
    {
        return view('sellers.requestShop');
    }
    public function sellerupdate(User $user){
        return view('sellers.sellerProfile',compact('user'));
    }
}
