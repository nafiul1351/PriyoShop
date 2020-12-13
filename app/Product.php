<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'company_name','description', 'price', 'quantity', 'category_id', 'shop_id','product_id','brand_id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::Class,'shop_id');
    }

    public function productDetail()
    {
        return $this->hasOne(ProductDetail::Class,'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::Class, 'product_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::Class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::Class, 'brand_id');
    }
    public function orderDetails(){
        return $this->hasMany('App\OrderDetails','product_id');
    }
    public function seller(){
        return $this->belongsTo('App\User','seller_id');
    }
    public function rating()
    {
        return $this->hasManyThrough('App\ProductRating','App\OrderDetails');
    }
}
