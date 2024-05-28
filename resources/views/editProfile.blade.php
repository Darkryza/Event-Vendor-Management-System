@extends('include.layout')
@include('include.header')
@section('title', 'Edit Profile')
@section('content')

<div class="body-container">
    <div class="card-container">
        <div class="upper-editprofile-card">
            <h1 style="margin-left: 0">Edit Profile</h1><br>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success mx-3">{{ session('success') }}</div>
        @endif
        <div class="profile-information">
            <form name="editprofileform" action="/editProfile/{{ $user->id }}" onsubmit="return validateForm()" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="label">
                    <label for="name">Name: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="label">
                    <label for="role">Role: </label>
                </div>
                <div class="box-value">
                    <p class="label-value">{{ $user->role }}</p>
                </div> 
                <div class="label">
                    <label for="ic_number">IC Number: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="IC_number" id="IC_number" value="{{ $user->IC_number }}">
                </div>
                <div class="label">
                    <label for="phone_number">Phone number: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
                </div>
                <div class="label">
                    <label for="email">Email: </label>
                </div>
                <div class="edit-value">
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="label">
                    <label for="username">User name: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="username" id="username" value="{{ $user->username }}">
                </div>
                <div class="edit-btn">
                    <div class="save-btn">
                        <button type="submit">Save</button>
                    </div>
                    <div class="cancel-btn">
                        <a href="/profile">Cancel</a>
                    </div> 
                </div>
            </form>
        </div>    
    </div>
</div>

@endsection