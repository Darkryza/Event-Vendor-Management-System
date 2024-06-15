@extends('include.layout')
@section('title','Register EVUTM')
@section('content')
<div class="bodyAuth">    
    <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="utmlogo-container"> 
                            <div class="utmlogo"><img src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt=""></div>
                        </div>
                        <div class="title"><h1>Register Page</h1></div>
                        <div class="card-body py-1">
                            <div class="mt-5">
                                
                                @if ($errors->any())
                                    <div class="col-12">
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div class="alert alert-danger">Register not valid</div>
                                @endif

                                @if (session()->has('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                            </div>
                            <form action="/register" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="px-1 form-label required">Name</label>
                                    <input name="name" id="name" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="px-1 form-label required">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="" disabled selected hidden></option>
                                        <option value="Event Manager">Event Manager</option>
                                        <option value="Vendor">Vendor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="UTM_relation" class="px-1 form-label required">UTM Relation</label>
                                    <select name="UTM_relation" id="UTM_relation" class="form-select">
                                        <option value="" disabled selected hidden></option>
                                        <option value="Student">Student</option>
                                        <option value="UTM Staff">UTM Staff</option>
                                        <option value="Public">Public</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ic_number" class="px-1 form-label required">IC Number</label>
                                    <input name="ic_number" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="px-1 form-label required">Phone Number</label>
                                    <input name="phone_number" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="SSM_num" class="px-1 form-label">SSM Number (Optional)</label>
                                    <input name="SSM_num" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="px-1 form-label required">Email</label>
                                    <input name="email" type="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="px-1 form-label required">User Name (Display name: Ali)</label>
                                    <input name="username" type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="px-1 form-label required">Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <div class="btn-user">
                                    <button type="submit" class="btn">Submit</button>
                                </div>
                            </form>
                            <div class="backHome-container">
                                <a href="/" class="backHome">Back home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
