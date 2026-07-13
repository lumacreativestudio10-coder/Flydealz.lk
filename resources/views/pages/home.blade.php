@extends('layouts.app')

@section('title', 'FlyDealz.lk - Premium Corporate Travel')

@section('content')

<!-- 1. Hero Section -->
<section class="relative h-screen min-h-[600px] flex items-center justify-center pt-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1920&q=80" alt="Premium Travel" class="w-full h-full object-cover">
        <!-- Dark Navy Overlay -->
        <div class="absolute inset-0 bg-dark-navy/60"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <span class="inline-block py-1 px-3 rounded-full bg-white/20 text-white backdrop-blur-sm border border-white/30 text-sm font-medium tracking-wider uppercase mb-6 shadow-sm">
            Your Trusted Travel Partner
        </span>
        <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight mb-6">
            Experience <span class="text-primary-pink">Premium</span> Travel
        </h1>
        <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
            Discover seamless journeys, exclusive flight deals, and personalized travel experiences with FlyDealz.lk.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <button @click="$dispatch('open-booking')" class="w-full sm:w-auto bg-primary-pink hover:bg-pink-500 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-transform hover:-translate-y-1">
                Book Your Flight
            </button>
            <a href="#services" class="w-full sm:w-auto bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-sm font-semibold py-3 px-8 rounded-full transition-colors text-center">
                Explore Our Services
            </a>
        </div>
    </div>
</section>

<!-- 2. Flight Search / Booking UI (Floating over Hero) -->
<section class="relative z-20 -mt-24 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border-t-4 border-navy-blue" x-data="{ journeyType: 'one-way', searchForm: { from: 'Colombo', to: '', date: '', returnDate: '', passengers: 1 } }">
        
        <!-- Tabs -->
        <div class="flex space-x-6 border-b border-gray-200 mb-6 pb-2">
            <button @click="journeyType = 'one-way'" :class="{'text-navy-blue border-b-2 border-primary-pink font-semibold': journeyType === 'one-way', 'text-gray-500 hover:text-navy-blue': journeyType !== 'one-way'}" class="pb-2 transition-colors">
                One Way
            </button>
            <button @click="journeyType = 'return'" :class="{'text-navy-blue border-b-2 border-primary-pink font-semibold': journeyType === 'return', 'text-gray-500 hover:text-navy-blue': journeyType !== 'return'}" class="pb-2 transition-colors">
                Round Trip
            </button>
        </div>

        <!-- Form -->
        <form @submit.prevent="$dispatch('open-booking', { ...searchForm, flight_type: journeyType })" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
            
            <div class="col-span-1 lg:col-span-1">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">From</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-plane-departure"></i>
                    </div>
                    <input type="text" x-model="searchForm.from" class="w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg focus:ring-1 focus:ring-primary-pink focus:border-primary-pink outline-none text-navy-blue font-medium bg-gray-50">
                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">To</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-plane-arrival"></i>
                    </div>
                    <input type="text" x-model="searchForm.to" placeholder="Destination" class="w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg focus:ring-1 focus:ring-primary-pink focus:border-primary-pink outline-none text-navy-blue font-medium bg-gray-50">
                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Departure</label>
                <input type="date" x-model="searchForm.date" min="{{ date('Y-m-d') }}" class="w-full px-3 py-3 border border-gray-200 rounded-lg focus:ring-1 focus:ring-primary-pink focus:border-primary-pink outline-none text-navy-blue font-medium bg-gray-50">
            </div>

            <div class="col-span-1 lg:col-span-1" x-show="journeyType === 'return'">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Return</label>
                <input type="date" x-model="searchForm.returnDate" min="{{ date('Y-m-d') }}" class="w-full px-3 py-3 border border-gray-200 rounded-lg focus:ring-1 focus:ring-primary-pink focus:border-primary-pink outline-none text-navy-blue font-medium bg-gray-50">
            </div>

            <div class="col-span-1 lg:col-span-1">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Passengers</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <input type="number" x-model="searchForm.passengers" min="1" max="10" class="w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg focus:ring-1 focus:ring-primary-pink focus:border-primary-pink outline-none text-navy-blue font-medium bg-gray-50">
                </div>
            </div>

            <div class="col-span-1 lg:col-span-1">
                <button type="submit" class="w-full bg-primary-pink hover:bg-pink-500 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition-colors flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass mr-2"></i> Search
                </button>
            </div>
        </form>
    </div>
</section>

<!-- 3. Why Choose FlyDealz -->
<section id="services" class="py-20 bg-light-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-navy-blue mb-4">Travel Better with FlyDealz</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Experience the highest standard of corporate travel management and leisure bookings.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 group text-center">
                <div class="w-16 h-16 mx-auto bg-soft-pink rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-tags text-2xl text-primary-pink"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-blue mb-3">Best Flight Deals</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Exclusive access to discounted fares and premium airline promotions worldwide.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 group text-center">
                <div class="w-16 h-16 mx-auto bg-soft-pink rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-desktop text-2xl text-primary-pink"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-blue mb-3">Easy Booking</h3>
                <p class="text-gray-500 text-sm leading-relaxed">A seamless, hassle-free booking experience tailored for busy professionals.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 group text-center">
                <div class="w-16 h-16 mx-auto bg-soft-pink rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-user-tie text-2xl text-primary-pink"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-blue mb-3">Trusted Experts</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Our dedicated travel consultants handle every detail of your journey with care.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-gray-100 group text-center">
                <div class="w-16 h-16 mx-auto bg-soft-pink rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-headset text-2xl text-primary-pink"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-blue mb-3">24/7 Support</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Round-the-clock customer assistance wherever you are in the world.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. CEO Message Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Left: Image -->
            <div class="w-full lg:w-5/12">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=80" alt="CEO" class="w-full h-auto object-cover aspect-[4/5]">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-navy/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-white text-2xl font-bold">Mr. M.A. G. S.</h4>
                        <p class="text-primary-pink font-medium">Chief Executive Officer</p>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="w-full lg:w-7/12">
                <span class="text-primary-pink font-semibold tracking-wider text-sm uppercase mb-2 block">Leadership Message</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy-blue mb-8">A Message from Our CEO</h2>
                
                <div class="relative">
                    <i class="fa-solid fa-quote-left absolute -top-4 -left-6 text-5xl text-gray-100 -z-10"></i>
                    <p class="text-lg text-slate-600 leading-relaxed mb-6 font-light italic">
                        "At FlyDealz.lk, we don't just book tickets; we craft premium travel experiences. Our vision is to elevate the standard of corporate and leisure travel in Sri Lanka by providing unmatched reliability, exclusive deals, and deeply personalized service."
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8 font-light italic">
                        "We understand that your time is valuable. That’s why our dedicated team of travel experts works tirelessly behind the scenes, ensuring that every journey you take is completely seamless from takeoff to landing."
                    </p>
                    
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('images/Logo.jpg') }}" alt="FlyDealz" class="h-10">
                        <div class="h-10 w-px bg-gray-200"></div>
                        <p class="text-sm font-semibold text-navy-blue uppercase tracking-widest">FlyDealz.lk (Pvt) Ltd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Today's Exclusive Offers -->
<section class="py-20 bg-dark-navy text-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-royal-blue/30 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-primary-pink/20 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="text-primary-pink font-semibold tracking-wider text-sm uppercase mb-2 block"><i class="fa-solid fa-fire mr-2"></i>Limited Time</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Today's Exclusive Offers</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($packages as $package)
            <div class="bg-white rounded-2xl p-6 shadow-xl relative border-t-4 border-primary-pink hover:-translate-y-2 transition-transform duration-300">
                @if($loop->first)
                <div class="absolute top-0 right-0 bg-primary-pink text-white text-xs font-bold px-3 py-1 rounded-bl-lg uppercase tracking-wide">Featured</div>
                @endif
                <div class="flex items-center gap-2 text-slate-500 text-xs font-medium mb-4 mt-2">
                    <span><i class="fa-solid fa-calendar-day mr-1"></i> {{ $package->duration_days }} Days</span>
                </div>
                <h3 class="text-2xl font-bold text-navy-blue mb-2 flex items-center justify-between">
                    {{ $package->departure_location }} 
                    <i class="fa-solid fa-arrow-right-arrow-left text-gray-300 text-lg mx-2"></i> 
                    {{ $package->destination->name ?? $package->title }}
                </h3>
                <p class="text-slate-600 mb-6 text-sm line-clamp-2"><strong>{{ $package->title }}</strong> - {{ $package->description ?? 'Experience our premium flight packages with exclusive deals.' }}</p>
                <div class="border-t border-gray-100 pt-4 mb-6">
                    <p class="text-xs text-slate-400 uppercase font-bold tracking-wide mb-1">Starting from</p>
                    <p class="text-2xl font-black text-navy-blue">LKR {{ number_format($package->price, 2) }} <span class="text-xs font-normal text-slate-500"></span></p>
                </div>
                <button @click="$dispatch('open-booking', { from: '{{ addslashes($package->departure_location) }}', to: '{{ addslashes($package->destination->name ?? $package->title) }}' })" class="w-full bg-primary-pink hover:bg-pink-500 text-white font-semibold py-3 px-4 rounded-lg shadow-sm transition-colors text-sm">
                    Book Now
                </button>
            </div>
            @endforeach
            
            @if($packages->isEmpty())
                <p class="text-center text-white col-span-3">More exclusive offers coming soon!</p>
            @endif
        </div>
    </div>
</section>

<!-- 6. Popular Destinations -->
<section class="py-20 bg-light-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-navy-blue mb-4">Explore Popular Destinations</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Discover the world's most sought-after locations with our specially curated travel packages.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $dest)
            <div class="group rounded-2xl overflow-hidden relative shadow-sm hover:shadow-xl transition-all duration-300 bg-white">
                <div class="h-64 overflow-hidden bg-gray-100 flex items-center justify-center">
                    @if($dest->image)
                        <img src="{{ asset('storage/' . $dest->image) }}" alt="{{ $dest->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <i class="fa-solid fa-map-location-dot fa-4x text-gray-300 group-hover:scale-110 transition-transform duration-500"></i>
                    @endif
                </div>
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur text-navy-blue text-xs font-bold px-3 py-1 rounded-full shadow">Destination</div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy-blue mb-2">{{ $dest->name }}</h3>
                    <p class="text-slate-500 text-sm mb-4 line-clamp-2">{{ $dest->description ?? 'Discover the beauty and culture of this amazing destination.' }}</p>
                    <button @click="$dispatch('open-booking', { to: '{{ $dest->name }}' })" class="text-primary-pink font-semibold hover:text-pink-600 transition-colors flex items-center">
                        Explore Flights <i class="fa-solid fa-chevron-right ml-2 text-xs"></i>
                    </button>
                </div>
            </div>
            @endforeach
            
            @if($destinations->isEmpty())
                <p class="text-center text-muted col-span-3">More destinations coming soon!</p>
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-navy-blue border-b border-white/10">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Ready to start your premium journey?</h2>
        <p class="text-royal-blue text-blue-100 mb-8 max-w-2xl mx-auto">Contact our dedicated travel experts today and let us handle all your travel arrangements with precision and care.</p>
        <button @click="$dispatch('open-booking')" class="bg-primary-pink hover:bg-pink-500 text-white font-semibold py-4 px-10 rounded-full shadow-lg transition-transform hover:-translate-y-1 text-lg inline-flex items-center">
            Book Your Flight Now <i class="fa-solid fa-plane-departure ml-3"></i>
        </button>
    </div>
</section>

@endsection
