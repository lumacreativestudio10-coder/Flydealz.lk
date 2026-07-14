@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Manage Gallery</h2>
    <a href="{{ route('gallery.create') }}" class="btn btn-primary"><i class="bi bi-upload"></i> Upload Image</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($images as $img)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top object-cover" alt="Gallery Image" style="height: 200px;">
                        <div class="card-footer bg-white border-0 text-center">
                            <form action="{{ route('gallery.destroy', $img) }}" method="POST" class="d-inline delete-form" data-confirm-message="Delete this gallery image?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    No images in the gallery yet. Click "Upload Image" to add some.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
