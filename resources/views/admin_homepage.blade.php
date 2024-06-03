@extends('include.layout')
@include('include.header')
@section('title','Admin Page')
@section('content')

<div class="body-container">
    <div class="list">
        <div class="admin-upper-container">
            <h2>List of Users</h2>
            <div class="btn-Add">
                <a href="/adduser">Add user</a>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="listuser-btn">
                                <a href="/edituser/{{ $user->id }}">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="list">
        <div class="admin-upper-container">
            <h2>List of events</h2>
            <div class="btn-Add">
                <a href="/AddEvent">Add event</a>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>ID</th>
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
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->duration }} days</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td>
                            <div class="listuser-btn">
                                <a href="/edituser/{{ $user->id }}">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection