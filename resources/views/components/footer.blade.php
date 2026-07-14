<footer class="bg-dark-navy text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            <!-- Column 1: Brand -->
            <div>
                <img src="{{ asset('images/Logo.png') }}" alt="FlyDealz.lk" class="h-14 mb-6">
                <p class="text-gray-300 mb-6 text-sm leading-relaxed">
                    FlyDealz.lk is your trusted premium corporate travel agency in Sri Lanka. We specialize in providing seamless journeys, exclusive flight deals, and personalized travel experiences.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary-pink transition-colors">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary-pink transition-colors">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary-pink transition-colors">
                        <i class="fa-brands fa-facebook-messenger"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary-pink transition-colors">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-6 border-b border-white/20 pb-2 inline-block">Quick Links</h3>
                <ul class="space-y-3 text-gray-300">
                    <li><a href="{{ url('/') }}" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Home</a></li>
                    <li><a href="{{ url('/about') }}" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> About Us</a></li>
                    <li><a href="{{ url('/staff') }}" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Our Staff</a></li>
                    <li><a href="{{ url('/gallery') }}" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Gallery</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 3: Services -->
            <div>
                <h3 class="text-lg font-semibold mb-6 border-b border-white/20 pb-2 inline-block">Our Services</h3>
                <ul class="space-y-3 text-gray-300">
                    <li><a href="#" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Flight Booking</a></li>
                    <li><a href="#" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Travel Consultation</a></li>
                    <li><a href="#" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Holiday Packages</a></li>
                    <li><a href="#" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Visa Assistance</a></li>
                    <li><a href="#" class="hover:text-primary-pink transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-primary-pink"></i> Corporate Travel</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-6 border-b border-white/20 pb-2 inline-block">Contact Information</h3>
                <ul class="space-y-4 text-gray-300">
                    <li class="flex items-start">
                        <i class="fa-solid fa-location-dot mt-1.5 mr-3 text-primary-pink"></i>
                        <a href="https://maps.google.com/?q=178+Main+Street+Eravur+Sri+Lanka" target="_blank" class="hover:text-primary-pink transition-colors">178, Main Street,<br>Eravur, Sri Lanka, 30300</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone mr-3 text-primary-pink"></i>
                        <a href="tel:0779327789" class="hover:text-primary-pink transition-colors">077 932 7789</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-brands fa-whatsapp mr-3 text-primary-pink text-lg"></i>
                        <a href="https://wa.me/94743831311" target="_blank" class="hover:text-primary-pink transition-colors">+94 74 383 1311</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope mr-3 text-primary-pink"></i>
                        <a href="mailto:info@flydealz.lk" class="hover:text-primary-pink transition-colors">info@flydealz.lk</a>
                    </li>
                </ul>
            </div>
            
        </div>
        
        <!-- Bottom Footer -->
        <div class="border-t border-white/10 pt-8 mt-8 text-center md:flex md:justify-between items-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} FlyDealz.lk (Pvt) Ltd. All Rights Reserved.</p>
            <div class="mt-4 md:mt-0 space-x-4">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
