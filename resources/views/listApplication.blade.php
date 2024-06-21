@extends('include.layout')
@include('include.header')
@section('title','List Application')
@section('content')
    
<div class="body-container">
    <div class="list-application">
        <div class="application-upper-container">
            <h2>List of Applications</h2>
            <h3>{{ $event->title }}</h3>
        </div>
    
        <div class="title">
            <h4>No. of lot:</h4>
        </div>
    
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
                    <tr class="row-list-app">
                        <td>{{ $no++ }}.</td>
                        <td>{{ $application->vendor_name }}</td>
                        <td>{{ $application->booth_name }}</td>
                        <td>{{ $application->phone_number }}</td>
                        <td>{{ $application->category }}</td>
                        <td>{{ $application->no_of_lot }}</td>
                        <td>
                            <a href="/viewReceipt/{{ $event->id }}/{{ $application->id }}">
                                {{ $application->receipt_name }}
                            </a>
                        </td>
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
                                <form action="/approve/{{ $application->id }}" method="POST">
                                    @csrf
                                    <button type="submit">Approve</button>
                                </form>
                                <form action="/reject/{{ $application->id }}" method="POST">
                                    @csrf
                                    <button type="submit">Reject</button>
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