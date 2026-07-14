@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Add New Package</h2>
    <a href="{{ route('packages.index') }}" class="btn btn-secondary">Back to Packages</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Departure Location</label>
                    <input type="text" name="departure_location" class="form-control" value="Colombo" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Destination</label>
                    <select name="destination_id" class="form-select" required>
                        <option value="">Select a Destination</option>
                        @foreach($destinations as $dest)
                            <option value="{{ $dest->id }}">{{ $dest->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price (LKR)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Duration (Days)</label>
                    <input type="number" name="duration_days" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Package</button>
        </form>
    </div>
</div>
@endsection
