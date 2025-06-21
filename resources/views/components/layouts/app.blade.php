<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SI Faskes' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex flex-col bg-gray-50"> <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 to-blue-700 shadow-xl sticky top-0 z-50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16"> <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('landing.home') }}">
                            <h1
                                class="text-2xl font-bold text-white flex items-center hover:scale-105 transition-transform duration-300 cursor-pointer">
                                <div class="w-8 h-8 mr-2 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                SI Faskes
                            </h1>
                        </a>
                    </div>
                </div><!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-1">
                        <a href="{{ route('landing.home') }}"
                            class="nav-link {{ request()->routeIs('landing.home') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} backdrop-blur-sm px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:bg-white/20 hover:scale-105 relative overflow-hidden group">
                            <span class="relative z-10">Beranda</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                            </div>
                        </a>
                        <a href="{{ route('landing.tentang') }}"
                            class="nav-link {{ request()->routeIs('landing.tentang') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} hover:text-white hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 relative overflow-hidden group">
                            <span class="relative z-10">Tentang</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                            </div>
                        </a>
                        <a href="{{ route('landing.layanan') }}"
                            class="nav-link {{ request()->routeIs('landing.layanan') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} hover:text-white hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 relative overflow-hidden group">
                            <span class="relative z-10">Layanan</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                            </div>
                        </a> <a href="{{ route('landing.kontak') }}"
                            class="nav-link {{ request()->routeIs('landing.kontak') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} hover:text-white hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 relative overflow-hidden group">
                            <span class="relative z-10">Kontak</span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                            </div>
                        </a>
                        @if (auth()->check())
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ request()->routeIs('dashboard') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} hover:text-white hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 relative overflow-hidden group">
                                <span class="relative z-10">Dashboard</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="nav-link {{ request()->routeIs('login') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100' }} hover:text-white hover:bg-white/20 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105 relative overflow-hidden group">
                                <span class="relative z-10">Login</span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/0 to-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                                </div>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" onclick="toggleMobileMenu()"
                        class="text-blue-100 hover:text-white hover:bg-white/20 p-2 rounded-lg transition-all duration-300 hover:scale-110 active:scale-95">
                        <svg class="w-6 h-6 transition-transform duration-300" id="menu-icon" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div
                    class="px-2 pt-2 pb-3 space-y-2 bg-blue-700/95 backdrop-blur-sm rounded-xl mt-2 border border-white/20 shadow-2xl">
                    <a href="{{ route('landing.home') }}"
                        class="mobile-nav-link {{ request()->routeIs('landing.home') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100 hover:text-white' }} block px-4 py-3 rounded-lg text-base font-medium transition-all duration-300 hover:bg-white/20 hover:translate-x-2">
                        <div class="flex items-center">
                            <span
                                class="w-2 h-2 {{ request()->routeIs('landing.home') ? 'bg-white' : 'bg-blue-300 opacity-50' }} rounded-full mr-3"></span>
                            Beranda
                        </div>
                    </a>
                    <a href="{{ route('landing.tentang') }}"
                        class="mobile-nav-link {{ request()->routeIs('landing.tentang') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100 hover:text-white' }} block px-4 py-3 rounded-lg text-base font-medium transition-all duration-300 hover:bg-white/20 hover:translate-x-2">
                        <div class="flex items-center">
                            <span
                                class="w-2 h-2 {{ request()->routeIs('landing.tentang') ? 'bg-white' : 'bg-blue-300 opacity-50' }} rounded-full mr-3"></span>
                            Tentang
                        </div>
                    </a> <a href="{{ route('landing.layanan') }}"
                        class="mobile-nav-link {{ request()->routeIs('landing.layanan') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100 hover:text-white' }} block px-4 py-3 rounded-lg text-base font-medium transition-all duration-300 hover:bg-white/20 hover:translate-x-2">
                        <div class="flex items-center">
                            <span
                                class="w-2 h-2 {{ request()->routeIs('landing.layanan') ? 'bg-white' : 'bg-blue-300 opacity-50' }} rounded-full mr-3"></span>
                            Layanan
                        </div>
                    </a> <a href="{{ route('landing.kontak') }}"
                        class="mobile-nav-link {{ request()->routeIs('landing.kontak') ? 'active text-white bg-blue-500/50 border border-white/20' : 'text-blue-100 hover:text-white' }} block px-4 py-3 rounded-lg text-base font-medium transition-all duration-300 hover:bg-white/20 hover:translate-x-2">
                        <div class="flex items-center">
                            <span
                                class="w-2 h-2 {{ request()->routeIs('landing.kontak') ? 'bg-white' : 'bg-blue-300 opacity-50' }} rounded-full mr-3"></span>
                            Kontak
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand Section -->
                <div class="lg:col-span-2">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-2 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-2xl font-bold">SI Faskes</h3>
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">Sistem Informasi Fasilitas Kesehatan untuk pelayanan
                        kesehatan yang lebih baik dan terpercaya di seluruh Indonesia.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.120.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.758-1.378l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.001z.017 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Menu Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-blue-400">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing.home') }}"
                                class="text-gray-300 hover:text-white transition duration-300 flex items-center"><span
                                    class="mr-2">→</span>Beranda</a></li>
                        <li><a href="{{ route('landing.tentang') }}"
                                class="text-gray-300 hover:text-white transition duration-300 flex items-center"><span
                                    class="mr-2">→</span>Tentang Kami</a></li>
                        <li><a href="{{ route('landing.layanan') }}"
                                class="text-gray-300 hover:text-white transition duration-300 flex items-center"><span
                                    class="mr-2">→</span>Layanan</a></li>
                        <li><a href="#layanan"
                                class="text-gray-300 hover:text-white transition duration-300 flex items-center"><span
                                    class="mr-2">→</span>Layanan</a></li>
                        <li><a href="#kontak"
                                class="text-gray-300 hover:text-white transition duration-300 flex items-center"><span
                                    class="mr-2">→</span>Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-blue-400">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            info@sifaskes.id
                        </div>
                        <div class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 mr-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            (021) 12345678
                        </div>
                        <div class="flex items-start text-gray-300">
                            <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Kec. Pamijahan <br> Kabupaten Bogor <br> Jawa Barat 16810</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 mt-12 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} SI Faskes. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#"
                            class="text-gray-400 hover:text-white text-sm transition duration-300">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Terms
                            of Service</a>
                        <a href="#"
                            class="text-gray-400 hover:text-white text-sm transition duration-300">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');

            menu.classList.toggle('hidden');

            // Animate hamburger icon
            if (menu.classList.contains('hidden')) {
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
            } else {
                icon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            }
        }
    </script>
</body>

</html>
