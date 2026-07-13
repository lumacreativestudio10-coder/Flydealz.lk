@extends('layouts.app')

@section('title', 'Our Staff - FlyDealz.lk')

@section('content')

<!-- Banner -->
<div class="bg-navy-blue pt-32 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1920&q=80" alt="Team Pattern" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Meet Our Travel Experts</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Dedicated professionals working around the clock to make your travel experience seamless.</p>
    </div>
</div>

<!-- Team Grid -->
<section class="py-20 bg-light-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Staff 1 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group text-center p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-light-bg group-hover:border-primary-pink transition-colors">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=041E46&color=fff&size=150" alt="John Doe" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-navy-blue mb-1">John Doe</h3>
                <p class="text-primary-pink font-medium text-sm mb-4">Senior Travel Consultant</p>
                <p class="text-slate-500 text-sm">Expert in luxury travel, corporate bookings, and international visa assistance.</p>
            </div>

            <!-- Staff 2 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group text-center p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-light-bg group-hover:border-primary-pink transition-colors">
                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=041E46&color=fff&size=150" alt="Jane Smith" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-navy-blue mb-1">Jane Smith</h3>
                <p class="text-primary-pink font-medium text-sm mb-4">Customer Relations Executive</p>
                <p class="text-slate-500 text-sm">Ensuring every client gets the best possible service and personalized attention.</p>
            </div>

            <!-- Staff 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group text-center p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-light-bg group-hover:border-primary-pink transition-colors">
                    <img src="https://ui-avatars.com/api/?name=Alan+Walker&background=041E46&color=fff&size=150" alt="Alan Walker" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-navy-blue mb-1">Alan Walker</h3>
                <p class="text-primary-pink font-medium text-sm mb-4">Booking Specialist</p>
                <p class="text-slate-500 text-sm">Specialist in finding the best flight routes and exclusive discounted fares.</p>
            </div>
            
            <!-- Staff 4 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group text-center p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-light-bg group-hover:border-primary-pink transition-colors">
                    <img src="https://ui-avatars.com/api/?name=Sarah+Lee&background=041E46&color=fff&size=150" alt="Sarah Lee" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-navy-blue mb-1">Sarah Lee</h3>
                <p class="text-primary-pink font-medium text-sm mb-4">Operations Manager</p>
                <p class="text-slate-500 text-sm">Overseeing daily operations and ensuring high standards of corporate travel management.</p>
            </div>

        </div>
    </div>
</section>

@endsection
