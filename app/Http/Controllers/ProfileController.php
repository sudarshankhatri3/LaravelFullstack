<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        return view('/profile/addProfile',compact('user'));
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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'phone'=>'required|min:2|max:12'
        ]);

        $imagePath=$request->file('image')->store('profiles','public');

        Profile::create([
            'user_id'=>Auth::id(),
            'image'=>$imagePath,
            'phone'=>$validated['phone']

        ]);
        return redirect('/vendor/dashboard')->with(['sucess'=>'Profile changed sucessfully']);
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
    public function edit(Request $request, string $id)
    {
        $user=Profile::get($id);

        if($user){
            $request->file('image')->store('profiles','public')->delete();
            
        }
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
