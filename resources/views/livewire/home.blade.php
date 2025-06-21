<div>
    <!-- Hero Section -->
    <section id="beranda" class="bg-gradient-to-br from-blue-50 via-white to-blue-50 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Sistem Terpercaya
                    </div>
                    <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Sistem Informasi
                        <span class="text-blue-600">Fasilitas Kesehatan</span>
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                        Solusi digital terdepan untuk mengelola data fasilitas kesehatan dengan efisien, akurat, dan real-time. Tingkatkan kualitas pelayanan kesehatan di seluruh Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Mulai Sekarang
                        </button>
                        <button class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-4 rounded-lg font-semibold text-lg transition duration-300">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
                
                <!-- Visual Content -->
                <div class="relative">
                    <div class="bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl p-8 shadow-2xl transform rotate-3 hover:rotate-0 transition duration-500">
                        <div class="bg-white rounded-xl p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-gray-800">Dashboard Faskes</h3>
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600">Rumah Sakit</span>
                                    <span class="font-bold text-blue-600">{{ number_format($stats['rumah_sakit']) }}</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600">Puskesmas</span>
                                    <span class="font-bold text-green-600">{{ number_format($stats['puskesmas']) }}</span>
                                </div>
                                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                    <span class="text-gray-600">Klinik</span>
                                    <span class="font-bold text-purple-600">{{ number_format($stats['klinik']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-4 -left-4 w-20 h-20 bg-blue-200 rounded-full opacity-50 animate-bounce"></div>
                    <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-blue-300 rounded-full opacity-50 animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Data Fasilitas Kesehatan</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Kelola dan pantau seluruh fasilitas kesehatan di Indonesia dengan sistem yang terintegrasi</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($stats['rumah_sakit']) }}</h3>
                    <p class="text-gray-600 font-medium">Rumah Sakit</p>
                </div>

                <!-- Stat 2 -->
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-green-600 mb-2">{{ number_format($stats['puskesmas']) }}</h3>
                    <p class="text-gray-600 font-medium">Puskesmas</p>
                </div>

                <!-- Stat 3 -->
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-purple-600 mb-2">{{ number_format($stats['klinik']) }}</h3>
                    <p class="text-gray-600 font-medium">Klinik</p>
                </div>

                <!-- Stat 4 -->
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-orange-600 mb-2">{{ number_format($stats['total_provinsi']) }}</h3>
                    <p class="text-gray-600 font-medium">Provinsi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="layanan" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Solusi lengkap untuk mengelola data fasilitas kesehatan dengan teknologi terdepan</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Data Real-time</h3>
                    <p class="text-gray-600 leading-relaxed">Monitoring data fasilitas kesehatan secara real-time dengan update otomatis dan sinkronisasi antar sistem.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Keamanan Tinggi</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem keamanan berlapis dengan enkripsi data dan kontrol akses yang ketat untuk melindungi informasi sensitif.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analytics & Reports</h3>
                    <p class="text-gray-600 leading-relaxed">Dashboard analitik lengkap dengan laporan otomatis dan visualisasi data untuk pengambilan keputusan yang tepat.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Multi-user Access</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem multi-user dengan role management yang fleksibel untuk berbagai tingkat akses dan otoritas.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Export & Import</h3>
                    <p class="text-gray-600 leading-relaxed">Kemudahan export data ke berbagai format dan import data dari sistem legacy dengan mapping otomatis.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">24/7 Support</h3>
                    <p class="text-gray-600 leading-relaxed">Dukungan teknis 24/7 dengan tim expert yang siap membantu penyelesaian masalah dan optimasi sistem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">Siap Transformasi Digital?</h2>
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    Bergabunglah dengan banyak fasilitas kesehatan yang telah mempercayai sistem kami untuk mengelola data dengan lebih efisien dan akurat.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                        Coba Sekarang
                    </button>
                    <button class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold text-lg transition duration-300">
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Tentang SI Faskes
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Inovasi untuk Kesehatan Indonesia</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        SI Faskes hadir sebagai solusi komprehensif untuk digitalisasi pengelolaan fasilitas kesehatan di Indonesia. Dengan teknologi cloud computing dan keamanan tingkat enterprise, kami memastikan data fasilitas kesehatan Anda terlindungi dan mudah diakses.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Standar Nasional</h4>
                                <p class="text-gray-600">Mengikuti standar dan regulasi kesehatan Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Teknologi Terdepan</h4>
                                <p class="text-gray-600">Menggunakan teknologi cloud dan AI untuk optimasi</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Tim Berpengalaman</h4>
                                <p class="text-gray-600">Didukung tim expert dengan pengalaman 10+ tahun</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Visual -->
                <div class="relative">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl p-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg mb-2"></div>
                                <h5 class="font-semibold text-sm text-gray-800">Data Management</h5>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 bg-green-600 rounded-lg mb-2"></div>
                                <h5 class="font-semibold text-sm text-gray-800">Real-time Sync</h5>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 bg-purple-600 rounded-lg mb-2"></div>
                                <h5 class="font-semibold text-sm text-gray-800">Analytics</h5>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <div class="w-8 h-8 bg-orange-600 rounded-lg mb-2"></div>
                                <h5 class="font-semibold text-sm text-gray-800">Security</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-blue-400 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-blue-300 rounded-full opacity-30 animate-bounce"></div>
                </div>
            </div>
        </div>
    </section>
</div>
