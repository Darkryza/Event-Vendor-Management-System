@extends('include.layout')
@include('include.header')
@section('title','Home EVUTM')
@section('content')

<div class="body-container">
    <div class="title">
        <h1>Dashboard</h1>
    </div>
    <div class="add-event-btn">
        <a href="/addEvent">Add Event</a>
    </div>
    
    @if (session()->has('success'))
        <div class="alert alert-success mx-3 my-1">{{ session('success') }}</div>
    @endif
    <div class="events-container">
        @foreach ($events as $event)
        <div class="managerEvents-card">
            <a href="/pageEvent/{{ $event->id }}" class="link-cardEvent">
                <div class="img-events">
                    <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="events">
                </div>
                <div class="eventsInfo-container">
                  <h4><b>{{ $event->title }}</b></h4>
                  <p>{{ $event->duration }} days</p>
                  <p><b>{{ $event->status }}</b></p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>



@endsection