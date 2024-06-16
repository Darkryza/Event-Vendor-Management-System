@extends('include.layout')
@include('include.header')
@section('title','View Users')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="list">
            <div class="admin-upper-container">
                <h2>List of events</h2>
                <div class="my-1 d-flex gap-3">
                    <a class="button" href="{{ route('admin_homepage') }}">Back</a>
                    <a class="button" href="{{ route('admin.addevent') }}">Add event</a>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success my-3 mx-3">{{ session('success') }}</div>
                @endif
            </div>  
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
                        <th>Manager</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->duration }} days</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>{{ $event->status }}</td>
                            <td>{{ $event->user->name }}</td>
                            <td>
                                <div class="listuser-btn">
                                    <a href="#">Edit</a>
                                    <form action="{{ route('Admin.deleteEvent', ['event' => $event->id]) }}" method="POST">
                                       @csrf
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

@endsection

