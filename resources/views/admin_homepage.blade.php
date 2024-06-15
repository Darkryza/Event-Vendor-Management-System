@extends('include.layout')
@include('include.header')
@section('title','Admin Page')
@section('content')

<div class="body-container">

    <div class="admin-container">

        <div class="admin-nav">
            <ul class="nav flex-column">
                <li class="nav-item admin-link">
                  <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="#">Event</a>
                </li>
            </ul>
        </div>

        <div class="admin-content">
            <div class="admin-content-row">
                <div class="admin-container-card">
                    <h2>Total Users</h2><br>
                    <h2>{{ $totalUsers }}</h2>
                </div>
                <div class="admin-container-card">
                    <h2>Total Events</h2><br>
                    <h2>{{ $totalEvents }}</h2>
                </div>
                <div class="graph-event-month">
                    <h2>Events Per Month</h2>
                    <canvas id="eventsChart"></canvas>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('eventsChart').getContext('2d');
    var eventsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Number of Events',
                data: @json(array_values($eventsPerMonth)),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Ensure y-axis increments by 1
                    },
                    max: 30 // Set the maximum value of the y-axis to 30
                }
            }
        }
    });
</script>

@endsection

{{-- <div class="list">
        <div class="admin-upper-container">
            <h2>List of Users</h2>
            <div class="btn-Add">
                <a href="/adduser">Add user</a>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="listuser-btn">
                                <a href="/edituser/{{ $user->id }}">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="list">
        <div class="admin-upper-container">
            <h2>List of events</h2>
            <div class="btn-Add">
                <a href="/AddEvent">Add event</a>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Duration</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Manager</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($events as $event)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->duration }} days</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->end_date }}</td>
                        <td>{{ $event->status }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td>
                            <div class="listuser-btn">
                                <a href="/edituser/{{ $user->id }}">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>     --}}