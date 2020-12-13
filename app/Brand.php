<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=[
        'name','image',
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
