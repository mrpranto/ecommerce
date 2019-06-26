<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{



    public function index(){

        return view('backend.auth.login');

    }

    public function processLogin(Request $request){


        $this->validate($request,[

            'email'    => 'required|email',
            'password' => 'required',

        ],[

            'email.required'    => 'We Want to know your Email Address !',
            'email.email'       => 'Please give the valid Email Address !',
            'password.required' => 'Password Field must not be empty !',


        ]);


        $credentials = $request->except('_token');


        if (Auth::guard('admin')->attempt($credentials)){

            return redirect()->intended(route('admin.dashboard'))->with('success', 'Your Login Successful.');

        }else{

            return redirect()->back()->with('error','Invalid Credentials !');

        }

    }



}
