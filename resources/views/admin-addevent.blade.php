@extends('include.layout')
@include('include.header')
@section('title','Add Event')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container d-flex flex-column py-3">
            <h2 class="text-center">Add Event</h2>
            @if (session()->has('error'))
                <div class="alert alert-danger mx-3">{{ session('error') }}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success mx-3">{{ session('success') }}</div>
            @endif
            <form action="{{ route('addEvent') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mx-5">
                    <label for="title" class="form-label">Event Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3 mx-5">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="mb-3 mx-5">
                    <label for="description" class="form-label">Event Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3 mx-5">
                    <label for="date" class="form-label">Event Start Date</label>
                    <input type="date" class="form-control" id="date" name="start_date">
                </div>
                <div class="mb-3 mx-5">
                    <label for="date" class="form-label">Event End Date</label>
                    <input type="date" class="form-control" id="date" name="end_date">
                </div>
                <div class="mb-3 mx-5">
                    <label for="agreement" class="form-label">Agreement (Rules)</label>
                    <textarea class="form-control" id="agreement" name="agreement" rows="3"></textarea>
                </div>
                <div class="mb-3 mx-5">
                    <label for="poster" class="form-label">Poster Event</label><br>
                    <input type="file" id="poster" name="poster_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label for="layout" class="form-label">Layout Event</label><br>
                    <input type="file" id="layout" name="layout_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label for="qr" class="form-label">QR Bank</label><br>
                    <input type="file" id="qr" name="qr_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3 mx-5" style="width: 100px">
                    <label for="lot_quantity" class="form-label">Lot Quantity</label>
                    <input type="number" class="form-control" id="lot_quantity" name="lot_quantity" min="1">
                </div>       
                <div class="mx-5 text-center">
                    <button type="submit" class="button">Submit</button>
                </div>    
            </form>
        </div>
    </div>
</div>

@endsection