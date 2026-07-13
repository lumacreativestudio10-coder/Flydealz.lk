<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FlyDealz.lk - Your Premium Corporate Travel Partner in Sri Lanka">
    <title>@yield('title', 'FlyDealz.lk - Experience Premium Travel')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-light-bg text-slate-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Global Booking Modal (Alpine.js State) -->
    <div x-data="{ bookingModalOpen: false, bookingData: { from: '', to: '', date: '', passengers: 1 } }" 
         @open-booking.window="
            bookingModalOpen = true;
            if ($event.detail) {
                bookingData.from = $event.detail.from || '';
                bookingData.to = $event.detail.to || '';
                bookingData.date = $event.detail.date || '';
                bookingData.passengers = $event.detail.passengers || 1;
            }
         ">
        
        <!-- Navbar -->
        <x-navbar />

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <x-footer />

        <!-- Booking Modal Component -->
        <x-booking-modal />
    </div>

    @stack('scripts')
</body>
</html>
