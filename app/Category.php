<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_category_id', 'name'];


    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
