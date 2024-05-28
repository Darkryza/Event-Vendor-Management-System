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
            'lot_quantity' => 'required',
            'status' => 'required'
        ]);

        $poster_name = $request->file('poster_image')->getClientOriginalName();
        $poster_size = $request->file('poster_image')->getSize();
        $request->file('poster_image')->storeAs('public/images', $poster_name);
        
        $layout_name = $request->file('layout_image')->getClientOriginalName();
        $layout_size = $request->file('layout_image')->getSize();
        $request->file('layout_image')->storeAs('public/images', $layout_name);

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
        $event->Lot_Quantity = $request->lot_quantity;
        $event->status = $request->status;
        $event->user_id = auth()->user()->id;
        $event->save();

        return redirect()->back()->with('success', 'Event added successfully');
    }

    public function editEvent(Request $request, Event $event){
        $title = $request->input('title');
        $date =  $request->input('date');
        $description = $request->input('description');
    
        // Check if the image input exists in the request
        if ($request->hasFile('image')) {
            $name_photo = $request->file('image')->getClientOriginalName();
            $size_photo = $request->file('image')->getSize();
            
            $request->file('image')->storeAs('public/images', $name_photo);
        } else {
            // If the image input doesn't exist, retain the existing image details
            $name_photo = $event->name_image;
            $size_photo = $event->size_image;
        }
    
        Event::where('id', $event->id)->update([
            'title' => $title,
            'date' => $date,
            'description' => $description,
            'name_image' => $name_photo,
            'size_image' => $size_photo
        ]);
    
        return redirect()->back()->with('success', 'Event updated successfully');
    }
    
    public function deleteEvent(Request $request,Event $event){
        Event::where('id', $event->id)->delete();

        return redirect('/manager_homepage')->with('success', $event->title.' deleted successfully');
    }

}
