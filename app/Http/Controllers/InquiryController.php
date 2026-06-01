<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiry=Inquiry::orderBy('id')->get();

        $ord=Order::orderBy('id')->get();
        
        // count the total inquiry
        $total=$inquiry->count();

        $pending=Inquiry::where('status','pending')->count();
        $processing=Inquiry::where('status','processing')->count();
        $resolved=Inquiry::where('status','processing')->count();

        $totalProduct=Product::get()->count();
        $inStock=Product::where('stock','in_stock')->count();
        $lowStock=Product::where('stock','limited')->count();
        $outOfStock=Product::where('stock','out_of_stock')->count();

        $product=Product::latest()->get();

        return view('/admin/dashboard',compact('inquiry','ord','total','pending','processing','resolved','totalProduct','inStock','lowStock','outOfStock','product'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/customer/inquiry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'first_name'=>'required|min:2|max:40',
            'last_name'=>'required|min:2|max:40',
            'phone' => ['required','regex:/^(98|97)\d{8}$/'],
            'order_id'=>'required|exists:orders,id',
            'inquiry_type'=>'required',
            'product_name'=>'required|min:2|max:20',
            'contact_method'=>'required|in:email,phone,whatshapp',
            'rate'=>'required|min:1|max:5',
            'message'=>'required|max:3000',
            'screenshot'=>'required|mimes:jpg,jpeg,png,webp|max:5120',
            'status'=>'required|in:pending,processing,resolved'
        ]);

        
        $imagePath=$request->file('screenshot')->store('inquiry','public');

        $order=Order::findOrFail($validated($validated['order_id']));
        if($order->id){
            Inquiry::create([
                'user_id'=>Auth::id(),
                'first_name'=>$validated['first_name'],
                'last_name'=>$validated['last_name'],
                'phone'=>$validated['phone'],
                'order_id'=>$order->id,
                'inquiry_type'=>$validated['inquiry_type'],
                'contact_method'=>$validated['contact_method'],
                'rate'=>$validated['rate'],
                'message'=>$validated['message'],
                'screenshot'=>$imagePath,
                'status'=>'pending'
            ]);

        }
        return redirect('/customer/product')->with(['Sucess'=>'Inquiry submitted sucessfully']);
    }
    
    /**
     * update the state of inquiry
     */
   
    public function processing(Request $request,$id){
        $inquiryProcess=Inquiry::findOrFail($id);


        $inquiryProcess->update([
            'status'=>Inquiry::STATUS_PROCESSING 
        ]);

        return redirect('/admin/dashboard')->with(['sucess'=>'Inquiry goes in processed state']);

    }

    /**
     * update the state of inquiry to resolved state
     */

    public function resolved($id){
        $inqResolve=Inquiry::findOrFail($id);

        $inqResolve::update([
            'status'=>Inquiry::STATUS_RESOLVED
        ]);
        return redirect('/admin/dashboard')->with(['sucess'=>'Inquiry goes in resolved state']);

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
        $inquiry=Inquiry::findOrFail($id);
        $inquiry->delete();

    }
}
