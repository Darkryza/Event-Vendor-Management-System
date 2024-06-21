@extends('include.layout')
@include('include.header')
@section('title','Home EVUTM')
@section('content')

<div class="body-container">
    <div class="title">
        <h1>Vendor Home Page</h1>
    </div>
    <div class="applications-btn">
        <a href="/vendorApplications/{{ auth()->user()->id }}">My applications</a>
    </div>
    <div class="events-container">
        @foreach ($events as $event)
        <div class="events-card">
            <div class="event-info">
                <div class="img-events">
                    <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="events">
                </div>
                <div class="eventsInfo-container">
                    <div class="title">
                        <h4><b>{{ $event->title }}</b></h4> 
                    </div>
                    <div class="status-event">
                        <p>
                            @if ($event->status == 'Pending')
                                Upcoming
                            @endif
                        </p>
                    </div>
                    <div>
                        <h5>Availability:</h5>
                        <p>{{ $event->availabality }}/{{ $event->Lot_Quantity }}</p>
                    </div>
                </div>
                <div class="applyEvent">
                    <a href="/viewEvent/{{ $event->id }}">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>    
</div>

@endsection