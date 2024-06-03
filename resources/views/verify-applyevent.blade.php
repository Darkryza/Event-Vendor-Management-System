@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

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
                <li><a href="/applyEvent/{{ $event->id }}">Details</a></li>
                <li><a href="/verify/{{ $event->id }}" class="active">Verify</a></li>
                <li><a href="/payment/{{ $event->id }}">Payment</a></li>
                <li><a href="">Status</a></li>
            </ul>
        </div>
        <div class="form-applyEvent">
            <form action="/bookEvent" method="POST">
                @csrf
                <div class="mb-4">
                    <h4>Agreement:</h4>
                    <p>{{ $event->agreement }}</p>
                </div>
                <input type="checkbox" id="agree" name="agree" value="true">
                <label for="agree"> I Agree</label><br>
                <div class="btn-user">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@endsection