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
                    <a class="nav-link" href="{{ route('manager-listApplications') }}">Vendor Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Manager Dashboard</h1>
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
                                <p><br><b>{{ \Carbon\Carbon::parse($event->start_date)->format('j M Y') }}</b> <br>({{ $event->duration }} days)</p>
                                <h5>Availability:</h5>
                                
                                    @if ($event->availabality == $event->Lot_Quantity)
                                        <p><b>Full</b></p>
                                    @else
                                        <p>
                                            {{ $event->availabality }}/{{ $event->Lot_Quantity }}
                                        </p>
                                    @endif
                                
                                @if ($event->status == 'Upcoming')
                                    <p class="bg-warning rounded"><b>{{ $event->status }}</b></p>
                                @elseif ($event->status == 'Ongoing')
                                    <p class="bg-primary rounded"><b>{{ $event->status }}</b></p>
                                @elseif ($event->status == 'Completed')
                                    <p class="bg-success rounded text-white"><b>{{ $event->status }}</b></p>
                                @endif
                                
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