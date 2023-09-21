<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login(){

        return view('admin.auth.login');
    }

    public function loginCheck(Request $request){
       

        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ],[
            'email.exists' => 'This email is not exists on admin table',
        ]);



        $check_login = $request->only('email', 'password');

       

        if(Auth::guard('admin')->attempt($check_login)){
     
            return redirect()->route('admin.home')->with('success', 'Welcome to admin Dashboard');
        }else{
            return redirect()->route('login')->with('error','Incorrect Credentials');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
