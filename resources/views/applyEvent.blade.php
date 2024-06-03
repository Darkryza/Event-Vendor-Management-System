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
                <li><a href="/verify/{{ $event->id }}">Verify</a></li>
                <li><a href="/payment/{{ $event->id }}">Payment</a></li>
            </ul>
        </div>
        <div class="form-applyEvent">
            <form action="/bookEvent-application" method="POST">
                @csrf
                <div class="mb-4">
                    <input name="name" type="text" class="form-control" placeholder="Vendor Name">
                </div>
                <div class="mb-4">
                    <input name="name" type="text" class="form-control" placeholder="Booth Name">
                </div>
                <div class="mb-4">
                    <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                </div>
                <div class="mb-4">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Category</option>
                        <option value="Clothes">Clothes</option>
                        <option value="F&B">Foods and Beverages</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Others">Others</option>
                      </select> 
                </div>
                <div class="button-applyEvent">
                    <button type="submit" class="btn-applyEvent">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection