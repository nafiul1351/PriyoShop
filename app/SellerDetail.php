<?php

namespace App;
use App\user;
use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{
    protected $fillable = ['user_id','nid','tin', 'company_name', 'bkash', 'rocket'];
 public function user()
{
    return $this->hasOne(User::class, 'user_id');
}
}
