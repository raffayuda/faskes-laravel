@extends('layouts.landing')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="hero-pattern text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Sistem Informasi <br>
                <span class="text-yellow-400">Fasilitas Kesehatan</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Temukan fasilitas kesehatan terdekat dengan mudah dan cepat
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('landing.search') }}" 
                   class="bg-yellow-400 text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-yellow-300 transition-colors duration-200">
                    <i class="fas fa-search mr-2"></i>
                    Cari Faskes Sekarang
                </a>
                <a href="{{ route('landing.about') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-900 transition-colors duration-200">
                    <i class="fas fa-info-circle mr-2"></i>
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="bg-blue-50 p-8 rounded-xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital text-2xl text-white"></i>
                </div>
                <h3 class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($totalFaskes) }}+</h3>
                <p class="text-gray-600">Fasilitas Kesehatan</p>
            </div>

            <div class="bg-green-50 p-8 rounded-xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map text-2xl text-white"></i>
                </div>
                <h3 class="text-3xl font-bold text-green-600 mb-2">{{ $totalProvinsi }}</h3>
                <p class="text-gray-600">Provinsi</p>
            </div>

            <div class="bg-purple-50 p-8 rounded-xl" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-stethoscope text-2xl text-white"></i>
                </div>
                <h3 class="text-3xl font-bold text-purple-600 mb-2">{{ $totalJenisFaskes }}</h3>
                <p class="text-gray-600">Jenis Layanan</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Fitur Unggulan
            </h2>
            <p class="text-xl text-gray-600">
                Berbagai fitur yang memudahkan Anda dalam mencari informasi fasilitas kesehatan
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-search text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Pencarian Mudah</h3>
                <p class="text-gray-600">
                    Temukan fasilitas kesehatan berdasarkan lokasi, nama, atau jenis layanan dengan mudah dan cepat.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-map-marker-alt text-green-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Lokasi Akurat</h3>
                <p class="text-gray-600">
                    Informasi lokasi yang akurat dengan koordinat dan alamat lengkap fasilitas kesehatan.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-purple-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Favorit Personal</h3>
                <p class="text-gray-600">
                    Simpan fasilitas kesehatan favorit Anda untuk akses yang lebih mudah di kemudian hari.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-mobile-alt text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Responsif</h3>
                <p class="text-gray-600">
                    Akses dari berbagai perangkat - desktop, tablet, atau smartphone dengan tampilan yang optimal.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="500">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-database text-yellow-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Data Terkini</h3>
                <p class="text-gray-600">
                    Database yang selalu diperbarui dengan informasi fasilitas kesehatan terbaru dan akurat.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="600">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-users text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">User Friendly</h3>
                <p class="text-gray-600">
                    Interface yang intuitif dan mudah digunakan untuk semua kalangan dengan berbagai tingkat kemampuan teknologi.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Siap Memulai Pencarian?
        </h2>
        <p class="text-xl text-blue-100 mb-8">
            Bergabunglah dengan ribuan pengguna yang telah merasakan kemudahan mencari fasilitas kesehatan
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" 
               class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors duration-200">
                <i class="fas fa-user-plus mr-2"></i>
                Daftar Gratis
            </a>
            <a href="{{ route('landing.search') }}" 
               class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-600 transition-colors duration-200">
                <i class="fas fa-search mr-2"></i>
                Mulai Pencarian
            </a>
        </div>
    </div>
</section>
@endsection
