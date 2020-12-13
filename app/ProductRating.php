<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable = ['order_details_id', 'rating', 'feedback'];

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetails::class, 'order_details_id');
    }
}
