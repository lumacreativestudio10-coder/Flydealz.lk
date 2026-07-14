@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Upload Gallery Image</h2>
    <a href="{{ route('gallery.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="form-label">Select Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
                <small class="text-muted">Maximum file size: 5MB. Image will be converted to WEBP automatically.</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-upload"></i> Upload Image</button>
        </form>
    </div>
</div>
@endsection
