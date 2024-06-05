@extends('include.layout')
@include('include.header')
@section('title','Edit Application')
@section('content')

<div class="body-container">
    <div class="editApp-container">
        <div class="title">
            <h2>Edit Application - {{ $application->event->title }}</h2>
        </div>
        <div class="form-editApp">
            <form action="/editApp/{{ $application->id }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mx-5">
                    <label for="vendor_name" class="form-label">Vendor Name</label>
                    <input type="text" name="vendor_name" id="vendor_name" value="{{ $application->vendor_name }}" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label for="booth_name" class="form-label">Booth Name</label>
                    <input type="text" name="booth_name" id="booth_name" value="{{ $application->booth_name }}" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $application->phone_number }}" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-select" id="category" class="form-select">
                        <option value="Clothes" {{ $application->category == 'Clothes' ? 'selected' : '' }}>Clothes</option>
                        <option value="F&B" {{ $application->category == 'F&B' ? 'selected' : '' }}>Foods and Beverages</option>
                        <option value="Accessories" {{ $application->category == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                        <option value="Others" {{ $application->category == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>
                <div class="mb-3 mx-5">
                    <label for="no_of_lot" class="form-label">No of lot</label>
                    <input type="text" name="no_of_lot" id="no_of_lot" value="{{ $application->no_of_lot }}" class="form-control">
                </div>
                <div class="mb-3 mx-5">
                    <label class="form-label" for="receipt_name">Receipt</label>
                    <input type="file" id="receipt_name" name="receipt_name" accept="image/*" class="form-control">
                </div>
                <div class="mb-3 mx-5 text-center editApp-btn">
                    <a href="/vendorApplications/{{ auth()->user()->id }}">Cancel</a>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection