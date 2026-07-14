@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Manage Packages</h2>
    <a href="{{ route('packages.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New Package</a>
</div>

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td>{{ $package->title }}</td>
                        <td>{{ $package->destination->name ?? 'N/A' }}</td>
                        <td>LKR {{ number_format($package->price, 2) }}</td>
                        <td>{{ $package->duration_days }} Days</td>
                        <td>
                            @if($package->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('packages.edit', $package) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="{{ route('packages.destroy', $package) }}" method="POST" class="d-inline delete-form" data-confirm-message="Delete this package?">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($packages->isEmpty())
                <p class="text-center text-muted">No packages found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
