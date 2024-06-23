@extends('include.layout')
@include('include.header')
@section('title','Edit Application')
@section('content')

<div class="body-container">
    <div class="editApp-container">
        <div class="title">
            <h2>Edit Application - {{ $application->event->title }}</h2>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-editApp">
            <form action="{{ route('editApplication',['application' => $application->id]) }}" method="POST" enctype="multipart/form-data">
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
                    <h4 class="text-center mb-4">Availability Lot (Green - Booked)</h4>
                    <div class="lot-boxes-container">
                        @for ($i = 1; $i <= $event->Lot_Quantity; $i++)
                            @php
                                $isApproved = false;
                            @endphp
                            @foreach($applications as $application)
                                @if ($application->no_of_lot == $i && $application->status == 'Approve')
                                    @php
                                        $isApproved = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                            <div class="lot-box {{ $isApproved ? 'approved' : '' }}">{{ $i }}</div>
                        @endfor
                    </div>
                </div>
                <div class="mb-3 mx-5">
                    <label for="no_of_lot" class="form-label">No of lot</label>
                    <input type="text" name="no_of_lot" id="no_of_lot" value="{{ $application->no_of_lot }}" class="form-control">
                </div>
                <div class="mb-4 d-flex justify-content-center">
                    <a href="{{ asset('images/'.$application->receipt_name) }}" target="_blank">
                        <img class="border border-black" src="{{ asset('images/'.$application->receipt_name) }}" alt="Receipt Image">
                    </a>
                </div>
                <div class="mb-3 mx-5">
                    <label class="form-label" for="receipt_name">Receipt</label>
                    <input type="file" id="receipt_name" name="receipt_name" accept="image/*" class="form-control">
                </div>
                <div class="mb-3 mx-5 text-center editApp-btn">
                    @if (auth()->user()->role == 'Admin')
                        <a href="{{ route('Admin.viewApplications') }}">Cancel</a>
                    @else
                        <a href="/vendorApplications/{{ auth()->user()->id }}">Cancel</a>
                    @endif
                    
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
