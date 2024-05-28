@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="upperEvent-container">
        <h1>{{ $event->title }}</h1>
        <div class="home-btn">
            <a href="/vendor_homepage">Home</a>
        </div>
        <div class="apply-btn">
            <a href="/applyEvent/{{ $event->id }}">Apply</a>
        </div>
    </div>
    <div class="titleTable-container">
        <h4>Details</h4>
        <h4>About Event</h4>
        <h4 class="eventPhotos-title">Photo</h4>
    </div>
    <div class="contentEvent-container">
        <div class="detailEvent">
            <p>Date: {{ \Carbon\Carbon::parse($event->date)->format('j F Y') }}</p>
        </div>
        <div class="aboutEvent">
            <p>{{ $event->description }}</p>
        </div>
        <div class="imgEvent">
            <img src="{{ asset('storage/images/'.$event->name_image) }}" alt="Event Poster">
        </div>
    </div>
</div>

@endsection