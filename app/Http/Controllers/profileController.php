<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function editProfile(User $user, Request $request){
        if(auth()->user()->id !== $user->id){
            return redirect('/');
        }

        $name = $request->input('name');
        $role = $user->role;
        $ic_number = $request->input('IC_number');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $username = $request->input('username');

        User::where('id', $user->id)->update(['name'=>$name, 'role'=>$role, 'ic_number'=>$ic_number, 'phone_number'=>$phone_number, 'email'=>$email, 'username'=>$username]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function edituser(Request $request, User $user){
        $user->name = $request->name;
        $user->role = $request->role;
        $user->IC_number = $request->IC_number;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully');
    }
}
