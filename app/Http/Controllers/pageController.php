<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    // Homepage

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

    // .......................................

    // Edit Profile

    public function profilePage(){
        return view('profile');
    }

    // .......................................

    // Admin functions
    
    public function adduser(){
        return view('Admin-adduser');
    }

    public function edituser(User $user){
        return view('edituser',['user'=>$user]);
    }

    public function editProfilePage(User $user){
        if(auth()->user()->id !== $user->id){
            return redirect('/');
        }
        return view('editProfile',['user'=>$user]);
    }

    // Manager functions

    public function addEventPage(){
        return view('addEvent');
    }

    public function pageEvent(Event $event){
        return view('pageEvent', ['event' => $event]);
    }

    public function editEventPage(Event $event){
        return view('editEvent', ['event' => $event]);
    }

    public function listApplicationPage(Event $event){
        $applications = Application::where('event_id', $event->id)->get();
        return view('listApplication', compact('applications', 'event'));
    }

    public function viewReceiptPage(Event $event, Application $application){
        return view('viewReceipt', compact('event','application'));
    }



    // Vendor functions

    public function viewEvent(Event $event){
        return view('viewEvent', ['event' => $event]);
    }

    public function applyEventPage(Event $event){
        return view('applyEvent', ['event' => $event]);
    }

    public function vendorApplicationPage(User $user){
        $applications = Application::where('user_id', $user->id)->get();
        return view('vendorApplications', compact('applications'));
    }

    public function EditAppPage(Application $application){
        return view('editApplication', compact('application'));
    }

}
