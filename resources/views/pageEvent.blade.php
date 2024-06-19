@extends('include.layout')
@include('include.header')
@section('title','Event')
@section('content')

<div class="body-container">
    <div class="managerEventInfo-container">
        <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="Event Poster">
        <div class="managerDetail-event">
            <div class="title-event">
                <h1>Detail</h1>
            </div>
            <div class="content-event">
                <p>Duration: {{ $event->duration }} Days</p>
                <p>Start Date: {{ \Carbon\Carbon::parse($event->start_date)->format('j F Y') }}</p>
                <p>End Date: {{ \Carbon\Carbon::parse($event->end_date)->format('j F Y') }}</p>
                <p>Lot Quantity: {{ $event->Lot_Quantity }} vendors needed</p>
                <p>Lot Price: {{ $event->lot_price }}</p>
            </div>
        </div>
        <div class="managerAbout-event">
            <div class="title-event">
                <h1>About</h1>
            </div>
            <div class="content-event">
                <p style="text-align: justify;">{{ $event->description }}</p>
            </div>
        </div>
    </div>
    <div class="editEvent-btn">
        <a href="/manager_homepage">Back</a>
        <a href="/editEvent/{{ $event->id }}">Edit</a>
        <a href="/list-applications/{{ $event->id }}">List Applications</a>
    </div>
</div>

@endsection