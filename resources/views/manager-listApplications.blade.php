@extends('include.layout')
@include('include.header')
@section('title','Manager List Applications')
@section('content')

<div class="body-container">
    <div class="content">
        <div class="nav-content">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link" href="{{ route("manager_homepage") }}">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="{{ route('manager-listEvents') }}">Events</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link active" href="{{ route('manager-listApplications') }}">Vendor Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h2 class="text-center">List Application</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Event</th>
                        <th>Vendor Name</th>
                        <th>Booth Name</th>
                        <th>Phone Number</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td><b>{{ $application->event->title }}</b></td>
                            <td>{{ $application->vendor_name }}</td>
                            <td>{{ $application->booth_name }}</td>
                            <td>{{ $application->phone_number }}</td>
                            <td>{{ $application->category }}</td>
                            <td>
                                @if ($application->status == 'Pending')
                                    <div class="bg-warning rounded p-1 text-center"><b>Pending</b></div>
                                @elseif ($application->status == 'Approved')
                                    <div class="bg-success rounded p-1 text-center"><b>Approved</b></div>
                                @elseif ($application->status == 'Rejected')
                                    <div class="bg-danger rounded p-1 text-center"><b>Rejected</b></div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row gap-3">
                                    <a href="{{ route('viewVendor', ['application' => $application->id]) }}" class="button">View</a>
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