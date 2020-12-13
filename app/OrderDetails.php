<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['product_id','order_id','color','size','quantity','status','seller_id'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function rating()
   {
       return $this->hasOne(ProductRating::class,'order_details_id');
   }
}
