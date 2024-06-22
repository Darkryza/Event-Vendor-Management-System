@extends('include.layout')
@include('include.header')
@section('title','Home EVUTM')
@section('content')

<div class="body-container">
    <div class="content">
        <div class="nav-content">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link active" href="{{ route("vendor_homepage") }}">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link" href="/vendorApplications/{{ auth()->user()->id }}">Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Vendor Home Page</h1>
            </div>
            <div class="events-container">
                @foreach ($events as $event)
                @if ($event->approval == "Approved")
                    @if ($event->status == 'Upcoming' || $event->status == 'Ongoing')
                        <div class="events-card">
                            <div class="event-info">
                                <div class="img-events">
                                    <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="events">
                                </div>
                                <div class="eventsInfo-container">
                                    <div class="title">
                                        <h4><b>{{ $event->title }}</b></h4> 
                                    </div>
                                    <p><br><b>{{ \Carbon\Carbon::parse($event->start_date)->format('j M Y') }}</b> <br>({{ $event->duration }} days)</p>
                                    <div class="status-event">
                                        @if ($event->status == 'Upcoming')
                                            <p class="bg-warning rounded"><b>Upcoming</b></p>
                                        @elseif ($event->status == 'Ongoing')
                                            <p class="bg-primary rounded"><b>Ongoing</b></p>
                                        @endif
                                    </div>
                                    <div>
                                        <h5>Availability:</h5>
                                        <p>
                                            @if ($event->availabality == $event->Lot_Quantity)
                                            <b>Full</b>
                                            @else
                                                {{ $event->availabality }}/{{ $event->Lot_Quantity }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="applyEvent">
                                    <a href="/viewEvent/{{ $event->id }}">View</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @endforeach
            </div> 
        </div>
    </div>
</div>

@endsection

