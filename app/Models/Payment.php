<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount','payment_method','transaction_id','status'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongTo(Order::class);
    }
}
