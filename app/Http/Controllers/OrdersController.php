<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->get();
        return view('/customer/orderList',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/customer/orderList');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:1',
            // 'status'=>'required|in:shipped,delivered,pending'
        ]);

        $product=Product::findOrFail($validated['product_id']);

        if($product->quantity<$validated['quantity']){
            return back()->with('error','Not enough product in stock');
        }
        $total_amount=$validated['quantity']*$product->price;

        DB::transaction(function () use($product,$validated,$total_amount) {

            // create an order
            Order::create([
                'user_id'=>Auth::id(),
                'product_id'=>$product->id,
                'title'=>$product->title,
                'image'=>$product->image,
                'quantity'=>$validated['quantity'],
                'unit_price'=>$product->price,
                'total_amount'=>$total_amount,
                'status'=>'pending'
            ]);
            $product->decrement('quantity', $validated['quantity']);
        });
        return redirect('/customer/orderList')->with(['Sucess'=>'Order placed sucessfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
