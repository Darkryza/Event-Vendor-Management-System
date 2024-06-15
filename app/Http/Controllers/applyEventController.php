<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class applyEventController extends Controller
{
    public function addApplyEvent(Request $request, Event $event, User $user){

        $applyEvent = $request->validate([
            'vendor_name' => 'required',
            'booth_name' => 'required',
            'phone_number' => 'required',
            'category' => 'required',
            'no_of_lot' => 'required',
            'agreement' => 'required',
        ]);

        $vendor_name = $request->vendor_name;
        $booth_name = $request->booth_name;
        $phone_number = $request->phone_number;
        $category = $request->category;
        $no_of_lot = $request->no_of_lot;
        $agreement = $request->agreement;
        
        // $receipt_name = $request->file('receipt_image')->getClientOriginalName();
        // $request->file('receipt_image')->storeAs('public/images', $receipt_name);

        $receipt_name = time().'.'.$request->receipt_image->getClientOriginalName().'.'.$request->receipt_image->extension();
        $request->receipt_image->move(public_path('images'), $receipt_name);
        
        $application = new Application();
        $application->vendor_name = $vendor_name;
        $application->booth_name = $booth_name;
        $application->phone_number = $phone_number;
        $application->category = $category;
        $application->no_of_lot = $no_of_lot;
        $application->agreement = $agreement;
        $application->receipt_name = $receipt_name;
        $application->event_id = $event->id;
        $application->user_id = $user->id;
        $application->save();

        return redirect()->back()->with('success', "Application successful");
    }

    public function editApplyEvent(){
        
    }

    public function approve(Application $application){
        $application->status = 'Approve';
        $application->save();
        return redirect()->back()->with('success', "Application successful");
    }

    public function reject(Application $application){
        $application->status = 'Reject';
        $application->save();
        return redirect()->back()->with('success', "Application successful");
    }
}
