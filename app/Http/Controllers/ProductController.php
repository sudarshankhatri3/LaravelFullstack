<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('vendor/manageProduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function customerCreate()
    {
        $products=Product::orderBy('id','DESC')->get();
        return view('customer/product',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function vendorCreate(){
        return view('/vendor/addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title' => 'required|string|max:255',
            'slug'=>'nullable|string|unique:products,slug',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'model' => 'nullable|string|max:100',
            'discount'=>'required|numeric|min:0|max:100',
            'dimension' => 'nullable|string',
            'stock' => 'required|in:in_stock,limited,out_of_stock,pre_order,coming_soon',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        $imagePath=$request->file('image')->store('products','public');

        $galleryPaths = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $galleryPaths[] = $img->store('products');
            }
        }

       


        Product::create([
            'user_id'=>Auth::id(),
            'title'=>$validated['title'],
            'slug' => $validated['slug'] ?? Str::slug($validated['title']),
            'quantity'=>$validated['quantity'],
            'price'=>$validated['price'],
            'model'=>$validated['model'],
            'discount'=>$validated['discount'],
            'dimension'=>$validated['dimension'],
            'stock'=>$validated['stock'],
            'image' => $imagePath,
            'gallery' => json_encode($galleryPaths)
        ]);

        return redirect('/vendor/dashboard')->with(['sucess'=>"Product addes sucessfully"]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prds = Product::findOrFail($id);
        return view('/customer/singleProduct', compact('prds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::findOrFail($id);
        return view('/vendor/addProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated=$request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products,slug,' . $product->id,
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'model' => 'nullable|string|max:100',
            'discount' => 'required|numeric|min:0|max:100',
            'dimension' => 'nullable|string',
            'stock' => 'required|in:in_stock,limited,out_of_stock,pre_order,coming_soon',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        if($request->hasFile('image')){
            // delete old image
            if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
            }
            $validated['image']=$request->file('image')->store('products');
        }

        $galleryPaths = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $galleryPaths[] = $img->store('products');

            }

            // if gallery column is json/text
            $validated['gallery'] = json_encode($galleryPaths);
        }

        $product->update($validated);

        return redirect('/vendor/manageProduct')->with(['sucess'=>'Product updated sucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/vendor/manageProduct')->with(['sucess'=>'Data removed sucessfully}']);
    }
}
