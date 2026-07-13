@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Edit Destination</h2>
    <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Back to Destinations</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Destination Name</label>
                <input type="text" name="name" class="form-control" value="{{ $destination->name }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Image</label>
                @if($destination->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="img-thumbnail" width="150">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $destination->description }}</textarea>
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" value="1" {{ $destination->is_popular ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_popular">Show on Homepage (Popular Destination)</label>
                </div>
                <small class="text-muted">Only exactly 3 popular destinations will be shown on the homepage.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Destination</button>
        </form>
    </div>
</div>
@endsection
