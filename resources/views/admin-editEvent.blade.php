@extends('include.layout')
@include('include.header')
@section('title','Edit Event')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="card-container d-flex flex-column py-3 px-4">
            <h2 class="text-center">Edit Event</h2>
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
            <form action="{{ route('editEvent', ['event' => $event->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Event Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Event Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Event Start Date</label>
                    <input type="date" class="form-control" id="date" name="start_date" value="{{ $event->start_date }}">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Event End Date</label>
                    <input type="date" class="form-control" id="date" name="end_date" value="{{ $event->end_date }}">
                </div>
                <div class="mb-3">
                    <label for="agreement" class="form-label">Agreement (Rules)</label>
                    <textarea class="form-control" id="agreement" name="agreement" rows="3">{{ $event->agreement }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="poster" class="form-label">Poster Event</label><br>
                    <input type="file" id="poster" name="poster_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="layout" class="form-label">Layout Event</label><br>
                    <input type="file" id="layout" name="layout_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="qr" class="form-label">QR Bank</label><br>
                    <input type="file" id="qr" name="qr_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3" style="width: 100px">
                    <label for="lot_quantity" class="form-label">Lot Quantity</label>
                    <input type="number" class="form-control" id="lot_quantity" name="lot_quantity" min="1" value="{{ $event->Lot_Quantity }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Event</label><br>
                    <select name="status" id="status" class="form-select">
                        <option value="Pending" {{ $event->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Ongoing" {{ $event->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ $event->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>      
            </form>
        </div>
    </div>
</div>

@endsection