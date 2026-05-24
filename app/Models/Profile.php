<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['user_id','image','phone'];

    public function user(){
        return $this->belongTo(User::class);
    }
}
