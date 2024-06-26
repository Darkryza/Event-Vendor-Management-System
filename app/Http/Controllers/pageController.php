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

        // Total Applications
        $applications = Application::all();
        $totalApplications = $applications->count();

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
            'eventsPerMonth' => $eventsPerMonthArray,
            'totalApplications' => $totalApplications
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
        $managers = User::where('role', 'Event Manager')->get();
        return view('admin-addevent', compact('managers'));
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
        $managers = User::where('role', 'Event Manager')->get();
        $current_manager = User::find($event->user_id);
        return view('admin-editEvent', compact('event', 'managers', 'current_manager'));
    }

    public function admin_viewApplications(){
        $applications = Application::all();
        return view('admin-viewApplications', compact('applications'));
    }

    public function reviewEvent(Event $event){
        return view('Admin-reviewEvent', compact('event'));
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

    public function manager_listEvent(){
        $user = Auth::user();
        $events = Event::where('user_id', $user->id)->get();
        return view('manager-listEvents', compact('events')); 
    }

    public function manager_listApplications(){
        $manager = Auth::user();
        $events = Event::where('user_id', $manager->id)->pluck('id');
        $applications = Application::whereIn('event_id', $events)->get();
        return view('manager-listApplications', compact('applications'));
    }

    public function viewVendor(Application $application){
        $event = Event::where('id', $application->event_id)->get()->first();
        $Allapplications = Application::where('event_id', $event->id)->get();
        return view('viewVendor', compact('application', 'event', 'Allapplications'));
    }

    // Vendor functions

    public function viewEvent(Event $event){
        return view('viewEvent', ['event' => $event]);
    }

    public function applyEventPage(Event $event){
        $user = auth()->user();
        $applications = Application::where('event_id', $event->id)->get();
        return view('applyEvent', ['event' => $event, 'user' => $user, 'applications' => $applications]);
    }

    public function vendorApplicationPage(User $user){
        $applications = Application::where('applications.user_id', $user->id)
        ->leftJoin('events', 'applications.event_id', '=', 'events.id')
        ->orderByRaw("CASE WHEN applications.status = 'Approve' THEN 1 ELSE 2 END")
        ->orderBy('events.start_date', 'asc')
        ->select('applications.*', 'events.start_date as event_start_date') // Include event start date in the selection
        ->get();

        return view('vendorApplications', compact('applications'));
    }

    public function EditAppPage(Application $application){
        $applications = Application::all();
        $event = Event::where('id', $application->event_id)->first(); // Fetch single event instance
        return view('editApplication', compact('application', 'event', 'applications'));
    }

}
