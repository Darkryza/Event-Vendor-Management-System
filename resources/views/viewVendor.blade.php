@extends('include.layout')
@include('include.header')
@section('title','View Vendor')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container">
            <h2 class="text-center">{{ $application->vendor_name }}</h2>
            
        </div>
    </div>
</div>

@endsection