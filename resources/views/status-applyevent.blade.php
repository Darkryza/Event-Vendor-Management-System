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
                <li><a href="/verify/{{ $event->id }}">Verify</a></li>
                <li><a href="/payment/{{ $event->id }}">Payment</a></li>
                <li><a href="/status/{{ $event->id }}" class="active">Status</a></li>
            </ul>
        </div>
        <div class="form-applyEvent">
                <div class="mb-3 mx-5">
                    <h4>Status</h4>
                    <p>Pending</p>
                </div>
        </div>
    </div>
</div>

@endsection

@endsection