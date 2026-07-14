@extends('layouts.app')

@section('title', 'Gallery - FlyDealz.lk')

@section('content')

<!-- Banner -->
<div class="bg-navy-blue pt-32 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?auto=format&fit=crop&w=1920&q=80" alt="Gallery Pattern" class="w-full h-full object-cover">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Inspiration Gallery</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Explore the beautiful moments and destinations captured by our travelers.</p>
    </div>
</div>

<!-- Gallery Grid -->
<section class="py-20 bg-light-bg" x-data="{ lightboxOpen: false, imageSrc: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Masonry Layout -->
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            
            @forelse($images as $img)
            <div class="break-inside-avoid relative group rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow bg-white cursor-pointer"
                 @click="imageSrc = '{{ asset('storage/' . $img->image) }}'; lightboxOpen = true">
                <img src="{{ asset('storage/' . $img->image) }}" alt="Travel Experience" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500">
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-navy-blue/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass-plus text-3xl text-white"></i>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center text-slate-500 py-10">
                    <p>Gallery is currently empty.</p>
                </div>
            @endforelse

        </div>
    </div>

    <!-- Lightbox Modal -->
    <div x-show="lightboxOpen" 
         x-transition.opacity.duration.300ms
         class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 p-4"
         x-cloak>
        
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white hover:text-primary-pink transition-colors z-10">
            <i class="fa-solid fa-xmark text-4xl"></i>
        </button>

        <img :src="imageSrc" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl" @click.away="lightboxOpen = false">
    </div>

</section>

@endsection
