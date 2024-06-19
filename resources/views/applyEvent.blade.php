@extends('include.layout')
@include('include.header')
@section('title','Apply Event')
@section('content')

<div class="body-container">
    <div class="upperEvent-container">
        <h1>{{ $event->title }}</h1>
        <a href="/viewEvent/{{ $event->id }}">Back</a>
    </div>
    <div class="title-upperEvent-container">
        <p>Application</p>
    </div>
    <div class="content-applyEvent">
        <div class="form-applyEvent">
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
            
            <form action="/applyEvent/{{ $event->id }}/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="vendor_name" class="form-label">Vendor Name</label>
                    <input name="vendor_name" id="vendor_name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                    <input name="vendor_name" id="vendor_name" type="hidden" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="mb-4">
                    <label for="booth_name" class="form-label">Booth Name</label>
                    <input name="booth_name" id="booth_name" type="text" class="form-control" placeholder="Booth Name">
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input name="phone_number" id="phone_number" type="text" class="form-control" value="{{ $user->phone_number }}" readonly>
                    <input name="phone_number" id="phone_number" type="hidden" class="form-control" value="{{ $user->phone_number }}">
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option selected disabled hidden>Category</option>
                        <option value="Clothes">Clothes</option>
                        <option value="F&B">Foods and Beverages</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Others">Others</option>
                      </select> 
                </div>
                <div class="mb-4 d-flex justify-content-center">
                    <img id="eventLayoutImage" class="border border-black w-25" src="{{ asset('images/'.$event->name_imgLayout) }}" alt="Event Layout" style="cursor: pointer;">
                </div>
                <div class="mb-4">
                    <label for="no_of_lot" class="form-label">No of Lot</label>
                    <input type="number" id="no_of_lot" class="form-control" name="no_of_lot" placeholder="No of lot" min="0">
                </div>
                <div class="mb-4">
                    <h4>Agreement:</h4>
                    <p>{{ $event->agreement }}</p>
                </div>
                <input type="checkbox" id="agree" name="agreement" value="1">
                <label class="mb-4" for="agree"> I Agree</label><br>
                <div class="mb-3">
                    <img src="{{ asset('images/'.$event->name_imgQR)}}" alt="QR Image" style="width: 200px; height:250px;">
                </div>
                <div class="mb-3">
                    <label for="receipt_image" class="form-label"><h4>Receipt  Payment</h4></label><br>
                    <input type="file" id="receipt_image" name="receipt_image" accept="image/*" class="form-control">
                </div>
                <div class="button-applyEvent">
                    <button type="submit" class="btn-applyEvent">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Fullscreen Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex flex-row gap-3">
            <h5 class="modal-title" id="imageModalLabel">Event Layout</h5>
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <img id="modalImage" src="{{ asset('images/'.$event->name_imgLayout) }}" alt="Event Layout" class="img-fluid">
            </div>
        </div>
    </div>
</div>
  
<!-- Scripts -->
<script>
    document.getElementById('eventLayoutImage').addEventListener('click', function() {
        var src = this.src;
        document.getElementById('modalImage').src = src;
        $('#imageModal').modal('show');
    });

    // Ensure the modal is properly reset when hidden
    $('#imageModal').on('hidden.bs.modal', function () {
        document.getElementById('modalImage').src = '{{ asset('images/'.$event->name_imgLayout) }}';
    });
</script>


@endsection