@extends('include.layout')
@include('include.header')
@section('title','Manager List Events')
@section('content')

<div class="body-container">
    <div class="content">
        <div class="nav-content">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link" href="{{ route("manager_homepage") }}">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link active" href="{{ route('manager-listEvents') }}">Events</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link" href="{{ route('manager-listApplications') }}">Vendor Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h2 class="text-center">List Events</h2>
            <div class="d-flex justify-content-center">
                <a href="{{ route('addEvent') }}" class="button">Add Event</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Approval</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->duration }} days</td>
                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('j M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->end_date)->format('j M Y') }}</td>
                            <td>{{ $event->status }}</td>
                            <td>
                                @if ($event->approval == 'Pending')
                                    <div class="btn btn-warning">Pending</div>
                                @elseif ($event->approval == 'Approved')
                                    <div class="btn btn-success">Approved</div>
                                @elseif ($event->approval == 'Rejected')
                                    <div class="btn btn-dangerr">Rejected</div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row gap-3">
                                    <a href="{{ route('pageEvent', ['event' => $event->id]) }}" class="button">View</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection