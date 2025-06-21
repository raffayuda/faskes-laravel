@extends('layouts.landing')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-green-600 to-teal-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Layanan Faskes Indonesia</h1>
            <p class="text-xl mb-8">Solusi komprehensif untuk informasi fasilitas kesehatan di seluruh Indonesia</p>
        </div>
    </div>
</div>

<!-- Main Services -->
<div class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Utama</h2>
            <p class="text-lg text-gray-600">Berbagai layanan unggulan untuk mendukung sistem kesehatan Indonesia</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            <!-- Service 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-database text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Database Fasilitas Kesehatan</h3>
                    <p class="text-gray-600 mb-4">
                        Akses ke database lengkap fasilitas kesehatan di seluruh Indonesia dengan informasi yang selalu ter-update.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Data real-time
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Informasi lengkap
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Mudah diakses
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                    <i class="fas fa-search-location text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pencarian Fasilitas</h3>
                    <p class="text-gray-600 mb-4">
                        Fitur pencarian canggih untuk menemukan fasilitas kesehatan berdasarkan lokasi, jenis, dan kategori.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Filter lokasi
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Filter kategori
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Hasil akurat
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-heart text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Manajemen Favorit</h3>
                    <p class="text-gray-600 mb-4">
                        Simpan dan kelola fasilitas kesehatan favorit Anda untuk akses yang lebih mudah dan cepat.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Simpan favorit
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Akses cepat
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Kelola mudah
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Additional Services -->
        <div class="bg-gray-50 rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Layanan Tambahan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start space-x-4">
                    <div class="bg-blue-100 rounded-lg p-3">
                        <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Analisis Data</h3>
                        <p class="text-gray-600">Laporan dan analisis mendalam tentang distribusi fasilitas kesehatan</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 rounded-lg p-3">
                        <i class="fas fa-mobile-alt text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Akses Mobile</h3>
                        <p class="text-gray-600">Platform yang responsif dan dapat diakses dari berbagai perangkat</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-purple-100 rounded-lg p-3">
                        <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Keamanan Data</h3>
                        <p class="text-gray-600">Sistem keamanan berlapis untuk melindungi data pengguna</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-orange-100 rounded-lg p-3">
                        <i class="fas fa-headset text-orange-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Dukungan 24/7</h3>
                        <p class="text-gray-600">Tim support yang siap membantu Anda kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Plans -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Paket Layanan</h2>
            <p class="text-lg text-gray-600">Pilih paket yang sesuai dengan kebutuhan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Basic</h3>
                    <div class="text-3xl font-bold text-gray-900 mb-2">Gratis</div>
                    <p class="text-gray-600">Untuk pengguna individual</p>
                </div>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Akses database dasar
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Pencarian standar
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Hingga 10 favorit
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-times text-gray-400 mr-3"></i>
                        Laporan analisis
                    </li>
                </ul>
                <a href="{{ route('register') }}" 
                   class="block w-full text-center bg-gray-600 text-white py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    Mulai Gratis
                </a>
            </div>

            <!-- Professional Plan -->
            <div class="bg-white border-2 border-blue-500 rounded-xl p-6 relative hover:shadow-lg transition-shadow duration-300">
                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                    <span class="bg-blue-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Popular</span>
                </div>
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Professional</h3>
                    <div class="text-3xl font-bold text-blue-600 mb-2">Rp 99K</div>
                    <p class="text-gray-600">Per bulan</p>
                </div>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Akses database lengkap
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Pencarian advanced
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Favorit unlimited
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Laporan bulanan
                    </li>
                </ul>
                <a href="{{ route('register') }}" 
                   class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    Pilih Paket
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="text-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Enterprise</h3>
                    <div class="text-3xl font-bold text-gray-900 mb-2">Custom</div>
                    <p class="text-gray-600">Untuk organisasi</p>
                </div>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Semua fitur Professional
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        API access
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Multi-user management
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Support prioritas
                    </li>
                </ul>
                <a href="{{ route('landing.contact') }}" 
                   class="block w-full text-center bg-gray-600 text-white py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-green-600 to-teal-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Siap Memulai?</h2>
        <p class="text-xl mb-8">Bergabunglah dengan ribuan pengguna yang telah merasakan manfaatnya</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" 
               class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Daftar Sekarang
            </a>
            <a href="{{ route('landing.about') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition-colors duration-200">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</div>
@endsection
