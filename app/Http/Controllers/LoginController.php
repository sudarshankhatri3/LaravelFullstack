<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:3'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            $user=Auth::user();

            if($user->role=='admin'){
                return redirect('/admin/dashboard')->with(['Sucess','Login sucessfully']);
            }elseif($user->role=='vendor'){
                return redirect('/vendor/dashboard')->with(['Sucess','Login sucessfully']);
            }elseif($user->role=='customer'){
                return redirect('/customer/product')->with(['Sucess','Login sucessfully']);
            }elseif($user->role=='deliveryBoy'){
                return redirect('')->with(['Sucess','Login sucessfully']);
            }else{
                return redirect('/')->with(['Sucess','Login sucessfully']);
            }
            return redirect('/')->with('Sucess','Login sucessfully');
        }
        return back()->withErrors(['invalid' => 'Email or password mismatch']);

    }
}
