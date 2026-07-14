@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Edit Staff Member</h2>
    <a href="{{ route('staff.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
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

        <form action="{{ route('staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $staff->name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" value="{{ old('role', $staff->role) }}" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description (Optional)</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $staff->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo (Optional)</label>
                @if($staff->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $staff->image) }}" alt="Current Photo" class="img-thumbnail" width="100">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Maximum file size: 5MB. Image will be converted to WEBP automatically. Leave blank to keep current photo.</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Staff</button>
        </form>
    </div>
</div>
@endsection
