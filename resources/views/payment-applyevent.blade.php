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
                <li><a href="/payment/{{ $event->id }}" class="active">Payment</a></li>
                <li><a href="/status/{{ $event->id }}">Status</a></li>
            </ul>
        </div>
        <div class="form-applyEvent">
            <div class="qr-payment">
                <img src="https://www.easywedding.com.my/image/easywedding/image/data/IMG_2251.jpg" alt="QR Payment" style="height: 200px">
            </div>
            <form action="/bookEvent" method="POST">
                <div class="mb-3">
                    <label for="receipt-payment" class="form-label">Receipt Payment</label><br>
                    <input type="file" id="receipt-payment" name="receipt-payment" accept="image/*">
                </div>
                <div class="btn-user">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@endsection