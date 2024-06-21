@extends('include.layout')
@include('include.header')
@section('title','Manager List Applications')
@section('content')

<div class="body">
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
                    <a class="nav-link active" href="{{ route('manager-listApplications') }}">Applications</a>
                </li>
            </ul>
        </div>
        <div class="main-content">

        </div>
    </div>
</div>

@endsection