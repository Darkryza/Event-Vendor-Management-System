@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="upperEvent-container">
        <h1>{{ $event->title }}</h1>
        <div class="view-event-btn">
            <a href="/vendor_homepage">Home</a>
            <a href="/applyEvent/{{ $event->id }}">Apply</a>
        </div>
    </div>
    <div class="event-container">
        <div class="view-content-event">
            <h4>Details:</h4>
            <p>Date: {{ \Carbon\Carbon::parse($event->date)->format('j F Y') }}</p>
            <p>Location: {{ $event->location }}</p>
            <p>Start Date: {{ $event->start_date }}</p>
            <p>End Date: {{ $event->end_date }}</p>
            <p>Lot Quantity: {{ $event->Lot_Quantity }} vendors needed</p>
            <p>Status: {{ $event->status }}</p>
        </div>
        <div class="view-content-event">
            <h4>Description of event:</h4>
            <p>{{ $event->description }}</p>
        </div>
        <div class="view-content-event">
            <h4 class="eventPhotos-title">Photo:</h4>
            <img src="{{ asset('storage/images/'.$event->name_imgPoster) }}" alt="Event Poster">
        </div>
        
    </div>
</div>

@endsection