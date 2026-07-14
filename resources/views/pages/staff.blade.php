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
            @forelse($staff as $member)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group text-center p-8">
                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden mb-6 border-4 border-light-bg group-hover:border-primary-pink transition-colors">
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=041E46&color=fff&size=150" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <h3 class="text-xl font-bold text-navy-blue mb-1">{{ $member->name }}</h3>
                <p class="text-primary-pink font-medium text-sm mb-4">{{ $member->role }}</p>
                <p class="text-slate-500 text-sm">{{ $member->description }}</p>
            </div>
            @empty
            <div class="col-span-full text-center text-slate-500 py-10">
                <p>No staff members found.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
