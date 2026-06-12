<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
        $data=User::count();
        return view('/admin/adminDashboard',compact('data'));
    }
    //manual authentication in laraverl with blade template
    public function create(){
        return view('landingPage');
    }
    public function register(Request $request){
        $validated=$request->validate([
            'first_name'=>'required|min:2',
            'last_name'=>'required|max:40',
            'address'=>'required|max:30',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required|in:customer,vendor',
        ]);

        $validated['password']=Hash::make($validated['password']);
        User::create($validated);

        return redirect('/common/login')->with('sucess','Register sucessfully');
    }

    // Delete the customer
    public function remove(Request $request,$id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/admin/customers')->with('sucess','User deleted sucessfully');
    }
}
