@extends('layouts.app')

@section('title', 'Faskes Favorit')
@section('page-title', 'Faskes Favorit')

@section('content')
<div class="space-y-6">
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
            <div class="p-6">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-hospital text-blue-600 text-lg"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">
                                {{ $faskes->nama }}
                            </h3>
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
                    </div>
                    @endif                </div>

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
    </div>
    @endif
</div>
@endsection
