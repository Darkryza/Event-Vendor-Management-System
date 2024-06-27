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
                  <a class="nav-link active" href="viewUsers">Users</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="viewEvents">Event</a>
                </li>
                <li class="nav-item admin-link">
                    <a class="nav-link" href="{{ route('Admin.viewApplications') }}">Applications</a>
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <div class="list">
                <div class="admin-upper-container">
                    <h2>List of Users</h2>
                    <div class="d-flex gap-3">
                        <a class="button" href="adduser">Add user</a>                        
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success my-3 mx-3">{{ session('success') }}</div>
                    @endif
                </div>
                <div>Total user: {{ $totalUsers }}</div>  
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
</div>

@endsection