<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyDeals Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        
        /* Desktop Sidebar */
        .sidebar-desktop { min-height: 100vh; background-color: #212529; color: white; padding-top: 20px; position: sticky; top: 0; }
        .sidebar-desktop a, .offcanvas-body a { color: #adb5bd; text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar-desktop a:hover, .sidebar-desktop a.active, .offcanvas-body a:hover, .offcanvas-body a.active { color: white; background-color: #343a40; border-left: 4px solid #0d6efd; }
        .content { padding: 20px; }
        
        /* Mobile Navbar */
        .mobile-navbar { display: none; background-color: #212529; padding: 10px 20px; color: white; }
        
        @media (max-width: 767px) {
            .sidebar-desktop { display: none; }
            .mobile-navbar { display: flex; justify-content: space-between; align-items: center; }
            .content { padding: 15px; }
        }
    </style>
</head>
<body>

    <!-- Mobile Top Navbar -->
    <div class="mobile-navbar sticky-top shadow-sm">
        <h5 class="mb-0"><i class="bi bi-airplane-fill text-primary"></i> FlyDeals</h5>
        <button class="btn btn-outline-light btn-sm border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i class="bi bi-list fs-2"></i>
        </button>
    </div>

    <!-- Mobile Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar">
        <div class="offcanvas-header border-bottom border-secondary">
            <h5 class="offcanvas-title"><i class="bi bi-airplane-fill text-primary"></i> FlyDeals Admin</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 pt-3">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="{{ route('bookings.index') }}" class="{{ request()->routeIs('bookings.*') ? 'active' : '' }}"><i class="bi bi-journal-check me-2"></i> Bookings</a>
            <a href="{{ route('packages.index') }}" class="{{ request()->routeIs('packages.*') ? 'active' : '' }}"><i class="bi bi-box-seam me-2"></i> Packages</a>
            <a href="{{ route('destinations.index') }}" class="{{ request()->routeIs('destinations.*') ? 'active' : '' }}"><i class="bi bi-geo-alt me-2"></i> Destinations</a>
            <a href="{{ route('contacts.index') }}" class="{{ request()->routeIs('contacts.*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i> Inquiries</a>
            <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}"><i class="bi bi-person-gear me-2"></i> Profile Settings</a>
            <hr class="text-secondary">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link text-danger text-decoration-none w-100 text-start ps-4"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Desktop Sidebar -->
            <div class="col-md-2 col-lg-2 sidebar-desktop px-0">
                <h4 class="text-center mb-4"><i class="bi bi-airplane-fill text-primary"></i> FlyDeals</h4>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a href="{{ route('bookings.index') }}" class="{{ request()->routeIs('bookings.*') ? 'active' : '' }}"><i class="bi bi-journal-check me-2"></i> Bookings</a>
                <a href="{{ route('packages.index') }}" class="{{ request()->routeIs('packages.*') ? 'active' : '' }}"><i class="bi bi-box-seam me-2"></i> Packages</a>
                <a href="{{ route('destinations.index') }}" class="{{ request()->routeIs('destinations.*') ? 'active' : '' }}"><i class="bi bi-geo-alt me-2"></i> Destinations</a>
                <a href="{{ route('contacts.index') }}" class="{{ request()->routeIs('contacts.*') ? 'active' : '' }}"><i class="bi bi-envelope me-2"></i> Inquiries</a>
                <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}"><i class="bi bi-person-gear me-2"></i> Profile Settings</a>
                <hr class="text-secondary">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger text-decoration-none w-100 text-start ps-4"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 col-lg-10 content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: form.dataset.confirmMessage || "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
