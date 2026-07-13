@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Dashboard</h2>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 border-0" style="border-left: 4px solid #0d6efd !important;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Bookings</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bookingCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-journal-check fa-2x text-gray-300 fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 border-0" style="border-left: 4px solid #198754 !important;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Packages Available</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $packageCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-box-seam fa-2x text-gray-300 fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 border-0" style="border-left: 4px solid #0dcaf0 !important;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Destinations</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $destCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-geo-alt fa-2x text-gray-300 fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Bookings -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow border-0">
            <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-journal-text me-2"></i>Recent Bookings</h6>
                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-primary">View All</a>
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
        <div class="card shadow border-0">
            <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success"><i class="bi bi-envelope-paper me-2"></i>Recent Inquiries</h6>
                <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-success">View All</a>
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
@endsection
