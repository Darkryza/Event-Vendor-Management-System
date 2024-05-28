@extends('include.layout')
@include('include.header')
@section('title','Home EVUTM')
@section('content')

<div class="body-container">
    <div class="title">
        <h1>Vendor Home Page</h1>
    </div>
    
    <div class="events-container">
        @foreach ($events as $event)
        <div class="events-card">
            <div class="event-info">
                <div class="img-events">
                    <img src="{{ asset('storage/images/' . $event->name_image) }}" alt="events">
                </div>
                <div class="eventsInfo-container">
                    <div class="title">
                        <h4><b>{{ $event->title }}</b></h4> 
                    </div>
                </div>
                <div class="applyEvent">
                    <a href="/viewEvent/{{ $event->id }}" class="applyEvent-btn">Apply</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>    
</div>

@endsection