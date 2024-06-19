<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{
    // Homepage

    public function adminPage(){
        $currentYear = now()->year;

        // Total users
        $users = User::where('role', '!=', 'Admin')->get();
        $totalUsers = $users->count();

        // Total events for the current year
        $totalEvents = Event::whereYear('start_date', $currentYear)->count();

        // Events per month for the current year
        $eventsPerMonth = Event::whereYear('start_date', $currentYear)
            ->selectRaw('MONTH(start_date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize an array with 12 elements set to 0 for each month
        $eventsPerMonthArray = array_fill(1, 12, 0);

        // Fill the array with the actual values
        foreach ($eventsPerMonth as $month => $count) {
            $eventsPerMonthArray[$month] = $count;
        }

        return view('admin_homepage', [
            'totalUsers' => $totalUsers,
            'totalEvents' => $totalEvents,
            'eventsPerMonth' => $eventsPerMonthArray
        ]);
    }
    

    public function managerPage(){
        $user = Auth::user();
        $events = Event::where('user_id', $user->id)->get();
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

    public function viewUsers(){
        $users = User::where('role', '!=', 'Admin')->get();
        return view('viewUsers', compact('users')); 
    }

    public function viewEvents(){
        $events = Event::all();
        return view('viewEvents', compact('events'));
    }
    
    public function adduser(){
        return view('Admin-adduser');
    }

    public function addevent(){
        return view('admin-addevent');
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

    public function admin_editEvent(Event $event){
        return view('admin-editEvent', compact('event'));
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
        $user = auth()->user();
        return view('applyEvent', ['event' => $event, 'user' => $user]);
    }

    public function vendorApplicationPage(User $user){
        $applications = Application::where('user_id', $user->id)->get();
        return view('vendorApplications', compact('applications'));
    }

    public function EditAppPage(Application $application){
        return view('editApplication', compact('application'));
    }

}
