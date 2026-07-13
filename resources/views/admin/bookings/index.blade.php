@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Manage Bookings</h2>
</div>

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Details</th>
                        <th>Travel Info</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>
                            <strong>{{ $booking->customer_name }}</strong><br>
                            <small class="text-muted"><i class="bi bi-telephone"></i> {{ $booking->customer_phone }}</small><br>
                            <small class="text-muted"><i class="bi bi-envelope"></i> {{ $booking->customer_email }}</small>
                        </td>
                        <td>
                            <small>
                                <strong>WhatsApp:</strong> {{ $booking->whatsapp_number ?? '-' }}<br>
                                <strong>Address:</strong> {{ $booking->home_address ?? '-' }}<br>
                                <strong>Message:</strong> {{ $booking->message ?? '-' }}
                            </small>
                        </td>
                        <td>
                            <small>
                                <strong>Route:</strong> 
                                @if($booking->flight_type === 'return')
                                    <span class="badge bg-info text-dark">Round Trip</span>
                                @else
                                    <span class="badge bg-secondary">One Way</span>
                                @endif
                                <br>
                                {{ $booking->departure_location }} &rarr; {{ $booking->destination_location }}<br>
                                <strong>Dep:</strong> {{ $booking->travel_date }}<br>
                                @if($booking->flight_type === 'return')
                                <strong>Ret:</strong> {{ $booking->return_date }}<br>
                                @endif
                                <strong>Pax:</strong> {{ $booking->passengers }}
                            </small>
                        </td>
                        <td>
                            @if($booking->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('bookings.update', $booking) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($bookings->isEmpty())
                <p class="text-center text-muted">No bookings found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
