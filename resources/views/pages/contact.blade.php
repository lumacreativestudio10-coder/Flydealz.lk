@extends('layouts.app')

@section('title', 'Contact Us - FlyDealz.lk')

@section('content')

<!-- Banner -->
<div class="bg-navy-blue pt-32 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1516738901171-8eb4fc13bd20?auto=format&fit=crop&w=1920&q=80" alt="Contact Pattern" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Get in Touch</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">We are here to assist you 24/7 with your travel inquiries and bookings.</p>
    </div>
</div>

<!-- Contact Content -->
<section class="py-20 bg-light-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Left: Contact Details -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-navy-blue h-full">
                    <h3 class="text-2xl font-bold text-navy-blue mb-8">Contact Information</h3>
                    
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-light-bg rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-primary-pink text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy-blue mb-1">Office Address</h4>
                                <a href="https://maps.google.com/?q=178+Main+Street+Eravur+Sri+Lanka" target="_blank" class="text-slate-600 text-sm leading-relaxed hover:text-primary-pink transition-colors">#178, Main Street,<br>Eravur,<br>Sri Lanka, 30300</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-light-bg rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa-solid fa-phone text-primary-pink text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy-blue mb-1">Direct Line</h4>
                                <a href="tel:0779327789" class="text-slate-600 text-sm hover:text-primary-pink transition-colors">077 932 7789</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-light-bg rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa-brands fa-whatsapp text-primary-pink text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy-blue mb-1">WhatsApp Support</h4>
                                <a href="https://wa.me/94743831311" target="_blank" class="text-slate-600 text-sm hover:text-primary-pink transition-colors">+94 74 383 1311</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-light-bg rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa-solid fa-envelope text-primary-pink text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy-blue mb-1">Email Us</h4>
                                <a href="mailto:info@flydealz.lk" class="text-slate-600 text-sm hover:text-primary-pink transition-colors">info@flydealz.lk</a>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-light-bg rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa-regular fa-clock text-primary-pink text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-navy-blue mb-1">Business Hours</h4>
                                <p class="text-slate-600 text-sm">Monday - Sunday: 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Inquiry Form (Alpine.js state) -->
            <div class="w-full lg:w-2/3" x-data="{ 
                formSubmitted: false,
                formData: { name: '', email: '', phone: '', subject: '', message: '' },
                submitForm() {
                    fetch('/api/contacts', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify(this.formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            this.formSubmitted = true;
                            setTimeout(() => { 
                                this.formSubmitted = false; 
                                this.formData = { name: '', email: '', phone: '', subject: '', message: '' };
                            }, 5000);
                        }
                    });
                }
            }">
                <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-bold text-navy-blue mb-2">Send an Inquiry</h3>
                    <p class="text-slate-500 mb-8">Our travel consultants usually respond within 1 hour.</p>
                    
                    <!-- Success Message -->
                    <div x-show="formSubmitted" x-transition class="mb-8 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center text-green-700" style="display: none;">
                        <i class="fa-solid fa-circle-check text-2xl mr-3"></i>
                        <p class="font-medium">Thank you! Your message has been sent successfully. We will contact you soon.</p>
                    </div>

                    <!-- Form -->
                    <form @submit.prevent="submitForm()" x-show="!formSubmitted" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Full Name *</label>
                                <input type="text" x-model="formData.name" required minlength="3" maxlength="100" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address *</label>
                                <input type="email" x-model="formData.email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="john@example.com">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number *</label>
                                <input type="tel" x-model="formData.phone" required pattern="[0-9\+\-\s]+" minlength="9" maxlength="15" oninput="this.value = this.value.replace(/[^0-9\+]/g, '')" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="e.g. 0770000000">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Subject *</label>
                                <select x-model="formData.subject" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white text-slate-700">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="flight">Flight Booking</option>
                                    <option value="holiday">Holiday Package</option>
                                    <option value="visa">Visa Assistance</option>
                                    <option value="support">Customer Support</option>
                                    <option value="other">Other Inquiry</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Your Message *</label>
                            <textarea x-model="formData.message" rows="5" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-pink focus:border-primary-pink transition-colors outline-none bg-gray-50 focus:bg-white" placeholder="How can we help you?"></textarea>
                        </div>

                        <button type="submit" class="w-full md:w-auto bg-primary-pink hover:bg-pink-500 text-white font-semibold py-3 px-10 rounded-lg shadow-md transition-colors flex items-center justify-center">
                            Send Inquiry <i class="fa-regular fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
