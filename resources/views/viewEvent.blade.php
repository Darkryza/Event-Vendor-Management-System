@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="container">
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
                    <p><b>Organiser:</b>{{ $event->organiser }}</p>
                    <p><b>Manager:</b>{{ $event->user->name }}</p>
                    <p><b>Phone number:</b>{{ $event->user->phone_number }}</p>
                    <p><b>Email:</b>{{ $event->user->email }}</p>
                    <p><b>Location:</b> {{ $event->location }}</p>
                    <p><b>Start Date:</b> {{ \Carbon\Carbon::parse($event->start_date)->format('j F Y') }}</p>
                    <p><b>End Date:</b> {{ \Carbon\Carbon::parse($event->end_date)->format('j F Y') }}</p>
                    <p><b>Lot Quantity:</b> {{ $event->Lot_Quantity }} vendors needed</p>
                    <p><b>Status:</b>
                        @if ($event->status == 'Pending')
                            Upcoming
                        @else
                            {{ $event->status }}
                        @endif
                    </p>
                    <p>
                        <b>Lot Price:</b><br>
                        {!! nl2br(e($event->lot_price)) !!}
                    </p>
                </div>
            </div>
            <div class="view-content-event">
                <h4>Description of event:</h4>
                <p style="text-align: justify;">{{ $event->description }}</p>
            </div>
            <div class="view-content-event">
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
</div>

@endsection