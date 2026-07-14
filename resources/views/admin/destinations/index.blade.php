@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Manage Destinations</h2>
    <a href="{{ route('destinations.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New Destination</a>
</div>

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($destinations as $destination)
                    <tr>
                        <td>{{ $destination->id }}</td>
                        <td>{{ $destination->name }}</td>
                        <td>{{ Str::limit($destination->description, 50) }}</td>
                        <td>
                            <a href="{{ route('destinations.edit', $destination) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="{{ route('destinations.destroy', $destination) }}" method="POST" class="d-inline delete-form" data-confirm-message="Delete this destination?">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($destinations->isEmpty())
                <p class="text-center text-muted">No destinations found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
