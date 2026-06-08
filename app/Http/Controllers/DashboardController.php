<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

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

    // calculate orders
    public function orderAnalytic(){
        $orders=Order::orderBy('id','DESC')->get();
        $totalOrder     = Order::count();
        $pendingOrder   = Order::where('status', 'pending')->count();
        $approvedOrder  = Order::where('status', 'shipped')->count();
        $deliveredOrder = Order::where('status', 'delivered')->count();
        $total_amount = Order::sum('total_amount');
        return view('admin.order', compact('orders','totalOrder','pendingOrder','approvedOrder','deliveredOrder','total_amount'));
    }


    // change the status of order
    public function changeStatus(Request $request, $id){
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,shipped,delivered'
        ]);

        $order->update($validated);

        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
