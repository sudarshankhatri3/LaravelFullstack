<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::orderBy('id','DESC')->get();
        return view('/admin/viewCategory',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'category'    => 'required|unique:categories,category|max:100',
            'description' => 'required|min:20|max:3000'
        ]);
       
        Category::create([
            'category' => $validated['category'],
            'slug' => Str::slug($request->category),
            'description' => $validated['description']
        ]);
        return redirect('/admin/viewCategory')->with(['sucess'=>'Category added sucessfully']);
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
        $category=Category::findOrfail($id);
        $category->delete();
        return redirect('/category')->with('sucess','Category removed sucessfully');
    }
}
