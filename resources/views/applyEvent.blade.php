@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="upperEvent-container">
        <h1>{{ $event->title }}</h1>
        <a href="/viewEvent/{{ $event->id }}">Back</a>
    </div>
    <div class="title-upperEvent-container">
        <p>Vendor Application</p>
    </div>
    <div class="content-applyEvent">
        <div class="form-applyEvent">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="/applyEvent/{{ $event->id }}/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input name="vendor_name" type="text" class="form-control" placeholder="Vendor Name">
                </div>
                <div class="mb-4">
                    <input name="booth_name" type="text" class="form-control" placeholder="Booth Name">
                </div>
                <div class="mb-4">
                    <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
                </div>
                <div class="mb-4">
                    <select name="category" class="form-select" aria-label="Default select example">
                        <option selected disabled hidden>Category</option>
                        <option value="Clothes">Clothes</option>
                        <option value="F&B">Foods and Beverages</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Others">Others</option>
                      </select> 
                </div>
                <div class="mb-4">
                    <input type="number" class="form-control" name="no_of_lot" placeholder="No of lot" min="0">
                </div>
                <div class="mb-4">
                    <h4>Agreement:</h4>
                    <p>{{ $event->agreement }}</p>
                </div>
                <input type="checkbox" id="agree" name="agreement" value="1">
                <label class="mb-4" for="agree"> I Agree</label><br>
                <div class="mb-3">
                    <label for="receipt_image" class="form-label"><h4>Receipt  Payment</h4></label><br>
                    <input type="file" id="receipt_image" name="receipt_image" accept="image/*">
                </div>
                <div class="button-applyEvent">
                    <button type="submit" class="btn-applyEvent">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection