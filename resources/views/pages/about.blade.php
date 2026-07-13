@extends('layouts.app')

@section('title', 'About Us - FlyDealz.lk')

@section('content')

<!-- Banner -->
<div class="bg-navy-blue pt-32 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1542296332-2e4473faf563?auto=format&fit=crop&w=1920&q=80" alt="About Pattern" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About FlyDealz.lk</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Your trusted premium corporate travel agency in Sri Lanka.</p>
    </div>
</div>

<!-- Introduction -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-16 items-center">
            <div class="w-full md:w-1/2">
                <span class="text-primary-pink font-semibold tracking-wider text-sm uppercase mb-2 block">Company Introduction</span>
                <h2 class="text-3xl md:text-4xl font-bold text-navy-blue mb-6">Redefining Premium Travel in Sri Lanka</h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    FlyDealz.lk (Pvt) Ltd is a premier travel agency dedicated to providing exclusive flight deals, customized holiday packages, and comprehensive corporate travel management. Based in Eravur, Sri Lanka, we have built a reputation for excellence, reliability, and personalized customer care.
                </p>
                <p class="text-slate-600 leading-relaxed">
                    Whether you are flying for business or leisure, our expert consultants work tirelessly to ensure that your journey is seamless, comfortable, and tailored specifically to your needs.
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <div class="rounded-2xl overflow-hidden shadow-xl relative">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=80" alt="Office" class="w-full h-auto">
                    <div class="absolute inset-0 border-4 border-white/20 rounded-2xl"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-light-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="bg-white p-10 rounded-2xl shadow-sm border-t-4 border-navy-blue">
                <div class="w-14 h-14 bg-navy-blue/10 rounded-lg flex items-center justify-center mb-6">
                    <i class="fa-solid fa-bullseye text-2xl text-navy-blue"></i>
                </div>
                <h3 class="text-2xl font-bold text-navy-blue mb-4">Our Mission</h3>
                <p class="text-slate-600 leading-relaxed">
                    To deliver unparalleled travel experiences by combining exclusive deals, exceptional customer service, and innovative travel solutions that exceed our clients' expectations.
                </p>
            </div>
            
            <!-- Vision -->
            <div class="bg-white p-10 rounded-2xl shadow-sm border-t-4 border-primary-pink">
                <div class="w-14 h-14 bg-primary-pink/10 rounded-lg flex items-center justify-center mb-6">
                    <i class="fa-regular fa-eye text-2xl text-primary-pink"></i>
                </div>
                <h3 class="text-2xl font-bold text-navy-blue mb-4">Our Vision</h3>
                <p class="text-slate-600 leading-relaxed">
                    To be the most trusted and preferred corporate and leisure travel partner in Sri Lanka, setting the benchmark for premium travel services globally.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us List -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-navy-blue mb-16">Our Core Values</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <div>
                <h4 class="text-xl font-bold text-navy-blue mb-3 flex items-center"><i class="fa-solid fa-check text-primary-pink mr-3"></i> Integrity</h4>
                <p class="text-slate-600 pl-7">We operate with complete transparency and honesty in all our bookings and customer interactions.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold text-navy-blue mb-3 flex items-center"><i class="fa-solid fa-check text-primary-pink mr-3"></i> Excellence</h4>
                <p class="text-slate-600 pl-7">We strive for perfection, ensuring every journey is planned flawlessly down to the last detail.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold text-navy-blue mb-3 flex items-center"><i class="fa-solid fa-check text-primary-pink mr-3"></i> Customer First</h4>
                <p class="text-slate-600 pl-7">Your comfort and satisfaction are our highest priorities. We are available 24/7 to support you.</p>
            </div>
        </div>
    </div>
</section>

@endsection
