<nav x-data="{ mobileMenuOpen: false, scrolled: false, isHome: {{ request()->is('/') ? 'true' : 'false' }} }" 
     @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false"
     :class="{ 'bg-white shadow-md text-navy-blue py-3': !isHome || scrolled, 'bg-transparent text-white py-5': isHome && !scrolled }"
     class="fixed w-full top-0 z-50 transition-all duration-300 {{ request()->is('/') ? 'bg-transparent text-white py-5' : 'bg-white shadow-md text-navy-blue py-3' }}">
     
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/Logo.png') }}" alt="FlyDealz.lk" class="h-12 md:h-16 w-auto transition-all duration-300" :class="{ 'brightness-0 invert': isHome && !scrolled }">
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="font-medium hover:text-primary-pink transition-colors {{ request()->is('/') ? 'text-primary-pink' : '' }}">Home</a>
                <a href="{{ url('/about') }}" class="font-medium hover:text-primary-pink transition-colors {{ request()->is('about') ? 'text-primary-pink' : '' }}">About Us</a>
                <a href="{{ url('/staff') }}" class="font-medium hover:text-primary-pink transition-colors {{ request()->is('staff') ? 'text-primary-pink' : '' }}">Our Staff</a>
                <a href="{{ url('/gallery') }}" class="font-medium hover:text-primary-pink transition-colors {{ request()->is('gallery') ? 'text-primary-pink' : '' }}">Gallery</a>
                <a href="{{ url('/contact') }}" class="font-medium hover:text-primary-pink transition-colors {{ request()->is('contact') ? 'text-primary-pink' : '' }}">Contact Us</a>
                
                <button @click="$dispatch('open-booking')" class="bg-primary-pink hover:bg-pink-500 text-white px-6 py-2 rounded-full font-semibold shadow-md transition-transform hover:-translate-y-0.5">
                    Book Now
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="focus:outline-none {{ request()->is('/') ? 'text-white' : 'text-navy-blue' }}" :class="{ 'text-navy-blue': !isHome || scrolled, 'text-white': isHome && !scrolled }">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         class="md:hidden absolute w-full bg-white shadow-lg text-navy-blue"
         x-cloak>
        <div class="px-4 pt-2 pb-6 space-y-1 flex flex-col border-t border-gray-100">
            <a href="{{ url('/') }}" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 {{ request()->is('/') ? 'text-primary-pink bg-gray-50' : '' }}">Home</a>
            <a href="{{ url('/about') }}" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 {{ request()->is('about') ? 'text-primary-pink bg-gray-50' : '' }}">About Us</a>
            <a href="{{ url('/staff') }}" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 {{ request()->is('staff') ? 'text-primary-pink bg-gray-50' : '' }}">Our Staff</a>
            <a href="{{ url('/gallery') }}" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 {{ request()->is('gallery') ? 'text-primary-pink bg-gray-50' : '' }}">Gallery</a>
            <a href="{{ url('/contact') }}" class="block px-3 py-3 rounded-md text-base font-medium hover:bg-gray-50 {{ request()->is('contact') ? 'text-primary-pink bg-gray-50' : '' }}">Contact Us</a>
            <button @click="$dispatch('open-booking'); mobileMenuOpen = false" class="mt-4 w-full bg-primary-pink hover:bg-pink-500 text-white px-6 py-3 rounded-md font-semibold text-center">
                Book Now
            </button>
        </div>
    </div>
</nav>
