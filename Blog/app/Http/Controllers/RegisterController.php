<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request){

        // validate the model 
        $validated=$request->validate([
            'first_name'=>['required','max:50'],
            'last_name'=>['requred','max:50'],
            'email'=>['required'],
            'role'=>'required',
            'password'=>'required',
            'address'=>'required',
            'age'=>'requred'
        ]);

        User::create($validated);

        return redirect('/home')->with('sucess','Data saved');

    }

}
