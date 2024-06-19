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
            <div class="event-content">
                <h4>Details:</h4>
                <p>Location: {{ $event->location }}</p>
                <p>Start Date: {{ \Carbon\Carbon::parse($event->start_date)->format('j F Y') }}</p>
                <p>End Date: {{ \Carbon\Carbon::parse($event->end_date)->format('j F Y') }}</p>
                <p>Lot Quantity: {{ $event->Lot_Quantity }} vendors needed</p>
                <p>Status: {{ $event->status }}</p>
            </div>
        </div>
        <div class="view-content-event">
            <h4>Description of event:</h4>
            <p style="text-align: justify;">{{ $event->description }}</p>
        </div>
        <div class="view-content-event expand">
            <h4 class="eventPhotos-title text-center">Photo:</h4>
            <div id="carouselExample" class="carousel slide border border-black img-resize-viewEvent">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('images/'.$event->name_imgPoster) }}" class="d-block img-resize-viewEvent" alt="Event Poster">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('images/'.$event->name_imgLayout) }}" class="d-block img-resize-viewEvent" alt="Event Layout">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('images/'.$event->name_imgQR) }}" class="d-block img-resize-viewEvent" alt="Event QR">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
    </div>
</div>

@endsection