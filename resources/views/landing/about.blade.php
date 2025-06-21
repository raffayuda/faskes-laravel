@extends('layouts.landing')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Tentang Faskes Indonesia</h1>
            <p class="text-xl mb-8">Membangun sistem informasi kesehatan yang terpadu untuk Indonesia yang lebih sehat</p>
        </div>
    </div>
</div>

<!-- About Content -->
<div class="py-16">
    <div class="container mx-auto px-4">
        <!-- Vision & Mission -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Visi Kami</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Menjadi platform terdepan dalam penyediaan informasi fasilitas kesehatan yang akurat, 
                    komprehensif, dan mudah diakses untuk seluruh masyarakat Indonesia.
                </p>
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-900 mb-3">Komitmen Kami</h3>
                    <ul class="space-y-2 text-blue-800">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>
                            Akurasi data yang tinggi
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>
                            Kemudahan akses informasi
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-3"></i>
                            Keamanan data terjamin
                        </li>
                    </ul>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Misi Kami</h2>
                <div class="space-y-4">
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <div class="flex items-start">
                            <div class="bg-blue-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-database text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Mengelola Data Komprehensif</h3>
                                <p class="text-gray-600">Mengumpulkan dan mengelola data fasilitas kesehatan dari seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <div class="flex items-start">
                            <div class="bg-green-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-users text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Melayani Masyarakat</h3>
                                <p class="text-gray-600">Menyediakan informasi yang mudah diakses untuk membantu masyarakat</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                        <div class="flex items-start">
                            <div class="bg-purple-100 rounded-lg p-3 mr-4">
                                <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Mendukung Kebijakan</h3>
                                <p class="text-gray-600">Menyediakan data akurat untuk mendukung kebijakan kesehatan nasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="bg-gray-50 rounded-2xl p-8 mb-16">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Pencapaian Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-blue-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hospital text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">5,000+</h3>
                    <p class="text-gray-600">Fasilitas Kesehatan</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-green-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">34</h3>
                    <p class="text-gray-600">Provinsi</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-city text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">500+</h3>
                    <p class="text-gray-600">Kabupaten/Kota</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-orange-600 text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">1,000+</h3>
                    <p class="text-gray-600">Pengguna Aktif</p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Tim Kami</h2>
            <p class="text-lg text-gray-600">Tim profesional yang berdedikasi untuk kemajuan kesehatan Indonesia</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-user text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Dr. Ahmad Susanto</h3>
                    <p class="text-blue-600 mb-3">Direktur Utama</p>
                    <p class="text-gray-600 text-sm">Memimpin visi strategis pengembangan sistem informasi kesehatan nasional</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="h-64 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                    <i class="fas fa-user text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Dr. Sari Indrawati</h3>
                    <p class="text-green-600 mb-3">Kepala Divisi Data</p>
                    <p class="text-gray-600 text-sm">Mengelola kualitas dan akurasi data fasilitas kesehatan</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="h-64 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-user text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Budi Setiawan, S.T.</h3>
                    <p class="text-purple-600 mb-3">Kepala Divisi IT</p>
                    <p class="text-gray-600 text-sm">Mengembangkan dan memelihara infrastruktur teknologi</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Bergabunglah dengan Kami</h2>
        <p class="text-xl mb-8">Mari bersama-sama membangun sistem kesehatan yang lebih baik untuk Indonesia</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" 
               class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
                Daftar Sekarang
            </a>
            <a href="{{ route('landing.contact') }}" 
               class="inline-block border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-200">
                Hubungi Kami
            </a>
        </div>
    </div>
</div>
@endsection
