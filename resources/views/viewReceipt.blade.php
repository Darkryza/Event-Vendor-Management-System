@extends('include.layout')
@section('title', 'Receipt')
@section('content')

<div class="viewReceipt-container">
    <div class="button">
        <a href="/list-applications/{{ $event->id }}">
            Back
        </a>
    </div>
    <div class="receipt-img">
        <img src="{{ asset($application->receipt_name) }}" alt="Receipt Image">
    </div>
</div>

@endsection