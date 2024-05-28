@extends('include.layout')
@include('include.header')
@section('title','Event')
@section('content')

<div class="body-container">
    <div class="managerEventInfo-container">
        <img src="{{ asset('storage/images/'.$event->name_imgPoster) }}" alt="Event Poster">
        <div class="managerAbout-event">
            <div class="title-event">
                <h1>About</h1>
            </div>
            <div class="content-event">
                <p>{{ $event->description }}</p>
            </div>
        </div>
        <div class="managerDetail-event">
            <div class="title-event">
                <h1>Detail</h1>
            </div>
            <div class="content-event">
                <p>Duration: {{ $event->duration }} Days</p>
                <p>Date: {{ \Carbon\Carbon::parse($event->start_date)->format('j F Y') }}</p>
                <p>Date: {{ \Carbon\Carbon::parse($event->end_date)->format('j F Y') }}</p>
            </div>
        </div>
    </div>
    <div class="editEvent-btn">
        <a href="/manager_homepage">Back</a>
        <a href="/editEvent/{{ $event->id }}">Edit</a>
    </div>
</div>

@endsection