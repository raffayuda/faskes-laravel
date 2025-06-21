@extends('layouts.app')

@section('title', 'Faskes Favorit')
@section('page-title', 'Faskes Favorit')

@section('content')
<div class="space-y-6">
    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    <i class="fas fa-heart mr-2 text-red-500"></i>
                    Faskes Favorit Saya
                </h1>
                <p class="text-gray-600 mt-1">
                    Daftar fasilitas kesehatan yang telah Anda tandai sebagai favorit
                </p>
            </div>

            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-heart mr-2"></i>
                Total: {{ $favorites->total() }} faskes
            </div>
        </div>
    </div>

    @if($favorites->count() > 0)
    <!-- Favorites Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($favorites as $faskes)
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <!-- Foto atau Icon -->
                    <div class="flex items-center">
                        @if($faskes->foto)
                            <img src="{{ asset('uploads/faskes/' . $faskes->foto) }}" 
                                 alt="Foto {{ $faskes->nama }}" 
                                 class="w-12 h-12 rounded-lg object-cover border-2 border-gray-200">
                        @else
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-hospital text-blue-600 text-lg"></i>
                            </div>
                        @endif
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">
                                {{ $faskes->nama }}
                            </h3>
                            @if($faskes->getTotalRatings() > 0)
                                <div class="flex items-center space-x-1 mt-1">
                                    @php $avgRating = round($faskes->getAverageRating(), 1); @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-xs {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                    @endfor
                                    <span class="text-xs text-gray-500">({{ $avgRating }}/5 - {{ $faskes->getTotalRatings() }} rating)</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Favorite Toggle -->
                    <form action="{{ route('favorites.destroy', $faskes) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-700 transition-colors"
                                title="Hapus dari favorit"
                                onclick="return confirm('Hapus dari favorit?')">
                            <i class="fas fa-heart text-xl"></i>
                        </button>
                    </form>
                </div>

                <!-- Info -->
                <div class="space-y-3">
                    <!-- Location -->
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-gray-400 mt-1 mr-2"></i>
                        <div class="text-sm text-gray-600">
                            @if($faskes->kabkota)
                                {{ $faskes->kabkota->nama }}
                                @if($faskes->kabkota->provinsi)
                                    , {{ $faskes->kabkota->provinsi->nama }}
                                @endif
                            @else
                                Lokasi tidak tersedia
                            @endif
                        </div>
                    </div>

                    <!-- Type -->
                    @if($faskes->jenisFaskes)
                    <div class="flex items-center">
                        <i class="fas fa-hospital-symbol text-gray-400 mr-2"></i>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $faskes->jenisFaskes->nama }}
                        </span>
                    </div>
                    @endif

                    <!-- Category -->
                    @if($faskes->kategori)
                    <div class="flex items-center">
                        <i class="fas fa-tags text-gray-400 mr-2"></i>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $faskes->kategori->nama }}
                        </span>
                    </div>                    @endif                </div>

                <!-- Rating Section -->
                @php
                    $userRating = auth()->user()->getRatingForFaskes($faskes->id);
                @endphp
                
                <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">
                        <i class="fas fa-star mr-1"></i>
                        {{ $userRating ? 'Rating Anda' : 'Berikan Rating' }}
                    </h4>
                    
                    <form action="{{ route('faskes.rating.store', $faskes) }}" method="POST" class="space-y-3">
                        @csrf
                        
                        <!-- Star Rating -->
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" 
                                        class="rating-star text-2xl transition-colors duration-200 {{ $userRating && $i <= $userRating->rating ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400' }}"
                                        data-rating="{{ $i }}">
                                    <i class="fas fa-star"></i>
                                </button>
                            @endfor
                            <input type="hidden" name="rating" id="rating-{{ $faskes->id }}" value="{{ $userRating ? $userRating->rating : '' }}">
                        </div>
                        
                        <!-- Review -->
                        <textarea name="review" 
                                  rows="2" 
                                  placeholder="Berikan ulasan (opsional)"
                                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $userRating ? $userRating->review : '' }}</textarea>
                        
                        <!-- Submit Buttons -->
                        <div class="flex space-x-2">
                            <button type="submit" 
                                    class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-save mr-1"></i>
                                {{ $userRating ? 'Update' : 'Simpan' }}
                            </button>
                            
                            @if($userRating)
                                <form action="{{ route('faskes.rating.destroy', $faskes) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors"
                                            onclick="return confirm('Hapus rating Anda?')">
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Actions -->
                <div class="flex space-x-2 mt-6">                    <a href="{{ route('faskes.show', $faskes) }}" 
                       class="inline-flex items-center justify-center w-full px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($favorites->hasPages())
    <div class="flex justify-center">
        {{ $favorites->links() }}
    </div>
    @endif

    @else
    <!-- Empty State -->
    <div class="bg-white rounded-xl shadow-lg p-12 text-center border border-gray-200">
        <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-heart text-red-500 text-3xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Belum Ada Faskes Favorit</h3>
        <p class="text-gray-600 mb-6 max-w-md mx-auto">
            Anda belum menandai faskes mana pun sebagai favorit. 
            Mulai jelajahi faskes dan tandai yang menarik untuk Anda!
        </p>
        <a href="{{ route('faskes.index') }}" 
           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-search mr-2"></i>
            Jelajahi Faskes
        </a>
    </div>    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle star rating interactions
    const ratingContainers = document.querySelectorAll('form[action*="rating"]');
    
    ratingContainers.forEach(container => {
        const stars = container.querySelectorAll('.rating-star');
        const ratingInput = container.querySelector('input[name="rating"]');
        
        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.dataset.rating);
                ratingInput.value = rating;
                
                // Update star colors
                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-yellow-400');
                    } else {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-300');
                    }
                });
            });
            
            // Hover effect
            star.addEventListener('mouseenter', function() {
                const rating = parseInt(this.dataset.rating);
                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.add('text-yellow-300');
                    }
                });
            });
            
            star.addEventListener('mouseleave', function() {
                stars.forEach((s) => {
                    s.classList.remove('text-yellow-300');
                });
            });
        });
    });
});
</script>
@endsection
