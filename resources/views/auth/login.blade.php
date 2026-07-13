@extends('layouts.auth')

@section('content')
<style>
    body {
        background-color: #0b1120; /* Navy blue */
        background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
    }
    .login-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(11, 17, 32, 0.85);
        z-index: 1;
    }
    .login-container {
        position: relative;
        z-index: 2;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        background: white;
        border-radius: 1.5rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border: none;
        width: 100%;
        max-width: 450px;
    }
    .login-header {
        background: #0b1120;
        padding: 2rem;
        text-align: center;
        border-bottom: 4px solid #ff4d85; /* Primary pink */
    }
    .login-header h2 {
        color: white;
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
    }
    .login-body {
        padding: 2.5rem;
    }
    .btn-pink {
        background-color: #ff4d85;
        color: white;
        font-weight: 600;
        padding: 0.75rem;
        border-radius: 0.5rem;
        border: none;
    }
    .btn-pink:hover {
        background-color: #e63e72;
        color: white;
    }
    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border-color: #e2e8f0;
    }
    .form-control:focus {
        border-color: #ff4d85;
        box-shadow: 0 0 0 0.25rem rgba(255, 77, 133, 0.25);
    }
</style>

<div class="login-overlay"></div>
<div class="login-container px-3">
    <div class="login-card">
        <div class="login-header">
            <h2 class="d-flex align-items-center justify-content-center">
                <i class="bi bi-airplane-engines me-2 text-primary-pink" style="color: #ff4d85;"></i> FlyDealz Admin
            </h2>
            <p class="text-white-50 mb-0 mt-2 small">Sign in to your premium dashboard</p>
        </div>

        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label fw-bold text-secondary small text-uppercase">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@flydealz.lk">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-bold text-secondary small text-uppercase">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-secondary small" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-pink btn-lg">
                        Secure Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
