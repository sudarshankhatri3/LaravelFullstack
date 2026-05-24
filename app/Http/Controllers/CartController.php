<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart=Cart::where('user_id',Auth::id())->where('prod_id',Auth::id())->orderBy('id','DESC')->get();
        return view('/customer/cartList',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'user_id'=>'required|exist:users,id',
            'prod_id'=>'required|exist:products,id'
        ]);

        $product=Product::findOrFail($validated['prod_id']);

        // check the product already exist in cart table
        $items=Cart::where('user_id',Auth::id())->where('prod_id', $products->id)-first();

        if($items){
            $items->quantity+=1;
            $item->save();
        }else{
            Cart::create([
                'user_id'=>Auth::id(),
                'prod_id'=>$product->id,
                'quantity'=>1
            ]);
        }
        return redirect()->action('${App\Http\Controllers\HomeController@index}', ['parameterKey' => 'value']);
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
        //
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
        // Remove the product from cart
        $cart=Cart::findOrFail($id);
        $cart->delete();

        return redirect()->action('${App\Http\Controllers\HomeController@index}', ['parameterKey' => 'value']);

    }
}
