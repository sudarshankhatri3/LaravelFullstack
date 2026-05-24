<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivery=Delivery::orderBy('id','DESC')->get();
        return view('/hello sur',compact('delivery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'address'=>'required|string|min:3|max:200',
            'trackingNumer'=>'required|integer|min:3|max:6',
            'delivery_charge'=>'required|integer',
            'estimated_delivery_date'=>'required|date',
            'postalCode'=>'required',
            'label'=>'required|in:Home,Office'
        ]);

        Delivery::create($validated);

    }

    /**
     * Display the specified    resource.
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
        //
    }
}
