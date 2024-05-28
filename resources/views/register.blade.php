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
                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <select name="role" id="role" class="form-select">
                                        <option value="" disabled selected hidden>Role</option>
                                        <option value="Event Manager">Event Manager</option>
                                        <option value="Vendor">Vendor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select name="UTM_relation" id="UTM_relation" class="form-select">
                                        <option value="" disabled selected hidden>Relation</option>
                                        <option value="Student">Student</option>
                                        <option value="UTM Staff">UTM Staff</option>
                                        <option value="Public">Public</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input name="ic_number" type="text" class="form-control" placeholder="IC Number">
                                </div>
                                <div class="mb-3">
                                    <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="mb-3">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <input name="username" type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <input name="password" type="password" class="form-control" placeholder="Password">
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
