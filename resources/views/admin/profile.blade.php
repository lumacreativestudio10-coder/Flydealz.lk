@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 text-gray-800">Admin Profile</h2>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden; border-top: 4px solid #6c757d !important;">
            <div class="card-header d-flex align-items-center justify-content-between" style="background: linear-gradient(to right, #f8f9fa, #ffffff); border-bottom: 1px solid #dee2e6; padding: 1rem 1.25rem;">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="bi bi-shield-lock me-2"></i>Change Password</h6>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-secondary rounded-pill px-4 shadow-sm"><i class="bi bi-check-circle me-2"></i> Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
