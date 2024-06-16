@extends('include.layout')
@include('include.header')
@section('title','View Users')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="list">
            <div class="admin-upper-container">
                <h2>List of Users</h2>
                <div class="d-flex gap-3">
                    <a class="button" href="adduser">Add user</a>
                    <a class="button" href="admin_homepage">Back</a>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success my-3 mx-3">{{ session('success') }}</div>
                @endif
            </div>  
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="listuser-btn">
                                    <a href="/edituser/{{ $user->id }}">Edit</a>
                                    <form action="{{ route('delete.user',['user' => $user->id]) }}" method="POST">
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

{{-- 

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
                                <a href="/edituser/{{ $user->id }}">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 

--}}