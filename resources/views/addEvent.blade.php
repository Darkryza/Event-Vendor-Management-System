@extends('include.layout')
@include('include.header')
@section('title', 'Add Event')
@section('content')

<div class="body-container">
    <div class="card-container">
        <h1 class="mt-1 mb-4 mx-5">Add Event</h1>
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="mb-3 mx-5">
            <label class="form-label">Note: Make sure to put label for lot using number eg. 1-30. <span style="color: red;"><b>Cannot combine the character with number eg. A1-A30.</b></span> The requirement are not compatible with the system. Thank you.</label>
        </div>
    
        <form action="{{ route('addEvent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mx-5">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3 mx-5">
                <label for="organiser" class="form-label">Organiser</label>
                <input type="text" class="form-control" id="organiser" name="organiser">
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
            <div class="mb-3 mx-5">
                <label for="lot_price" class="form-label">Lot Price</label>
                <textarea class="form-control" id="lot_price" name="lot_price" rows="3"></textarea>
            </div>
            <div class="mb-3 mx-5" style="width: 100px">
                <label for="lot_quantity" class="form-label">Lot Quantity</label>
                <input type="number" class="form-control" id="lot_quantity" name="lot_quantity" min="1">
            </div>       
            <div class="mx-5 addEvent">
                <button type="submit">Submit</button>
            </div>        
        </form>
    </div>
</div>

@endsection