<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Informasi Faskes</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .hero-pattern {
            background-color: #1e3a8a;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('landing.home') }}" class="flex items-center">
                        <i class="fas fa-hospital-alt text-2xl text-blue-600 mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">SI Faskes</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing.home') }}" 
                       class="text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors duration-200 {{ request()->routeIs('landing.home') ? 'text-blue-600 font-semibold' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('landing.about') }}" 
                       class="text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors duration-200 {{ request()->routeIs('landing.about') ? 'text-blue-600 font-semibold' : '' }}">
                        Tentang
                    </a>
                    <a href="{{ route('landing.services') }}" 
                       class="text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors duration-200 {{ request()->routeIs('landing.services') ? 'text-blue-600 font-semibold' : '' }}">
                        Layanan
                    </a>
                    <a href="{{ route('landing.search') }}" 
                       class="text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors duration-200 {{ request()->routeIs('landing.search') ? 'text-blue-600 font-semibold' : '' }}">
                        Cari Faskes
                    </a>
                    <a href="{{ route('landing.contact') }}" 
                       class="text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors duration-200 {{ request()->routeIs('landing.contact') ? 'text-blue-600 font-semibold' : '' }}">
                        Kontak
                    </a>
                    
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" 
                           class="border border-blue-600 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                            Daftar
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('landing.home') }}" 
                   class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('landing.home') ? 'text-blue-600 font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('landing.about') }}" 
                   class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('landing.about') ? 'text-blue-600 font-semibold' : '' }}">
                    Tentang
                </a>
                <a href="{{ route('landing.services') }}" 
                   class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('landing.services') ? 'text-blue-600 font-semibold' : '' }}">
                    Layanan
                </a>
                <a href="{{ route('landing.search') }}" 
                   class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('landing.search') ? 'text-blue-600 font-semibold' : '' }}">
                    Cari Faskes
                </a>
                <a href="{{ route('landing.contact') }}" 
                   class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('landing.contact') ? 'text-blue-600 font-semibold' : '' }}">
                    Kontak
                </a>
                <div class="border-t pt-3 space-y-2">
                    <a href="{{ route('login') }}" 
                       class="block px-3 py-2 bg-blue-600 text-white rounded-lg text-center">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block px-3 py-2 border border-blue-600 text-blue-600 rounded-lg text-center">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-hospital-alt text-2xl text-blue-400 mr-2"></i>
                        <span class="text-xl font-bold">SI Faskes</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Sistem Informasi Fasilitas Kesehatan Indonesia. Temukan dan kelola informasi fasilitas kesehatan dengan mudah dan efisien.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing.home') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">Beranda</a></li>
                        <li><a href="{{ route('landing.about') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">Tentang</a></li>
                        <li><a href="{{ route('landing.services') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">Layanan</a></li>
                        <li><a href="{{ route('landing.search') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">Cari Faskes</a></li>
                        <li><a href="{{ route('landing.contact') }}" class="text-gray-300 hover:text-blue-400 transition-colors duration-200">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            info@sifaskes.id
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            +62 21 1234 5678
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; {{ date('Y') }} Sistem Informasi Faskes. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
