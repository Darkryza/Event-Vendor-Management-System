@extends('include.layout')
@include('include.header')
@section('title','Applications')
@section('content')

<div class="body-container">
    <div class="my-applications">
        <div class="myApp-uppercontainer">
            <h2>My application</h2>
            <div class="back-myapp-button">
                <a href="/vendor_homepage">Back</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Vendor Name</th>
                    <th>Booth Name</th>
                    <th>Phone Number</th>
                    <th>Category</th>
                    <th>Lot No</th>
                    <th>Receipt</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $no++ }}.</td>
                        <td>{{ $application->vendor_name }}</td>
                        <td>{{ $application->booth_name }}</td>
                        <td>{{ $application->phone_number }}</td>
                        <td>{{ $application->category }}</td>
                        <td>{{ $application->no_of_lot }}</td>
                        <td>{{ $application->receipt_name }}</td>
                        <td>
                            @if ($application->status == 'Pending')
                                <button class="btn btn-warning">Pending</button>
                            @elseif ($application->status == 'Approve')
                                <button class="btn btn-success">Approve</button>
                            @elseif ($application->status == 'Reject')
                                <button class="btn btn-danger">Reject</button>
                            @endif
                        </td>
                        <td>
                            <div class="buttons">
                                <form action="/editApplication/{{ $application->id }}" method="GET">
                                    @csrf
                                    <button type="submit">Edit</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection