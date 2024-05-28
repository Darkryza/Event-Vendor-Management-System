<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        // $registerData = $request->input([
        //     'name' => 'required',
        //     'role' => 'required',
        //     'ic_number' => 'required',
        //     'phone_number' => 'required',
        //     'email' => 'required',
        //     'username' => 'required',
        // ]);

        // $registerData['password'] = $user->password;
        // $user->update($registerData);
        User::where('id', $user->id)->update(['name'=>$name, 'role'=>$role, 'ic_number'=>$ic_number, 'phone_number'=>$phone_number, 'email'=>$email, 'username'=>$username]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

}
