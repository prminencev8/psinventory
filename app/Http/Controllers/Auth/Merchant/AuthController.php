<?php

namespace App\Http\Controllers\Auth\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('merchant.auth.login');
    }

    public function login(Request $request){
        if(Auth::guard('merchant')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended(route('merchant'))->with('success','You are logged in as merchant');
        }
        return back()->withInput($request->only('email'));
    }
}
