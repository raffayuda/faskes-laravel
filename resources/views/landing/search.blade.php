@extends('layouts.landing')

@section('title', 'Cari Fasilitas Kesehatan')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-teal-600 to-cyan-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Cari Fasilitas Kesehatan</h1>
            <p class="text-xl mb-8">Temukan fasilitas kesehatan terdekat dengan mudah dan cepat</p>
        </div>
    </div>
</div>

<!-- Search Form -->
<div class="py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg p-8 -mt-16 relative z-10">
            <form method="GET" action="{{ route('landing.search') }}" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Search by Name -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Faskes
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   name="search" 
                                   id="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari nama faskes..."
                                   class="pl-10 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- Filter by Province -->
                    <div>
                        <label for="provinsi_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Provinsi
                        </label>
                        <select name="provinsi_id" 
                                id="provinsi_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            <option value="">Semua Provinsi</option>
                            @foreach($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}" {{ request('provinsi_id') == $provinsi->id ? 'selected' : '' }}>
                                    {{ $provinsi->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter by Jenis Faskes -->
                    <div>
                        <label for="jenis_faskes_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Faskes
                        </label>
                        <select name="jenis_faskes_id" 
                                id="jenis_faskes_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent">
                            <option value="">Semua Jenis</option>
                            @foreach($jenisFaskes as $jenis)
                                <option value="{{ $jenis->id }}" {{ request('jenis_faskes_id') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">
                        <button type="submit" 
                                class="w-full bg-teal-600 text-white py-2 px-4 rounded-lg hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-search mr-2"></i>
                            Cari
                        </button>
                    </div>
                </div>

                @if(request()->hasAny(['search', 'provinsi_id', 'jenis_faskes_id']))
                <div class="flex justify-center">
                    <a href="{{ route('landing.search') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Reset Filter
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>

<!-- Search Results -->
<div class="py-8">
    <div class="container mx-auto px-4">
        @if(request()->hasAny(['search', 'provinsi_id', 'jenis_faskes_id']))
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Hasil Pencarian</h2>
                <p class="text-gray-600">Ditemukan {{ $faskes->total() }} fasilitas kesehatan</p>
            </div>

            @if($faskes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($faskes as $item)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                            <i class="fas fa-hospital text-white text-4xl"></i>
                        </div>
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $item->nama }}</h3>
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800">
                                    {{ $item->jenisFaskes->nama ?? 'N/A' }}
                                </span>
                            </div>
                            
                            <div class="space-y-2 text-sm text-gray-600 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt w-4 h-4 mr-2 text-gray-400"></i>
                                    <span>{{ $item->kabkota->nama ?? 'N/A' }}, {{ $item->kabkota->provinsi->nama ?? 'N/A' }}</span>
                                </div>
                                
                                @if($item->alamat)
                                <div class="flex items-start">
                                    <i class="fas fa-location-dot w-4 h-4 mr-2 text-gray-400 mt-0.5"></i>
                                    <span class="line-clamp-2">{{ $item->alamat }}</span>
                                </div>
                                @endif

                                @if($item->nama_pengelola)
                                <div class="flex items-center">
                                    <i class="fas fa-user-tie w-4 h-4 mr-2 text-gray-400"></i>
                                    <span>{{ $item->nama_pengelola }}</span>
                                </div>
                                @endif

                                @if($item->website)
                                <div class="flex items-center">
                                    <i class="fas fa-globe w-4 h-4 mr-2 text-gray-400"></i>
                                    <a href="{{ $item->website }}" target="_blank" class="text-teal-600 hover:text-teal-800">
                                        Website
                                    </a>
                                </div>
                                @endif

                                @if($item->email)
                                <div class="flex items-center">
                                    <i class="fas fa-envelope w-4 h-4 mr-2 text-gray-400"></i>
                                    <a href="mailto:{{ $item->email }}" class="text-teal-600 hover:text-teal-800">
                                        {{ $item->email }}
                                    </a>
                                </div>
                                @endif
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $item->kategori->nama ?? 'Umum' }}
                                </span>
                                
                                @auth
                                <div class="text-right">
                                    <a href="{{ route('login') }}" 
                                       class="text-teal-600 hover:text-teal-800 text-sm font-medium">
                                        Lihat Detail
                                    </a>
                                </div>
                                @else
                                <div class="text-right">
                                    <a href="{{ route('login') }}" 
                                       class="text-teal-600 hover:text-teal-800 text-sm font-medium">
                                        Login untuk Detail
                                    </a>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $faskes->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="max-w-md mx-auto">
                        <i class="fas fa-search text-gray-400 text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak Ada Hasil</h3>
                        <p class="text-gray-600 mb-6">Maaf, tidak ditemukan fasilitas kesehatan yang sesuai dengan kriteria pencarian Anda.</p>
                        <a href="{{ route('landing.search') }}" 
                           class="inline-block bg-teal-600 text-white px-6 py-2 rounded-lg hover:bg-teal-700 transition-colors duration-200">
                            Reset Pencarian
                        </a>
                    </div>
                </div>
            @endif
        @else
            <!-- Default view when no search is performed -->
            <div class="text-center py-12">
                <div class="max-w-2xl mx-auto">
                    <i class="fas fa-hospital text-teal-600 text-6xl mb-6"></i>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Temukan Fasilitas Kesehatan</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Gunakan form pencarian di atas untuk menemukan fasilitas kesehatan berdasarkan lokasi, 
                        jenis, atau nama. Database kami mencakup ribuan fasilitas kesehatan di seluruh Indonesia.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-hospital text-blue-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $totalFaskes ?? 0 }}+</h3>
                            <p class="text-gray-600">Fasilitas Kesehatan</p>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-map-marker-alt text-green-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $totalProvinsi ?? 0 }}</h3>
                            <p class="text-gray-600">Provinsi</p>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-list text-purple-600 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $totalJenisFaskes ?? 0 }}+</h3>
                            <p class="text-gray-600">Jenis Faskes</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-teal-600 to-cyan-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Butuh Akses Lebih Lengkap?</h2>
        <p class="text-xl mb-8">Daftar sekarang untuk mendapatkan akses ke fitur-fitur premium dan menyimpan faskes favorit Anda</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" 
               class="inline-block bg-white text-teal-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Daftar Gratis
            </a>
            <a href="{{ route('login') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-teal-600 transition-colors duration-200">
                Login
            </a>
        </div>
    </div>
</div>
@endsection
