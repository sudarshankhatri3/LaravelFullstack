<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;


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
        $pendingOrder   = Order::where('status','pending')->count();
        $approvedOrder  = Order::where('status','shipped')->count();
        $deliveredOrder = Order::where('status','delivered')->count();
        $shippedOrder=Order::where('status','shipped')->count();
        $total_amount = Order::where('status',['approved','shipped','delivered'])->sum('total_amount');
        return view('admin.order', compact('orders','totalOrder','pendingOrder','approvedOrder','deliveredOrder','shippedOrder','total_amount'));
    }


    // change the status of order
    public function changeStatus(Request $request, $id){
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,shipped,delivered'
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }


    // dashboard for customer and all the customer operation
    public function customerSummary(Request $request){
        $totalCustomer=User::where('role','customer')->count();
        $customer=User::where('role','customer')->get();
        $newAdd=User::where('created_at','>=',Carbon::now()->subDays(7))->count();
        $orders=DB::table('orders')->join('users','users.id','=','orders.user_id')->select('orders.*')->where('users.role','customer')->count();
        return view('admin.customer',compact('totalCustomer','customer','newAdd','orders'));
    }


    // suspend customer
    public function suspendCustomer($id){
        $suspendedCustomer=User::where('role','customer')->findOrFail($id);
        $suspendedCustomer->update(['status'=>'suspended']);
        return view('admin.customers')->with('success', 'Customer suspended successfully.');
    }

    public function removeCustomer($id){
        $customer = User::where('role', 'customer')->findOrFail($id);
        $customer->delete();
        return redirect('/admin/customer')->with('success', 'Customer deleted successfully');
    }



    // dashboard product
    public function product(){
        $totalProduct=Product::get()->count();
        $inStock=Product::where('stock','in_stock')->count();
        $lowStock=Product::where('stock','limited')->count();
        $outOfStock=Product::where('stock','out_of_stock')->count();
        $comingStock=Product::where('stock','coming_soon')->count();

        $product=Product::latest()->get();
        return view('/admin/product',compact('totalProduct','inStock','comingStock','lowStock','outOfStock','product'));
    }

    // remove product
    public function removeProd($id){
        $prod=Product::findOrFail($id);
        $prod->delete();
        return view('/admin/product');
    }


    //  dashboard vendors
    public function vendor(){
        $details=User::where('role','vendor')->count();
        return view('admin.vendors',compact('details'));
    }


    




}
