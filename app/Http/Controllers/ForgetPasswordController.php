<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function reset(Request $request){
        $validated=$request->validate([
            'token'=>'required',
            'email'=>'required|email',
            'password' => 'required|string|min:4|confirmed'
        ]);

        $status=Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user) use($request){
                $user->forceFill([
                    'password'=>Hash::make($request->password),
                    'remember_token'=>Str::random(40)
                ])->save();
            }
        );
        return $status==Password::PASSWORD_RESET ? redirect()->route('/login')->with('status',__($status)): withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
