<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class applyEventController extends Controller
{
    public function addApplyEvent(Request $request, Event $event, User $user){
        $event = Event::findOrFail($event->id);
        $approvedApplications = Application::where('event_id', $event->id)->where('status', 'Approve')->get();

        $applyEvent = $request->validate([
            'vendor_name' => 'required',
            'booth_name' => 'required',
            'phone_number' => 'required',
            'category' => 'required',
            'no_of_lot' => [
                'required',
                'integer',
                'min:1',
                'max:' . $event->Lot_Quantity,
                function ($attribute, $value, $fail) use ($approvedApplications) {
                    foreach ($approvedApplications as $application) {
                        if ($application->no_of_lot == $value) {
                            return $fail('The lot number ' . $value . ' is already booked.');
                        }
                    }
                }
            ],
            'agreement' => 'required',
        ]);

        $vendor_name = $request->vendor_name;
        $booth_name = $request->booth_name;
        $phone_number = $request->phone_number;
        $category = $request->category;
        $no_of_lot = $request->no_of_lot;
        $agreement = $request->agreement;

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

        return redirect()->route('listApplicationVendor',['user' => $user->id])->with('success', $application->event->title." Application successful");
    }

    public function deleteApplyEvent(Request $request, Application $application){
        $image = public_path('images/' . $application->receipt_name);
        if (File::exists($image)) {
            File::delete($image);
        }
        $application->delete();
        return redirect()->route('listApplicationVendor',['user' => auth()->user()])->with('success','Application deleted successfully');
    }

    public function approve(Application $application){
        $event = $application->event;

        // Check if the availability can be increased
        if ($event->availabality < $event->Lot_Quantity) {
            // Increase the availability by 1
            $event->availabality += 1;
            $event->save();

            // Update the application's status to 'Approve'
            $application->status = 'Approve';
            $application->save();

            return redirect()->back()->with('success', "Application approved successfully");
        } else {
            return redirect()->back()->with('error', "Cannot approve application. Maximum lot quantity reached.");
        }
    }

    public function reject(Application $application){
         // Fetch the event associated with the application
         $event = $application->event;

         // Check if the application was previously approved
         if ($application->status == 'Approve') {
             // Decrease the availability by 1
             $event->availabality -= 1;
             $event->save();
         }
 
         // Update the application's status to 'Reject'
         $application->status = 'Reject';
         $application->save();
 
         return redirect()->back()->with('success', "Application rejected successfully");
    }
}
