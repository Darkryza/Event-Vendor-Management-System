@extends('include.layout')
@include('include.header')
@section('title','Home EVUTM')
@section('content')

<div class="body-container">
    <div class="content">
        <div class="nav-content">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link active" href="{{ route("manager_homepage") }}">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="{{ route('manager-listEvents') }}">Events</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link" href="{{ route('Admin.viewApplications') }}">Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Manager Dashboard</h1>
            </div>
            <div class="add-event-btn">
                <a href="/addEvent">Add Event</a>
            </div>
            
            @if (session()->has('success'))
                <div class="alert alert-success mx-3 my-1">{{ session('success') }}</div>
            @endif
            <div class="events-container">
                @foreach ($events as $event)
                @if ($event->approval == "Approved")
                    <div class="managerEvents-card">
                        <a href="/pageEvent/{{ $event->id }}" class="link-cardEvent">
                            <div class="img-events">
                                <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="events">
                            </div>
                            <div class="eventsInfo-container">
                                <h4><b>{{ $event->title }}</b></h4>
                                <p>{{ $event->duration }} days</p>
                                <h5>Availability:</h5>
                                <p>
                                    @if ($event->availabality == $event->Lot_Quantity)
                                        <b>Full</b>
                                    @else
                                        {{ $event->availabality }}/{{ $event->Lot_Quantity }}
                                    @endif
                                </p>
                                <p><b>{{ $event->status }}</b></p>
                            </div>
                        </a>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection