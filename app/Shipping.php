<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['order_id','s_name','s_phone','s_address_line_1','s_address_line_2','status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
