<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //
    protected $table='inquries';
    protected $fillable=['fullName','email','phone','order_id','inquiry_type','product_name','contact_method','rate','message','screenshot','status'];

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_RESOLVED = 'resolved';
}
