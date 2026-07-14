@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Dashboard</h2>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm h-100 border-0" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); border-radius: 15px;">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1 opacity-75" style="letter-spacing: 1px;">Total Bookings</div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ $bookingCount }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-journal-check fa-2x text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm h-100 border-0" style="background: linear-gradient(135deg, #20c997 0%, #198754 100%); border-radius: 15px;">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1 opacity-75" style="letter-spacing: 1px;">Packages Available</div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ $packageCount }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-seam fa-2x text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm h-100 border-0" style="background: linear-gradient(135deg, #d63384 0%, #dc3545 100%); border-radius: 15px;">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1 opacity-75" style="letter-spacing: 1px;">Destinations</div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ $destCount }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-geo-alt fa-2x text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm h-100 border-0" style="background: linear-gradient(135deg, #fd7e14 0%, #e35d00 100%); border-radius: 15px;">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1 opacity-75" style="letter-spacing: 1px;">Total Inquiries</div>
                        <div class="h2 mb-0 font-weight-bold text-white">{{ $inquiryCount }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="bg-white bg-opacity-25 rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-paper fa-2x text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7 mb-4 mb-lg-0">
        <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: linear-gradient(to right, #f8f9fa, #ffffff); border-bottom: 2px solid #0d6efd;">
                <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-graph-up me-2"></i>Bookings Overview (Last 7 Days)</h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 300px;">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: linear-gradient(to right, #f8f9fa, #ffffff); border-bottom: 2px solid #20c997;">
                <h6 class="m-0 font-weight-bold text-success"><i class="bi bi-pie-chart me-2"></i>Booking Status</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2" style="height: 250px;">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-success"></i> Confirmed
                    </span>
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-warning"></i> Pending
                    </span>
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-danger"></i> Cancelled
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Bookings -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: linear-gradient(to right, #f8f9fa, #ffffff); border-bottom: 2px solid #0d6efd;">
                <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-journal-text me-2"></i>Recent Bookings</h6>
                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Flight Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings as $booking)
                                <tr>
                                    <td>{{ $booking->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <strong>{{ $booking->customer_name }}</strong><br>
                                        <small class="text-muted">{{ $booking->customer_phone }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $booking->flight_type == 'one-way' ? 'info' : 'primary' }}">
                                            {{ ucfirst(str_replace('-', ' ', $booking->flight_type)) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center text-muted py-4">No recent bookings</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Inquiries -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: linear-gradient(to right, #f8f9fa, #ffffff); border-bottom: 2px solid #198754;">
                <h6 class="m-0 font-weight-bold text-success"><i class="bi bi-envelope-paper me-2"></i>Recent Inquiries</h6>
                <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentInquiries as $contact)
                                <tr>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <strong>{{ $contact->name }}</strong><br>
                                        <small class="text-muted">{{ $contact->subject }}</small>
                                    </td>
                                    <td>
                                        @if($contact->status == 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($contact->status == 'resolved')
                                            <span class="badge bg-success">Resolved</span>
                                        @else
                                            <span class="badge bg-secondary">Dismissed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center text-muted py-4">No recent inquiries</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Area Chart
        var ctxArea = document.getElementById("myAreaChart");
        if(ctxArea) {
            new Chart(ctxArea, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartDates) !!},
                    datasets: [{
                        label: "Bookings",
                        lineTension: 0.3,
                        backgroundColor: "rgba(13, 110, 253, 0.05)",
                        borderColor: "rgba(13, 110, 253, 1)",
                        pointRadius: 4,
                        pointBackgroundColor: "rgba(13, 110, 253, 1)",
                        pointBorderColor: "rgba(255, 255, 255, 1)",
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: "rgba(13, 110, 253, 1)",
                        pointHoverBorderColor: "rgba(255, 255, 255, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: {!! json_encode($chartData) !!},
                        fill: true,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        x: { grid: { display: false, drawBorder: false } },
                        y: { 
                            ticks: { maxTicksLimit: 5, padding: 10, precision: 0 },
                            grid: { color: "rgb(234, 236, 244)", zeroLineColor: "rgb(234, 236, 244)", drawBorder: false, borderDash: [2], zeroLineBorderDash: [2] }
                        }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }

        // Pie Chart
        var ctxPie = document.getElementById("myPieChart");
        if(ctxPie) {
            new Chart(ctxPie, {
                type: 'doughnut',
                data: {
                    labels: ["Confirmed", "Pending", "Cancelled"],
                    datasets: [{
                        data: [
                            {{ $bookingsByStatus['Confirmed'] }},
                            {{ $bookingsByStatus['Pending'] }},
                            {{ $bookingsByStatus['Cancelled'] }}
                        ],
                        backgroundColor: ['#198754', '#ffc107', '#dc3545'],
                        hoverBackgroundColor: ['#146c43', '#e0a800', '#c82333'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: { legend: { display: false } }
                }
            });
        }
    });
</script>
@endsection
