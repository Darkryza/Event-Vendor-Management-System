@extends('include.layout')
@include('include.header')
@section('title', 'Edit Event')
@section('content')

<div class="body-container">
    <div class="editEvent-container">
        <div class="upperEditEvent-container">
            <h2>Edit Event</h2>
            <form action="/deleteEvent/{{ $event->id }}" method="POST">
                @csrf
                @method('delete')
                <div class="d-flex flex-row gap-2">
                    <a href="{{ route('pageEvent',['event' => $event->id]) }}" class="button d-flex align-items-center" style="margin-top: 20;">Back</a>
                    <div class="delete-btn">
                        <button type="submit">Delete</button>
                    </div>  
                </div>  
            </form>  
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="eventContent-container">
            <div class="editEvent-img">
                <div class="editEvent-poster">
                    <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="Event Poster">
                </div>
                <div class="editEvent-layout">
                    <img src="{{ asset('images/'.$event->name_imgLayout) }}" alt="Event Layout">
                </div>
                <div class="editEvent-QR">
                    <img src="{{ asset('images/'.$event->name_imgQR) }}" alt="Event Layout">
                </div>
            </div>
            <form action="/editEvent/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="formEditEvent-container">
                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="organiser" class="form-label">Organiser</label>
                        <input type="text" class="form-control" id="organiser" name="organiser" value="{{ $event->organiser }}">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Event Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Event Start Date</label>
                        <input type="date" class="form-control" id="date" name="start_date" value="{{ $event->start_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Event End Date</label>
                        <input type="date" class="form-control" id="date" name="end_date" value="{{ $event->end_date }}">
                    </div>
                    <div class="mb-3">
                        <label for="agreement" class="form-label">Agreement (Rules)</label>
                        <textarea class="form-control" id="agreement" name="agreement" rows="3">{{ $event->agreement }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster Event</label><br>
                        <input type="file" id="poster" name="poster_image" accept="image/*" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="layout" class="form-label">Layout Event</label><br>
                        <input type="file" id="layout" name="layout_image" accept="image/*" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="qr" class="form-label">QR Bank</label><br>
                        <input type="file" id="qr" name="qr_image" accept="image/*" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="lot_price" class="form-label">Lot Price</label>
                        <textarea class="form-control" id="lot_price" name="lot_price" rows="3">{{ $event->lot_price }}</textarea>
                    </div>
                    <div class="mb-3" style="width: 100px">
                        <label for="lot_quantity" class="form-label">Lot Quantity</label>
                        <input type="number" class="form-control" id="lot_quantity" name="lot_quantity" min="1" value="{{ $event->Lot_Quantity }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Event</label><br>
                        <select name="status" id="status" class="form-select">
                            <option value="Upcoming" {{ $event->status == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                            <option value="Ongoing" {{ $event->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="Completed" {{ $event->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>      
                    <div class="updateEvent-btn">
                        <div class="save-btn">
                            <button type="submit" style="margin-right: 0">Save</button>
                        </div>
                        <div class="cancel-btn">
                            <a href="/pageEvent/{{ $event->id }}">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
</div>

@endsection