@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Add New Destination</h2>
    <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Destination Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Maximum file size: 5MB. Image will be converted to WEBP automatically.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" value="1">
                    <label class="form-check-label" for="is_popular">Show on Homepage (Popular Destination)</label>
                </div>
                <small class="text-muted">Only exactly 3 popular destinations will be shown on the homepage.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save Destination</button>
        </form>
    </div>
</div>
@endsection
