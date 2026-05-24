<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carts';
    protected $fillable=['user_id', 'prod_id','quantity'];


    public function user(){
        return $this->belongTo(User::class);
    }

    public function product(){
        return $this->belongTo(Product::class);
    }
}
