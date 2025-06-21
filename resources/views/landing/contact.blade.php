@extends('layouts.landing')

@section('title', 'Hubungi Kami')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-purple-600 to-pink-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Hubungi Kami</h1>
            <p class="text-xl mb-8">Kami siap membantu Anda. Jangan ragu untuk menghubungi tim kami</p>
        </div>
    </div>
</div>

<!-- Contact Content -->
<div class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Information -->
            <div class="lg:col-span-1">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-100 rounded-lg p-3">
                            <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Alamat</h3>
                            <p class="text-gray-600">
                                Jl. Sudirman No. 123<br>
                                Jakarta Pusat 10270<br>
                                Indonesia
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <i class="fas fa-phone text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Telepon</h3>
                            <p class="text-gray-600">+62 21 1234 5678</p>
                            <p class="text-gray-600">+62 812 3456 7890</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 rounded-lg p-3">
                            <i class="fas fa-envelope text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600">info@faskes-indonesia.id</p>
                            <p class="text-gray-600">support@faskes-indonesia.id</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-orange-100 rounded-lg p-3">
                            <i class="fas fa-clock text-orange-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Jumat: 08:00 - 17:00</p>
                            <p class="text-gray-600">Sabtu: 08:00 - 12:00</p>
                            <p class="text-gray-600">Minggu: Libur</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-blue-400 text-white p-3 rounded-lg hover:bg-blue-500 transition-colors duration-200">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-pink-600 text-white p-3 rounded-lg hover:bg-pink-700 transition-colors duration-200">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-blue-800 text-white p-3 rounded-lg hover:bg-blue-900 transition-colors duration-200">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
                    
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Depan *
                                </label>
                                <input type="text" 
                                       id="first_name" 
                                       name="first_name" 
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Belakang *
                                </label>
                                <input type="text" 
                                       id="last_name" 
                                       name="last_name" 
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email *
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subjek *
                            </label>
                            <select id="subject" 
                                    name="subject" 
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="">Pilih Subjek</option>
                                <option value="general">Pertanyaan Umum</option>
                                <option value="technical">Masalah Teknis</option>
                                <option value="partnership">Kerjasama</option>
                                <option value="feedback">Saran & Kritik</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan *
                            </label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      required
                                      placeholder="Tuliskan pesan Anda di sini..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="privacy" 
                                   name="privacy" 
                                   required
                                   class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                            <label for="privacy" class="ml-2 text-sm text-gray-700">
                                Saya setuju dengan <a href="#" class="text-purple-600 hover:text-purple-800">kebijakan privasi</a> *
                            </label>
                        </div>

                        <div>
                            <button type="submit" 
                                    class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-colors duration-200">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-lg text-gray-600">Temukan jawaban untuk pertanyaan yang paling umum</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <div class="bg-white rounded-lg shadow-sm">
                <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg"
                        onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900">Bagaimana cara mendaftar akun?</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                    </div>
                </button>
                <div class="px-6 pb-4 hidden">
                    <p class="text-gray-600">
                        Anda dapat mendaftar dengan mengklik tombol "Daftar" di pojok kanan atas halaman, 
                        kemudian mengisi formulir pendaftaran dengan data yang valid.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm">
                <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg"
                        onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900">Apakah layanan ini gratis?</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                    </div>
                </button>
                <div class="px-6 pb-4 hidden">
                    <p class="text-gray-600">
                        Kami menyediakan paket gratis dengan fitur dasar. Untuk fitur lengkap, 
                        tersedia paket berbayar dengan harga yang terjangkau.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm">
                <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg"
                        onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900">Seberapa akurat data yang disediakan?</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                    </div>
                </button>
                <div class="px-6 pb-4 hidden">
                    <p class="text-gray-600">
                        Data kami diperbarui secara berkala dan bersumber dari instansi resmi. 
                        Kami berkomitmen untuk menjaga akurasi data hingga 99%.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm">
                <button class="w-full px-6 py-4 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg"
                        onclick="toggleFAQ(this)">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-900">Bagaimana jika saya menemukan data yang salah?</span>
                        <i class="fas fa-chevron-down text-gray-500 transform transition-transform duration-200"></i>
                    </div>
                </button>
                <div class="px-6 pb-4 hidden">
                    <p class="text-gray-600">
                        Anda dapat melaporkan data yang tidak akurat melalui form kontak ini atau 
                        email support@faskes-indonesia.id. Tim kami akan segera memverifikasi dan memperbaiki data.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>
@endsection
