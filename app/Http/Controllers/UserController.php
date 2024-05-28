<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            if(auth()->user()->role == 'Event Manager'){
                $request->session()->regenerate();
                return redirect()->intended('/manager_homepage');
            }
            else if(auth()->user()->role == 'Vendor'){
                $request->session()->regenerate();
                return redirect()->intended('/vendor_homepage');
            }
            else if(auth()->user()->role == 'Admin'){
                $request->session()->regenerate();
                return redirect()->intended('/admin_homepage');
            }
        }
        return redirect('/login')->with('error', 'Login details is not valid');
    }

    public function registerPost(Request $request){
        $registerData = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'UTM_relation' => 'required',
            'ic_number' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $registerData['password']=Hash::make($registerData['password']);
        $user = User::create($registerData);

        if(!$user){
            return redirect('/register')->with('error', 'Register invalid, Please try again');
        }

        return redirect('/login')->with('success', 'Register success');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
