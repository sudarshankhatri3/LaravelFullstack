<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable=['order_Id','address','trackingNumber','delivery_charge','estimated_delivery_date','postalCode','label'];
}
