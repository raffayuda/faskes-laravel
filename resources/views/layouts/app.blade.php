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
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
             x-bind:class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 bg-primary-600">
                <h1 class="text-xl font-bold text-white">
                    <i class="fas fa-hospital-alt mr-2"></i>
                    Faskes Dashboard
                </h1>
            </div>

            <!-- Navigation -->
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                        <i class="fas fa-chart-dashboard w-5 h-5 mr-3"></i>
                        Dashboard
                    </a>                    <a href="{{ route('faskes.index') }}" 
                       class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('faskes.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                        <i class="fas fa-hospital w-5 h-5 mr-3"></i>
                        Data Faskes
                    </a>
                    @if(auth()->check() && auth()->user()->role == 'user')
                    <a href="{{ route('favorites.index') }}" 
                       class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('favorites.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                        <i class="fas fa-heart w-5 h-5 mr-3"></i>
                        Faskes Favorit
                    </a>
                    @endif
                    @if(auth()->check() && auth()->user()->role == 'user')
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('profile.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                        <i class="fas fa-user-edit w-5 h-5 mr-3"></i>
                        Ubah Profile
                    </a>
                    @endif        
                    @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="px-4 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                            Master Data
                        </p>
                        <a href="{{ route('provinsi.index') }}" 
                           class="flex items-center px-4 py-2 mt-2 text-gray-700 dark:text-blue-500 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('provinsi.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                            <i class="fas fa-map w-5 h-5 mr-3"></i>
                            Provinsi
                        </a>
                        <a href="{{ route('kabkota.index') }}" 
                           class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('kabkota.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                            <i class="fas fa-city w-5 h-5 mr-3"></i>
                            Kabupaten/Kota
                        </a>
                        <a href="{{ route('jenis-faskes.index') }}" 
                           class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('jenis-faskes.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                            <i class="fas fa-hospital-symbol w-5 h-5 mr-3"></i>
                            Jenis Faskes
                        </a>
                        <a href="{{ route('kategori.index') }}" 
                           class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('kategori.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                            <i class="fas fa-tags w-5 h-5 mr-3"></i>
                            Kategori
                        </a>
                    </div>
                    
                    <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-600">
                        <p class="px-4 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                            Admin Only
                        </p>                        <a href="{{ route('users.index') }}" 
                           class="flex items-center px-4 py-2 mt-2 text-gray-700 dark:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('users.*') ? 'bg-primary-50 dark:bg-primary-900 text-primary-700 dark:text-primary-300' : '' }}">
                            <i class="fas fa-users w-5 h-5 mr-3"></i>
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
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between h-16 px-4">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" 
                                class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 lg:hidden">
                            <i class="fas fa-bars w-6 h-6"></i>
                        </button>
                        <h2 class="ml-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
                            @yield('page-title', 'Dashboard')
                        </h2>
                    </div>

                    <div class="flex items-center space-x-4">
                        

                        <!-- User Menu -->
                        <div x-data="{ userMenuOpen: false }" class="relative">
                            <button @click="userMenuOpen = !userMenuOpen" 
                                    class="flex items-center space-x-2 text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white">
                                <div class="w-8 h-8 bg-primary-500 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-white">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down w-4 h-4"></i>
                            </button>

                            <div x-show="userMenuOpen" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 @click.away="userMenuOpen = false"
                                 class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-200 dark:border-gray-700">
                                
                                <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
                                    Role: <span class="font-medium text-primary-600">{{ ucfirst(auth()->user()->role) }}</span>
                                </div>
                                
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <i class="fas fa-sign-out-alt w-4 h-4 mr-2"></i>
                                        Logout
                                    </button>
                                </form>
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
