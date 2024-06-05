@extends('include.layout')
@section('title', 'Receipt')
@section('content')

<div class="viewReceipt-container">
    <div class="button">
        <a href="/list-applications/{{ $event->id }}">
            Back
        </a>
        <div class="receipt-img">
            <img src="{{ asset('storage/images/'.$application->receipt_name) }}" alt="Receipt Image">
        </div>
    </div>
</div>

@endsection