<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id','title','slug','quantity','price','model','discount','dimension','stock','image','gallery']; 


    // Define relationship between user and product 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define relationship between product and cart
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function product(){
        return $this->hasMany(Order::class);
    }
}
