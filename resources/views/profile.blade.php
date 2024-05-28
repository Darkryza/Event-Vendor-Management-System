@extends('include.layout')
@include('include.header')
@section('title', 'Profile EVUTM')
@section('content')

<div class="body-container">
    <div class="card-container">
        <div class="upper-profile-card">
            <h1>Profile Page</h1><br>
            <div class="editProfile-btn">
                <a href="/editProfile/{{ auth()->user()->id }}">Edit Profile</a>
            </div>
        </div>
        <div class="profile-information">
            <div class="label">
                <label for="name">Name: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->name }}</p>
            </div>
            <div class="label">
                <label for="role">Role: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->role }}</p>
            </div> 
            <div class="label">
                <label for="ic_number">IC Number: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->IC_number }}</p>
            </div>
            <div class="label">
                <label for="phone_number">Phone number: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->phone_number }}</p>
            </div>
            <div class="label">
                <label for="email">Email: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->email }}</p>
            </div>
            <div class="label">
                <label for="username">User name: </label>
            </div>
            <div class="box-value">
                <p class="label-value">{{ auth()->user()->username }}</p>
            </div>    
        </div> 
    </div>
</div>

@endsection