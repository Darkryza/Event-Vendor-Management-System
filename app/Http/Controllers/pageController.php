<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function adminPage(){
        $users = User::all();
        $events = Event::with('user')->get();
        return view('admin_homepage',compact('events','users'));
    }

    public function managerPage(){
        $events = Event::all();
        return view('manager_homepage',compact('events'));
    }

    public function vendorPage(){
        $events = Event::all();
        return view('vendor_homepage', compact('events'));
    }

    public function edituser(User $user){
        return view('edituser',['user'=>$user]);
    }

    public function profilePage(){
        return view('profile');
    }

    public function addEventPage(){
        return view('addEvent');
    }

    public function editProfilePage(User $user){
        if(auth()->user()->id !== $user->id){
            return redirect('/');
        }
        return view('editProfile',['user'=>$user]);
    }
    public function pageEvent(Event $event){
        return view('pageEvent', ['event' => $event]);
    }
    public function viewEvent(Event $event){
        return view('viewEvent', ['event' => $event]);
    }
    public function applyEventPage(Event $event){
        return view('applyEvent', ['event' => $event]);
    }
    public function editEventPage(Event $event){
        return view('editEvent', ['event' => $event]);
    }
}
