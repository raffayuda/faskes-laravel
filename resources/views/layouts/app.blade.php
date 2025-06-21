<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: false }" x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Faskes Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 shadow-2xl transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
             x-bind:class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 bg-gradient-to-r from-blue-600 to-blue-700 border-b border-blue-500">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-hospital-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Faskes</h1>
                        <p class="text-xs text-blue-200">Dashboard</p>
                    </div>
                </div>
            </div>            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <div class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white shadow-lg border-l-4 border-yellow-400' : 'text-blue-100 hover:text-white' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('dashboard') ? 'bg-yellow-400 text-blue-900' : 'bg-white/10 text-blue-200 group-hover:bg-white/20' }}">
                            <i class="fas fa-home"></i>
                        </div>
                        Dashboard
                        @if(request()->routeIs('dashboard'))
                            <div class="ml-auto w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <!-- Data Faskes -->
                    <a href="{{ route('faskes.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('faskes.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-green-400' : 'text-blue-100 hover:text-white' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('faskes.*') ? 'bg-green-400 text-blue-900' : 'bg-white/10 text-blue-200 group-hover:bg-white/20' }}">
                            <i class="fas fa-hospital"></i>
                        </div>
                        Data Faskes
                        @if(request()->routeIs('faskes.*'))
                            <div class="ml-auto w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    @if(auth()->check() && auth()->user()->role == 'user')
                    <!-- Faskes Favorit -->
                    <a href="{{ route('favorites.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('favorites.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-red-400' : 'text-blue-100 hover:text-white' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('favorites.*') ? 'bg-red-400 text-blue-900' : 'bg-white/10 text-blue-200 group-hover:bg-white/20' }}">
                            <i class="fas fa-heart"></i>
                        </div>
                        Faskes Favorit
                        @if(request()->routeIs('favorites.*'))
                            <div class="ml-auto w-2 h-2 bg-red-400 rounded-full animate-pulse"></div>
                        @endif
                    </a>

                    <!-- Profile -->
                    <a href="{{ route('profile.edit') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('profile.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-purple-400' : 'text-blue-100 hover:text-white' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('profile.*') ? 'bg-purple-400 text-blue-900' : 'bg-white/10 text-blue-200 group-hover:bg-white/20' }}">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        Ubah Profile
                        @if(request()->routeIs('profile.*'))
                            <div class="ml-auto w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                        @endif
                    </a>
                    @endif                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <!-- Admin Section -->
                    <div class="pt-6 mt-6">
                        <div class="px-4 mb-4">
                            <div class="flex items-center space-x-2">
                                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent"></div>
                                <span class="px-3 text-xs font-semibold text-blue-300 uppercase tracking-wider bg-blue-800/50 rounded-full py-1">
                                    Master Data
                                </span>
                                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-1">
                            <a href="{{ route('provinsi.index') }}" 
                               class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('provinsi.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-orange-400' : 'text-blue-200 hover:text-white' }}">
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('provinsi.*') ? 'bg-orange-400 text-blue-900' : 'bg-white/10 text-blue-300 group-hover:bg-white/20' }}">
                                    <i class="fas fa-map text-xs"></i>
                                </div>
                                Provinsi
                            </a>
                            
                            <a href="{{ route('kabkota.index') }}" 
                               class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('kabkota.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-teal-400' : 'text-blue-200 hover:text-white' }}">
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('kabkota.*') ? 'bg-teal-400 text-blue-900' : 'bg-white/10 text-blue-300 group-hover:bg-white/20' }}">
                                    <i class="fas fa-city text-xs"></i>
                                </div>
                                Kabupaten/Kota
                            </a>
                            
                            <a href="{{ route('jenis-faskes.index') }}" 
                               class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('jenis-faskes.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-indigo-400' : 'text-blue-200 hover:text-white' }}">
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('jenis-faskes.*') ? 'bg-indigo-400 text-blue-900' : 'bg-white/10 text-blue-300 group-hover:bg-white/20' }}">
                                    <i class="fas fa-hospital-symbol text-xs"></i>
                                </div>
                                Jenis Faskes
                            </a>
                            
                            <a href="{{ route('kategori.index') }}" 
                               class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('kategori.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-pink-400' : 'text-blue-200 hover:text-white' }}">
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('kategori.*') ? 'bg-pink-400 text-blue-900' : 'bg-white/10 text-blue-300 group-hover:bg-white/20' }}">
                                    <i class="fas fa-tags text-xs"></i>
                                </div>
                                Kategori
                            </a>
                        </div>
                    </div>
                    
                    <!-- Admin Only Section -->
                    <div class="pt-6 mt-6">
                        <div class="px-4 mb-4">
                            <div class="flex items-center space-x-2">
                                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-red-400 to-transparent"></div>
                                <span class="px-3 text-xs font-semibold text-red-300 uppercase tracking-wider bg-red-800/50 rounded-full py-1">
                                    Admin Only
                                </span>
                                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-red-400 to-transparent"></div>
                            </div>
                        </div>
                        
                        <a href="{{ route('users.index') }}" 
                           class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-xl transition-all duration-300 hover:bg-white/10 hover:shadow-lg transform hover:scale-105 {{ request()->routeIs('users.*') ? 'bg-white/20 text-white shadow-lg border-l-4 border-red-400' : 'text-blue-200 hover:text-white' }}">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center mr-3 {{ request()->routeIs('users.*') ? 'bg-red-400 text-blue-900' : 'bg-white/10 text-blue-300 group-hover:bg-white/20' }}">
                                <i class="fas fa-users text-xs"></i>
                            </div>
                            Manajemen User
                        </a>
                    </div>
                    @endif
                </div>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
             @click="sidebarOpen = false"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">            <!-- Top Navigation -->
            <header class="bg-white/95 backdrop-blur-sm shadow-lg border-b border-gray-200/50 sticky top-0 z-40">
                <div class="flex items-center justify-between h-16 px-6">
                    <div class="flex items-center space-x-4">
                        <button @click="sidebarOpen = !sidebarOpen" 
                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-200 lg:hidden">
                            <i class="fas fa-bars w-5 h-5"></i>
                        </button>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                                <i class="fas fa-hospital text-white text-sm"></i>
                            </div>
                            <div>                                <h2 class="text-lg font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                                    @yield('page-title', 'Dashboard')
                                </h2>
                                <p class="text-xs text-gray-500">Sistem Informasi Faskes</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        

                        <!-- Quick Actions -->
                        <div class="hidden md:flex items-center space-x-2">
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('faskes.create') }}" 
                                   class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                    <i class="fas fa-plus w-4 h-4 mr-2"></i>
                                    Tambah Faskes
                                </a>
                            @endif
                        </div>

                        <!-- User Menu -->
                        <div x-data="{ userMenuOpen: false }" class="relative">
                            <button @click="userMenuOpen = !userMenuOpen" 
                                    class="flex items-center space-x-3 p-2 text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-200 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow duration-200">
                                    <span class="text-sm font-bold text-white">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</p>
                                </div>
                                <i class="fas fa-chevron-down w-4 h-4 text-gray-400 transition-transform duration-200" 
                                   x-bind:class="{ 'rotate-180': userMenuOpen }"></i>
                            </button>                            <div x-show="userMenuOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 @click.away="userMenuOpen = false"
                                 class="absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl py-2 z-50 border border-gray-100">
                                
                                <!-- User Info -->
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <a href="/users/{{ auth()->user()->id }}" class="flex items-center space-x-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                                <span class="text-lg font-bold text-white">
                                                    {{ substr(auth()->user()->name, 0, 1) }}
                                                </span>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                                <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full mt-1">
                                                    <i class="fas fa-user-tag mr-1"></i>
                                                    {{ ucfirst(auth()->user()->role) }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- Quick Stats for Users -->
                                @if(auth()->user()->role === 'user')
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <div class="grid grid-cols-2 gap-2 text-center">
                                        <div class="bg-red-50 rounded-lg p-2">
                                            <p class="text-lg font-bold text-red-600">{{ auth()->user()->favoritesFaskes()->count() }}</p>
                                            <p class="text-xs text-red-500">Favorit</p>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-2">
                                            <p class="text-lg font-bold text-blue-600">{{ auth()->user()->faskesRatings()->count() }}</p>
                                            <p class="text-xs text-blue-500">Rating</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <!-- Menu Items -->
                                <div class="py-2">
                                    @if(auth()->user()->role === 'user')
                                    <a href="{{ route('profile.edit') }}" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                        <i class="fas fa-user-edit w-4 h-4 mr-3 text-purple-500"></i>
                                        Edit Profile
                                    </a>
                                    <a href="{{ route('favorites.index') }}" 
                                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                        <i class="fas fa-heart w-4 h-4 mr-3 text-red-500"></i>
                                        Faskes Favorit
                                    </a>
                                    @endif
                                    
                                    <hr class="my-2 border-gray-100">
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" 
                                                class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                            <i class="fas fa-sign-out-alt w-4 h-4 mr-3"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4">
                @if(session('success'))
                    <div x-data="{ show: true }" 
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         class="mb-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                            <button @click="show = false" class="text-green-500 hover:text-green-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div x-data="{ show: true }" 
                         x-show="show"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         class="mb-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg">
                        <div class="flex items-center justify-between">
                            <span><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</span>
                            <button @click="show = false" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
