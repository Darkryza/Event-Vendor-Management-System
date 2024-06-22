@extends('include.layout')
@section('title', 'Receipt')
@section('content')

<div class="viewReceipt-container">
    <div class="receipt-img">
        <img src="{{ asset('images/'.$application->receipt_name) }}" alt="Receipt Image">
    </div>
    <div class="button">
        <a href="/list-applications/{{ $event->id }}" class="text-decoration-none text-white">
            Back
        </a>
    </div>
</div>

@endsection