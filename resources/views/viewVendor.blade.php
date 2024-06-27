@extends('include.layout')
@include('include.header')
@section('title','View Vendor')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container p-4">
            <div class="d-flex flex-column align-items-center gap-2 mb-3">
                <h2>{{ $event->title }}</h2>
                <a href="{{ route('manager-listApplications') }}" class="button">Back</a>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/'.$event->name_imgPoster) }}" alt="Poster">
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Name:</h4>
                <p>{{ $application->vendor_name }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Booth Name:</h4>
                <p>{{ $application->booth_name }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Booth Name:</h4>
                <p>{{ $application->booth_name }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Phone Number:</h4>
                <p>{{ $application->phone_number }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Category:</h4>
                <p>{{ $application->category }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Total Lot:</h4>
                <p>{{ $application->event->Lot_Quantity }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5 class="text-center">Availabality Lot (Green - Booked)</h4><br>
                    <div class="lot-boxes-container d-flex justify-content-center">
                        @for ($i = 1; $i <= $event->Lot_Quantity; $i++)
                            @php
                                $isApproved = false;
                            @endphp
                            @foreach($Allapplications as $app)
                                @if ($app->no_of_lot == $i && $app->status == 'Approved')
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
            <div class="mt-4 mb-3 mx-5">
                <h5>Vendor Choose Lot Number:</h4>
                <p>{{ $application->no_of_lot }}</p>
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Agreement:</h4>
                <p>{!! nl2br(e($event->agreement)) !!}</p>
                @if ($application->agreement == '1')
                    <p><b><i>Vendor choose: </i></b><b>[I agree]</b></p>
                @endif
            </div>
            <div class="mt-4 mb-3 mx-5">
                <h5>Receipt:</h4>
                <img src="{{ asset('images/'.$application->receipt_name) }}" alt="Receipt">
            </div>
            <div class="mt-4 mb-3 mx-5">
                <div class="d-flex flex-row justify-content-center gap-3">
                    @if ($application->status == 'Pending')
                        <form action="{{ route('approved', ['application' => $application->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Approve</button>
                        </form>
                        <form action="{{ route('rejected', ['application' => $application->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Reject</button>
                        </form>
                    @elseif ($application->status == 'Approved')
                        <form action="{{ route('rejected', ['application' => $application->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Reject</button>
                        </form>
                    @elseif ($application->status == 'Rejected')
                        <form action="{{ route('approved', ['application' => $application->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Approve</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection