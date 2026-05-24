<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['product_id','quantity','unit_price','total_amount','status','payment'];

    public function user(){
        return $this->belongTo(User::class);
    }
    public function product(){
        return $this->belongTO(Product::class);
    }
}
