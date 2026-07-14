@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Manage Staff</h2>
    <a href="{{ route('staff.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New Staff</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $member)
                    <tr>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="rounded-circle object-cover" width="50" height="50">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->role }}</td>
                        <td>
                            <a href="{{ route('staff.edit', $member) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="{{ route('staff.destroy', $member) }}" method="POST" class="d-inline delete-form" data-confirm-message="Delete this staff member?">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($staff->isEmpty())
                <p class="text-center text-muted">No staff found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
