<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvent(Request $request){

        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'agreement' => 'required',
            'poster_image'=> 'required',
            'layout_image' => 'required',
            'qr_image' => 'required',
            'lot_quantity' => 'required',
        ]);

        $poster_name = $request->file('poster_image')->getClientOriginalName();
        $poster_size = $request->file('poster_image')->getSize();
        $request->file('poster_image')->storeAs('public/images', $poster_name);
        
        $layout_name = $request->file('layout_image')->getClientOriginalName();
        $layout_size = $request->file('layout_image')->getSize();
        $request->file('layout_image')->storeAs('public/images', $layout_name);

        $qr_name = $request->file('qr_image')->getClientOriginalName();

        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $duration = $start_date->diffInDays($end_date) + 1;

        $event = new Event();
        $event->title = $request->title;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->duration = $duration;
        $event->agreement = $request->agreement;
        $event->name_imgPoster = $poster_name;
        $event->size_imgPoster = $poster_size;
        $event->name_imgLayout = $layout_name;
        $event->size_imgLayout = $layout_size;
        $event->name_imgQR = $qr_name;
        $event->Lot_Quantity = $request->lot_quantity;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back()->with('success', 'Event added successfully');
    }

    public function editEvent(Request $request, Event $event){
        $title = $request->input('title');
        $location = $request->input('location');
        $description = $request->input('description');
        $start_date =  $request->input('start_date');
        $end_date =  $request->input('end_date');
        // Calculate duration days from start to end date
        $start_date = Carbon::parse($start_date);
        $end_date = Carbon::parse($end_date);
        // ...............................................
        $duration = $start_date->diffInDays($end_date) + 1;
        $agreement = $request->input('agreement');

        // Check if the poster image input exists in the request
        if ($request->hasFile('poster_image')) {
            $poster_name = $request->file('poster_image')->getClientOriginalName();
            $poster_size = $request->file('poster_image')->getSize();
            
            $request->file('poster_image')->storeAs('public/images', $poster_name);
        } else {
            // If the image input doesn't exist, retain the existing image details
            $poster_name = $event->name_imgPoster;
            $poster_size = $event->size_imgPoster;
        }
        // Check if the layout image input exists in the request
        if ($request->hasFile('layout_image')) {
            $layout_name = $request->file('layout_image')->getClientOriginalName();
            $layout_size = $request->file('layout_image')->getSize();
            
            $request->file('layout_image')->storeAs('public/images', $layout_name);
        } else {
            // If the image input doesn't exist, retain the existing image details
            $layout_name = $event->name_imgLayout;
            $layout_size = $event->size_imgLayout;
        }
    
        $Lot_Quantity = $request->input('lot_quantity');
        $status = $request->input('status');
        $user_id = auth()->user()->id;
        
        Event::where('id', $event->id)->update([
            'title' => $title,
            'location' => $location,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'duration' => $duration,
            'agreement' => $agreement,
            'name_imgPoster' => $poster_name,
            'size_imgPoster' => $poster_size,
            'name_imgLayout' => $layout_name,
            'size_imgLayout' => $layout_size,
            'Lot_Quantity' => $Lot_Quantity,
            'status' => $status,
            'user_id' => $user_id
        ]);
    
        return redirect()->back()->with('success', 'Event updated successfully');
    }
    
    public function deleteEvent(Request $request,Event $event){
        Event::where('id', $event->id)->delete();

        return redirect('/manager_homepage')->with('success', $event->title.' deleted successfully');
    }

}
