@extends('include.layout')
@section('title','Login EVUTM')
@section('content')

<div class="bodyAuth">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="utmlogo-container"> 
                        <div class="utmlogo"><img src="{{ asset('images/UTM-LOGO-FULL.png') }}" alt=""></div>
                    </div>
                    <div class="title"><h1>Login Page</h1></div>
                    <div class="card-body">

                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="btn-user">
                                <button type="submit" class="btn">Login</button>
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
