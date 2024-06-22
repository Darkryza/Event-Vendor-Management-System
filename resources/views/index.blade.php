@extends('include.layout')
@include('include.header')
@section('title','Welcome EVUTM')
@section('content')
<div class="background-image">
    <img src="{{ asset('images/gerbang-kelaur.jpg') }}" alt="background-wallpaer">
</div>
<div class="body-container">
    <div class="white-container">
        <div class="title_index">
            <h1>Welcome to EVUTM</h1>
        </div>
        <div class="text">
            <p>EVUTM simplifies event management at UTM by handling event and vendor applications. It's like a digital hub where manager event and vendors can come together to plan and execute events smoothly. With EVUTM, the manager can easily handle applications, scheduling, and finances, while vendors can showcase their services hassle-free. It's all about making event planning easier and more efficient for everyone involved. Whether it's scheduling a festival or booking a vendor for a concert, EVUTM has got it covered, making event management a breeze at UTM.</p>
            <p><b>Admin Number:</b> 012-3456789</p>
        </div>
    </div>
</div>
@endsection