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
                <p><b>Organiser:</b>{{ $event->organiser }}</p>
                <p><b>Duration:</b> {{ $event->duration }} Days</p>
                <p><b>Start Date:</b> {{ \Carbon\Carbon::parse($event->start_date)->format('j F Y') }}</p>
                <p><b>End Date:</b> {{ \Carbon\Carbon::parse($event->end_date)->format('j F Y') }}</p>
                <p><b>Lot Quantity:</b> {{ $event->Lot_Quantity }} vendors needed</p>
                <p><b>Lot of Price:</b></p>
                <p>{!! nl2br(e($event->lot_price)) !!}</p>
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
        <a href="{{ route('manager-listEvents') }}">Back</a>
        <a href="/list-applications/{{ $event->id }}">List Applications</a>
        <a href="/editEvent/{{ $event->id }}">Edit</a>
    </div>
</div>

@endsection