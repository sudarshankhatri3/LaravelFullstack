<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::orderBy('id','DESC')->get();
        return view('readBlog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('readBlog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|max:100',
            'content'=>'required|max:50000'
        ]);

        Blog::create($validated);
        return redirect('readBlog')->with('sucess','Blog added sucessfully');

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
        $blogs=Blog::findOrFail($id);
        $blogs->delete();

        return redirect('readBlog')->with('sucess','Data deleted destroyed');
    }
}
