<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','total','discount','trx_id','paid','due','status','note'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
    public function shipped(){
        return  $this->hasOne(Shipping::class);
    }
}
