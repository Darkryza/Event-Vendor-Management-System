@extends('include.layout')
@include('include.header')
@section('title','Edit User')
@section('content')

<div class="body-container">
    <div class="edit-user-container">
        <h1>Edit User</h1>
        @if (session()->has('success'))
            <div class="alert alert-success mx-3">{{ session('success') }}</div>
        @endif
        <div class="form-edit-user">
            <form action="/edituser/{{ $user->id }}" class="edit-user" method="POST">
                @csrf
                @method('PUT')
                <div class="edituser-label">
                    <label for="name">Name: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="edituser-label">
                    <label for="role">Role: </label>
                </div>
                <select name="role" id="role" class="form-select">
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Event Manager" {{ $user->role == 'Event Manager' ? 'selected' : '' }}>Event Manager</option>
                    <option value="Vendor" {{ $user->role == 'Vendor' ? 'selected' : '' }}>Vendor</option>
                </select>
                <div class="edituser-label">
                    <label for="ic_number">IC Number: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="IC_number" id="IC_number" value="{{ $user->IC_number }}">
                </div>
                <div class="edituser-label">
                    <label for="phone_number">Phone number: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
                </div>
                <div class="edituser-label">
                    <label for="email">Email: </label>
                </div>
                <div class="edit-value">
                    <input type="email" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="edituser-label">
                    <label for="username">User name: </label>
                </div>
                <div class="edit-value">
                    <input type="text" name="username" id="username" value="{{ $user->username }}">
                </div>
                <div class="edituser-label">
                    <label for="password">Password: </label>
                    <small>Leave blank if you don't want to change the password</small>
                </div>
                <div class="edit-value">
                    <input type="password" name="password" id="password">
                </div>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/viewUsers" class="btn button-editUser">Back</a>
                    <button type="submit" class="btn button-editUser">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection