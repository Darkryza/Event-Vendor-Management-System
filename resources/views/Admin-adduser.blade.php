@extends('include.layout')
@include('include.header')
@section('title','Add User')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container d-flex justify-content-center w-75">
            <h2 class="text-center">Add user</h2>
            @if (session()->has('error'))
                <div class="alert alert-danger mx-3">{{ session('error') }}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success mx-3">{{ session('success') }}</div>
            @endif
            <form action="{{ route('register') }}" method="POST" class="mx-3">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option selected disabled hidden></option>
                        <option value="Event Manager">Event Manager</option>
                        <option value="Vendor">Vendor</option>
                    </select>    
                </div>
                <div class="mb-3">
                    <label for="UTM_relation" class="form-label">UTM Relation</label>
                    <select name="UTM_relation" id="UTM_relation" class="form-select">
                        <option selected disabled hidden></option>
                        <option value="Student">Student</option>
                        <option value="Staff">Staff</option>
                        <option value="Public">Public</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ic_number" class="form-label">IC Number</label>
                    <input type="text" name="ic_number" id="ic_number" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="SSM_num" class="form-label">SSM Number (Optional)</label>
                    <input type="text" name="SSM_num" id="SSM_num" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">    
                </div>
                <div class="mb-3 d-flex justify-content-center gap-4">
                    <a href="viewUsers" class=" button">Cancel</a>
                    <button type="submit" class=" button">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection