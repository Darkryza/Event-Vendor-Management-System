@extends('include.layout')
@include('include.header')
@section('title', 'Review Event')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container py-3">
            <h2 class="text-center">{{ $event->title }}</h2>
            <div class="d-flex justify-content-center">
                <div id="carouselExample" class="carousel slide border border-black img-resize">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="{{ asset('images/'.$event->name_imgPoster) }}" class="d-block img-resize" alt="Event Poster">
                        </div>
                        <div class="carousel-item">
                        <img src="{{ asset('images/'.$event->name_imgLayout) }}" class="d-block img-resize" alt="Event Layout">
                        </div>
                        <div class="carousel-item">
                        <img src="{{ asset('images/'.$event->name_imgQR) }}" class="d-block img-resize" alt="Event QR">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="mb-3 mx-5">
                <h5>Organiser:</h4>
                <p>{{ $event->organiser }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Manager:</h4>
                <p>{{ $event->user->name }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Location:</h4>
                <p>{{ $event->location }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Description:</h4>
                <p>{{ $event->description }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Start Date:</h4>
                <p>{{ $event->start_date }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>End Date:</h4>
                <p>{{ $event->end_date }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Duration:</h4>
                <p>{{ $event->duration }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Lot Price:</h4>
                <p>{{ $event->lot_price }}</p>
            </div>
            <div class="mb-3 mx-5">
                <h5>Lot Quantity:</h4>
                <p>{{ $event->Lot_Quantity }}</p>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <form action="{{ route('reject', ['event' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Reject</button>
                </form>
                <form action="{{ route('approve', ['event' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Approve</button>
                </form>
            </div> 
        </div>
    </div>
</div>

@endsection