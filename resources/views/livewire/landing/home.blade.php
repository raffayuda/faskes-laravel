@section('content')
<div>
    <!-- Hero Section -->
    <div class="hero-pattern text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-indigo-900/90"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Sistem Informasi <span class="text-blue-300">Fasilitas Kesehatan</span> Indonesia
                </h1>
                <p class="text-xl md:text-2xl mb-8">
                    Platform terpadu untuk mengakses informasi fasilitas kesehatan di seluruh Indonesia
                </p>
                <div class="space-x-4">
                    <a href="{{ route('landing.search') }}" 
                       class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Cari Faskes
                    </a>
                    <a href="{{ route('register') }}" 
                       class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-900 transition-colors duration-200">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Statistics Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ number_format($totalFaskes) }}</h3>
                <p class="text-gray-600">Fasilitas Kesehatan</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalProvinsi }}</h3>
                <p class="text-gray-600">Provinsi</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-list text-purple-600 text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalJenisFaskes }}</h3>
                <p class="text-gray-600">Jenis Faskes</p>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tags text-orange-600 text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $totalKategori }}</h3>
                <p class="text-gray-600">Kategori</p>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
            <p class="text-lg text-gray-600">Berbagai fitur untuk memudahkan akses informasi kesehatan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg p-6 shadow-lg text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Pencarian Mudah</h3>
                <p class="text-gray-600">Temukan fasilitas kesehatan berdasarkan lokasi, jenis, dan kategori dengan mudah</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Faskes Favorit</h3>
                <p class="text-gray-600">Simpan dan kelola daftar fasilitas kesehatan favorit untuk akses cepat</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Profil Pengguna</h3>
                <p class="text-gray-600">Kelola informasi profil dan preferensi Anda dengan mudah</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Faskes Section -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Fasilitas Kesehatan Terbaru</h2>
            <p class="text-lg text-gray-600">Fasilitas kesehatan yang baru saja ditambahkan ke dalam sistem</p>
        </div>

        @if($recentFaskes->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($recentFaskes as $faskes)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-hospital text-white text-3xl"></i>
                </div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ Str::limit($faskes->nama, 30) }}</h3>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $faskes->jenisFaskes->nama ?? 'N/A' }}
                        </span>
                    </div>
                    
                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt w-4 h-4 mr-2 text-gray-400"></i>
                            <span>{{ $faskes->kabkota->nama ?? 'N/A' }}, {{ $faskes->kabkota->provinsi->nama ?? 'N/A' }}</span>
                        </div>
                        
                        @if($faskes->nama_pengelola)
                        <div class="flex items-center">
                            <i class="fas fa-user-tie w-4 h-4 mr-2 text-gray-400"></i>
                            <span>{{ Str::limit($faskes->nama_pengelola, 25) }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $faskes->kategori->nama ?? 'Umum' }}
                        </span>
                        
                        <div class="text-right">
                            <a href="{{ route('register') }}" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-8" data-aos="fade-up">
            <a href="{{ route('landing.search') }}" 
               class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200">
                Lihat Semua Faskes
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-16">
    <div class="container mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold mb-6">Bergabunglah dengan Kami</h2>
        <p class="text-xl mb-8">Dapatkan akses lengkap ke database fasilitas kesehatan di seluruh Indonesia</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" 
               class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Daftar Gratis
            </a>
            <a href="{{ route('landing.about') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-200">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>
</div>
@endsection
