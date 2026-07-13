<div x-show="bookingModalOpen" 
     x-transition.opacity.duration.300ms
     class="fixed inset-0 z-[100] flex items-center justify-center bg-dark-navy/80 backdrop-blur-sm p-4 overflow-y-auto"
     x-cloak>
     
    <div x-show="bookingModalOpen"
         @click.away="bookingModalOpen = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-8 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-8 scale-95"
         class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl my-8 relative overflow-hidden"
         x-data="{ 
            step: 1, 
            submitBooking() {
                this.step = 2;
            },
            closeModal() {
                bookingModalOpen = false;
                setTimeout(() => { this.step = 1; }, 300);
            }
         }">
         
        <!-- Close Button -->
        <button @click="closeModal()" class="absolute top-4 right-4 w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-gray-200 hover:text-navy-blue transition-colors z-10">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- Step 1: Booking Form -->
        <div x-show="step === 1" class="p-8 md:p-10">
            <div class="text-center mb-8">
                <span class="text-primary-pink font-semibold tracking-wider text-sm uppercase mb-2 block">Book Your Flight</span>
                <h2 class="text-3xl font-bold text-navy-blue">Passenger Details</h2>
                <p class="text-slate-500 mt-2">Fill in your information and our travel experts will confirm your booking.</p>
            </div>

            <form @submit.prevent="submitBooking()" class="space-y-6">
                <!-- Personal Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Full Name *</label>
                        <input type="text" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="As per passport">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email Address *</label>
                        <input type="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="your@email.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number *</label>
                        <input type="tel" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="+94 77 000 0000">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">WhatsApp Number</label>
                        <input type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="For quick updates">
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Home Address *</label>
                    <input type="text" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="Your residential address">
                </div>

                <!-- Flight Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-light-bg p-6 rounded-xl border border-gray-100">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Departure Location *</label>
                        <input type="text" x-model="bookingData.from" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-white" placeholder="e.g. Colombo">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Destination *</label>
                        <input type="text" x-model="bookingData.to" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-white" placeholder="e.g. London">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Travel Date *</label>
                        <input type="date" x-model="bookingData.date" min="{{ date('Y-m-d') }}" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Number of Passengers *</label>
                        <input type="number" x-model="bookingData.passengers" min="1" max="50" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-white">
                    </div>
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Additional Message</label>
                    <textarea rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="Any special requests or inquiries?"></textarea>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-navy-blue hover:bg-dark-navy text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-paper-plane mr-3"></i> Submit Booking Request
                    </button>
                    <p class="text-center text-xs text-slate-400 mt-4"><i class="fa-solid fa-lock mr-1"></i> Your information is secure and encrypted.</p>
                </div>
            </form>
        </div>

        <!-- Step 2: Success State -->
        <div x-show="step === 2" class="p-12 text-center" style="display: none;">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fa-solid fa-check text-5xl text-green-500"></i>
            </div>
            <h2 class="text-4xl font-bold text-navy-blue mb-4">Thank You!</h2>
            <p class="text-lg text-slate-600 max-w-md mx-auto mb-8">
                Your booking request has been successfully submitted. Our FlyDealz.lk travel consultant will contact you shortly to confirm your itinerary.
            </p>
            <button @click="closeModal()" class="bg-primary-pink hover:bg-pink-500 text-white font-semibold py-3 px-10 rounded-full shadow-md transition-all">
                Close Window
            </button>
        </div>

    </div>
</div>
