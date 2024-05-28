@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="upperEvent-container">
        <h1>{{ $event->title }}</h1>
    </div>
    <div class="title-upperEvent-container">
        <p>Vendor Application</p>
    </div>
    <div class="content-applyEvent">
        <div class="link-application">
            <ul>
                <li><a href="" class="active">Details</a></li>
                <li><a href="">Verify</a></li>
                <li><a href="">Payment</a></li>
                <li><a href="">Status</a></li>
            </ul>
        </div>
        <div class="form-applyEvent">
            <form action="/bookEvent" method="POST">
                @csrf
                <div class="mb-4">
                    <input name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="mb-4">
                    <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                </div>
                <div class="mb-4">
                    <input name="type_sell" type="text" class="form-control" placeholder="Type of Sell">
                </div>
                <div class="btn-user">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection