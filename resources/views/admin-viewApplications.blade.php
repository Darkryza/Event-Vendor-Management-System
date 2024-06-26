@extends('include.layout')
@include('include.header')
@section('title','View Users')
@section('content')

<div class="body-container">

    <div class="admin-container">

        <div class="admin-nav">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link" href="{{ route('admin_homepage') }}">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="viewUsers">Users</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="viewEvents">Event</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link active" href="{{ route('Admin.viewApplications') }}">Applications</a>
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <div class="list">
                <div class="admin-upper-container">
                    <h2>List of Applications</h2>
                    @if (session()->has('success'))
                    <div class="alert alert-success my-3 mx-3">{{ session('success') }}</div>
                    @endif
                </div>  
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Event</th>
                            
                            <th>Start Date</th>
                            
                            <th>Vendor Name</th>
                            <th>Booth Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Category</th>
                            <th>Lot Number</th>
                            <th>Receipt Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $application->event->title }}</td>
                                
                                <td>{{ \Carbon\Carbon::parse($application->event->start_date)->format('j F Y') }}</td>
                                
                                <td>{{ $application->vendor_name }}</td>
                                <td>{{ $application->booth_name }}</td>
                                <td>{{ $application->user->email }}</td>
                                <td>{{ $application->phone_number }}</td>
                                <td>{{ $application->category }}</td>
                                <td>{{ $application->no_of_lot }}</td>        
                                <td><a href="{{ asset ('images/'.$application->receipt_name) }}" target="_blank">{{ $application->receipt_name }}</a></td>
                                <td>
                                    @if ($application->status == 'Pending')
                                        <button class="btn btn-warning">Pending</button>
                                    @elseif ($application->status == 'Approved')
                                        <button class="btn btn-success">Approve</button>
                                    @elseif ($application->status == 'Rejected')
                                        <button class="btn btn-danger">Reject</button>
                                    @endif
                                </td>        
                                <td>
                                    <div class="listuser-btn">
                                        <a href="{{ route('editApplication', ['application' => $application->id]) }}">Edit</a>
                                        <form action="{{ route('deleteApplyEvent', ['application' => $application->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection