@extends('include.layout')
@include('include.header')
@section('title', 'Edit Event')
@section('content')

<div class="body-container">
    <div class="editEvent-container">
        <div class="upperEditEvent-container">
            <h2>Edit Event</h2>
            <div class="upper-btn">
                <form action="/deleteEvent/{{ $event->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="delete-btn">
                    <button type="submit">Delete</button>
                    </div>
                </form>            
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success mx-3">{{ session('success') }}</div>
        @endif
        <div class="eventContent-container">
            <div class="editEvent-poster">
                <img src="{{ asset('storage/images/'.$event->name_imgPoster) }}" alt="Event Poster">
            </div>
            <form action="/editEvent/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="formEditEvent-container">
                    {{-- <label for="title" class="label">Event Title</label>
                    <div class="edit-value">
                        <input type="text" name="title" id="title" value="{{ $event->title }}">
                    </div>
                    <label for="date" class="label">Date</label>
                    <div class="edit-value">
                        <input type="date" name="date" id="date" value="{{ $event->date }}">
                    </div>
                    <label for="description" class="label">Event Description</label>
                    <div class="edit-value">
                        <textarea name="description" id="description" cols="5" rows="5">{{ $event->description }}</textarea>
                    </div>
                    <label for="image" class="label mt-3">Poster Event</label>
                    <div class="edit-value">
                        <input type="file" id="image" name="image" accept="image/*">
                    </div> --}}
                    <div class="mb-3 mx-5">
                        <label for="title" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="description" class="form-label">Event Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="date" class="form-label">Event Start Date</label>
                        <input type="date" class="form-control" id="date" name="start_date" value="{{ $event->start_date }}">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="date" class="form-label">Event End Date</label>
                        <input type="date" class="form-control" id="date" name="end_date" value="{{ $event->end_date }}">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="agreement" class="form-label">Agreement (Rules)</label>
                        <textarea class="form-control" id="agreement" name="agreement" rows="3">{{ $event->agreement }}</textarea>
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="poster" class="form-label">Poster Event</label><br>
                        <input type="file" id="image" name="image" accept="image/*">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="poster" class="form-label">Layout Event</label><br>
                        <input type="file" id="image" name="layout_image" accept="image/*">
                    </div>
                    <div class="mb-3 mx-5" style="width: 100px">
                        <label for="lot_quantity" class="form-label">Lot Quantity</label>
                        <input type="number" class="form-control" id="lot_quantity" name="lot_quantity" min="1" value="{{ $event->Lot_Quantity }}">
                    </div>
                    <div class="mb-3 mx-5">
                        <label for="status" class="form-label">Status Event</label><br>
                        <select name="status" id="status" class="form-select">
                            <option value="Pending" {{ $event->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Ongoing" {{ $event->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
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
            <div class="editEvent-layout">
                <img src="{{ asset('storage/images/'.$event->name_imgLayout) }}" alt="Event Layout">
            </div>
        </div>
    </div>
    
    
</div>

@endsection