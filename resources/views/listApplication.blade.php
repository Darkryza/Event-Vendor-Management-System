@extends('include.layout')
@include('include.header')
@section('title','List Application')
@section('content')
    
<div class="list-application">
    <div class="application-upper-container">
        <h2>List of Applications</h2>
    </div>  
    <table>
        <thead>
            <tr>
                <th>Vendor Name</th>
                <th>Booth Name</th>
                <th>Phone Number</th>
                <th>Category</th>
                <th>Lot No</th>
                <th>Receipt</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr class="row-list-app">
                    <td>{{ $application->vendor_name }}</td>
                    <td>{{ $application->booth_name }}</td>
                    <td>{{ $application->phone_number }}</td>
                    <td>{{ $application->category }}</td>
                    <td>{{ $application->no_of_lot }}</td>
                    <td>{{ $application->receipt_name }}</td>
                    <td>
                        <div class="buttons">
                            <form action="/aprove" method="POST">
                                <button type="submit">Approve</button>
                            </form>
                            <form action="/reject" method="POST">
                                <button type="submit">Reject</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection