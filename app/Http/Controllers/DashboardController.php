<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    // get all the order of the user 
    public function orderIndex(){
        $user=DB::table('users')->join('orders','users.id','=','orders.id')->select('orders.quantity','orders.total_amount','orders.status','orders.payment');
        return view('/admin/dashboard',compact('user'));
    }

    // show the dashboard 
    public function create(){
        return view('/admin/dashboard');
    }

    // manage product by admin
    public function  handleProduct(){
        $products = Product::all();
       return view('/vendor/dashboard', compact('products'));;
    }
}
