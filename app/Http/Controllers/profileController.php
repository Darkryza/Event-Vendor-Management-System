<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function editProfile(User $user, Request $request){
        $user->name = $request->name;
        if ($request->password){
            $user->role = $request->role;
        }
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
