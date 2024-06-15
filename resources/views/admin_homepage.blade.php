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
                  <a class="nav-link" href="viewUsers">Users</a>
                </li>
                <li class="nav-item admin-link">
                  <a class="nav-link" href="viewEvents">Event</a>
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

