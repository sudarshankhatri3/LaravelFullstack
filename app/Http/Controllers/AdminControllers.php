<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class AdminControllers extends Controller
{

    public function product(){
        $totalProduct=Product::get()->count();
        $inStock=Product::where('stock','in_stock')->count();
        $lowStock=Product::where('stock','limited')->count();
        $outOfStock=Product::where('stock','out_of_stock')->count();

        $product=Product::latest()->get();
        return view('/admin/dashboard',compact('totalProduct','inStock','lowStock','outOfStock','product'));
    }
}
