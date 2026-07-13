@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Edit Package</h2>
    <a href="{{ route('packages.index') }}" class="btn btn-secondary">Back to Packages</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $package->title }}" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Departure Location</label>
                    <input type="text" name="departure_location" class="form-control" value="{{ $package->departure_location }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Destination</label>
                    <select name="destination_id" class="form-select" required>
                        @foreach($destinations as $dest)
                            <option value="{{ $dest->id }}" {{ $package->destination_id == $dest->id ? 'selected' : '' }}>
                                {{ $dest->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $package->price }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Duration (Days)</label>
                    <input type="number" name="duration_days" class="form-control" value="{{ $package->duration_days }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="active" {{ $package->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $package->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $package->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Package</button>
        </form>
    </div>
</div>
@endsection
