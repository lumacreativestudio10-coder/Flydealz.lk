@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Customer Inquiries</h2>
</div>

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td style="white-space: nowrap;">{{ $contact->created_at->format('M d, Y') }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>
                            <div>{{ $contact->email }}</div>
                            <div class="small text-muted">{{ $contact->phone }}</div>
                        </td>
                        <td><span class="badge bg-secondary">{{ ucfirst($contact->subject) }}</span></td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            @if($contact->status == 'resolved')
                                <span class="badge bg-success">Resolved</span>
                            @elseif($contact->status == 'dismissed')
                                <span class="badge bg-danger">Dismissed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('contacts.update', $contact) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                    <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="resolved" {{ $contact->status == 'resolved' ? 'selected' : '' }}>Resolve</option>
                                    <option value="dismissed" {{ $contact->status == 'dismissed' ? 'selected' : '' }}>Dismiss</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($contacts->isEmpty())
                <p class="text-center text-muted">No inquiries found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
