<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FlyDealz.lk - Your Premium Corporate Travel Partner in Sri Lanka">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div x-data="{ bookingModalOpen: false, bookingData: { flight_type: 'one-way', customer_name: '', customer_email: '', customer_phone: '', whatsapp_number: '', home_address: '', departure_location: '', destination_location: '', travel_date: '', return_date: '', passengers: 1, message: '' } }" 
         @open-booking.window="
            bookingModalOpen = true;
            if ($event.detail) {
                bookingData.flight_type = $event.detail.flight_type || 'one-way';
                bookingData.departure_location = $event.detail.from || '';
                bookingData.destination_location = $event.detail.to || '';
                bookingData.travel_date = $event.detail.date || '';
                bookingData.return_date = $event.detail.returnDate || '';
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
