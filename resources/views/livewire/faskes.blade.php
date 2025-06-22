<div>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-20">
        <!-- Background Decorations -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white/5 rounded-full -translate-x-48 -translate-y-48"></div>
            <div class="absolute top-20 right-0 w-72 h-72 bg-white/10 rounded-full translate-x-36 -translate-y-36"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-blue-400/20 rounded-full translate-y-40"></div>
        </div>
        
        <!-- Medical Icons Background -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-16 left-8 animate-float">
                <i class="fas fa-heartbeat text-6xl"></i>
            </div>
            <div class="absolute top-32 right-16 animate-float-delayed">
                <i class="fas fa-stethoscope text-5xl"></i>
            </div>
            <div class="absolute bottom-20 left-20 animate-float">
                <i class="fas fa-plus-circle text-4xl"></i>
            </div>
            <div class="absolute bottom-32 right-8 animate-float-delayed">
                <i class="fas fa-hospital text-5xl"></i>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium mb-6 animate-fade-in-up">
                    <i class="fas fa-shield-alt mr-2 text-green-300"></i>
                    Platform Terpercaya untuk Fasilitas Kesehatan
                </div>

                <!-- Main Title -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 animate-fade-in-up delay-100">
                    <span class="bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                        Temukan
                    </span>
                    <br>
                    <span class="text-white">Fasilitas Kesehatan</span>
                    <br>
                    <span class="text-yellow-300">Terbaik</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-4xl mx-auto leading-relaxed animate-fade-in-up delay-200">
                    Jelajahi ribuan fasilitas kesehatan terpercaya di seluruh Indonesia. 
                    <br class="hidden md:block">
                    Temukan yang terdekat dengan Anda dalam hitungan detik.
                </p>
                
                <!-- Search Bar -->
                <div class="max-w-3xl mx-auto animate-fade-in-up delay-300">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-pink-400 rounded-3xl blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                        <div class="relative bg-white rounded-2xl p-2 shadow-2xl">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 pl-4">
                                    <i class="fas fa-search text-gray-400 text-xl"></i>
                                </div>
                                <input type="text" 
                                       wire:model.live.debounce.300ms="search"
                                       placeholder="Cari nama faskes, alamat, atau pengelola..."
                                       class="flex-1 px-6 py-4 text-gray-800 text-lg placeholder:text-gray-400 bg-transparent border-0 focus:outline-none focus:ring-0 rounded-l-2xl">
                                <button class="flex-shrink-0 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                    <i class="fas fa-search mr-2"></i>
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Filters Section -->
    <section class="bg-white shadow-sm py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-center gap-4">
                <!-- Jenis Faskes Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Jenis:</label>
                    <select wire:model.live="selectedJenis" 
                            class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Jenis</option>
                        @foreach($jenisFaskes as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Provinsi Filter -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Provinsi:</label>
                    <select wire:model.live="selectedProvinsi" 
                            class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Provinsi</option>
                        @foreach($provinsi as $prov)
                            <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Reset Filter -->
                @if($search || $selectedJenis || $selectedProvinsi)
                    <button wire:click="$set('search', ''); $set('selectedJenis', ''); $set('selectedProvinsi', '')" 
                            class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-times mr-1"></i>
                        Reset Filter
                    </button>
                @endif
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Results Info -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Daftar Fasilitas Kesehatan
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Ditemukan {{ $faskes->total() }} faskes
                        @if($search)
                            untuk pencarian "{{ $search }}"
                        @endif
                    </p>
                </div>
                
                <!-- Per Page Selector -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm text-gray-600">Tampilkan:</label>
                    <select wire:model.live="perPage" 
                            class="px-3 py-1 border border-gray-300 rounded text-sm">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="48">48</option>
                    </select>
                </div>
            </div>

            @if($faskes->count() > 0)
                <!-- Faskes Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($faskes as $item)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                            <!-- Image -->
                            <div class="h-48 bg-gray-200 relative">
                                @if($item->foto)
                                    <img src="{{ asset('uploads/faskes/' . $item->foto) }}" 
                                         alt="Foto {{ $item->nama }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-hospital text-gray-400 text-4xl"></i>
                                    </div>
                                @endif
                                
                                <!-- Badge Jenis -->
                                @if($item->jenisFaskes)
                                    <div class="absolute top-3 left-3">
                                        <span class="px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded-full shadow-sm">
                                            {{ $item->jenisFaskes->nama }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Rating -->
                                @if($item->getAverageRating() > 0)
                                    <div class="absolute top-3 right-3 bg-white/95 px-2 py-1 rounded-full shadow-sm">
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-star text-yellow-400 text-xs"></i>
                                            <span class="text-xs font-medium text-gray-800">{{ number_format($item->getAverageRating(), 1) }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Favorite Button -->
                                @auth
                                    <button 
                                        wire:click="toggleFavorite({{ $item->id }})"
                                        class="favorite-btn absolute bottom-3 right-3 p-2.5 rounded-full bg-white/95 hover:bg-white shadow-lg transition-all duration-200 transform hover:scale-110 {{ $this->isFavorite($item->id) ? 'favorited text-red-500' : 'text-gray-400 hover:text-red-400' }}"
                                        title="{{ $this->isFavorite($item->id) ? 'Hapus dari favorit' : 'Tambah ke favorit' }}"
                                    >
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="absolute bottom-3 right-3 p-2.5 rounded-full bg-white/95 shadow-lg text-gray-300 hover:text-gray-400 transition-all duration-200 transform hover:scale-105"
                                       title="Login untuk menambah favorit">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                @endauth
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2">
                                    {{ $item->nama }}
                                </h3>
                                
                                @if($item->nama_pengelola)
                                    <p class="text-sm text-gray-600 mb-2">
                                        <i class="fas fa-user-tie w-4 h-4 mr-1"></i>
                                        {{ $item->nama_pengelola }}
                                    </p>
                                @endif

                                <!-- Location -->
                                @if($item->kabkota)
                                    <p class="text-sm text-gray-600 mb-3">
                                        <i class="fas fa-map-marker-alt w-4 h-4 mr-1"></i>
                                        {{ $item->kabkota->nama }}
                                        @if($item->kabkota->provinsi)
                                            , {{ $item->kabkota->provinsi->nama }}
                                        @endif
                                    </p>
                                @endif

                                <!-- Address -->
                                @if($item->alamat)
                                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                                        {{ $item->alamat }}
                                    </p>
                                @endif

                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @if($item->kategori)
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">
                                            {{ $item->kategori->nama }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Button -->
                                <div class="flex items-center justify-between">
                                    <button wire:click="showDetail({{ $item->id }})" 
                                            wire:loading.attr="disabled"
                                            wire:target="showDetail({{ $item->id }})"
                                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span wire:loading.remove wire:target="showDetail({{ $item->id }})">
                                            <i class="fas fa-eye mr-2"></i>
                                            Lihat Detail
                                        </span>
                                        <span wire:loading wire:target="showDetail({{ $item->id }})">
                                            <i class="fas fa-spinner fa-spin mr-2"></i>
                                            Loading...
                                        </span>
                                    </button>
                                    
                                    <!-- Contact Info -->
                                    <div class="flex space-x-2">
                                        @if($item->website)
                                            <a href="{{ $item->website }}" 
                                               target="_blank" 
                                               class="text-gray-400 hover:text-blue-600"
                                               title="Website">
                                                <i class="fas fa-globe"></i>
                                            </a>
                                        @endif
                                        @if($item->email)
                                            <a href="mailto:{{ $item->email }}" 
                                               class="text-gray-400 hover:text-blue-600"
                                               title="Email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $faskes->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-search text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tidak ada faskes ditemukan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Coba ubah kata kunci pencarian atau filter yang digunakan
                    </p>
                    @if($search || $selectedJenis || $selectedProvinsi)
                        <button wire:click="$set('search', ''); $set('selectedJenis', ''); $set('selectedProvinsi', '')" 
                                class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-refresh mr-2"></i>
                            Reset Pencarian
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">
                Tidak menemukan faskes yang Anda cari?
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Daftar sekarang untuk mengakses fitur pencarian lanjutan dan menyimpan faskes favorit Anda
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if (auth()->check())
                    <a href="{{ route('landing.favorit') }}" 
                       class="inline-flex items-center px-8 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-heart mr-2"></i>
                        Lihat Favorit Saya
                    </a>
                    <a href="{{ route('landing.layanan') }}" 
                       class="inline-flex items-center px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors">
                        <i class="fas fa-concierge-bell mr-2"></i>
                        Layanan Kami
                    </a>
                @else
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Gratis
                    </a>
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-blue-600 transition-colors">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk
                    </a>
                @endif
        </div>
    </section>

    <!-- Modal Detail Faskes -->
    @if($showModal && $selectedFaskes)
        <div class="fixed inset-0 z-50 overflow-y-auto" 
             aria-labelledby="modal-title" 
             role="dialog" 
             aria-modal="true"
             x-data="{ open: @entangle('showModal') }"
             x-show="open"
             @keydown.escape.window="$wire.closeModal()">
            
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-transparent bg-opacity-50 backdrop-blur-sm transition-all duration-300 ease-in-out" 
                     wire:click="closeModal"></div>

                <!-- Modal panel -->
                <div class="relative inline-block align-middle bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all duration-300 ease-in-out sm:my-8 sm:max-w-5xl sm:w-full mx-2 animate-in fade-in zoom-in-95"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 sm:px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-white">
                                Detail Fasilitas Kesehatan
                            </h3>
                            <button wire:click="closeModal" 
                                    class="text-white hover:text-gray-200 p-1 rounded-full hover:bg-white/10 transition-colors">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="bg-white px-4 sm:px-6 py-6 max-h-[70vh] overflow-y-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Photo Section -->
                            <div class="lg:col-span-1">
                                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden">
                                    @if($selectedFaskes->foto)
                                        <img src="{{ asset('uploads/faskes/' . $selectedFaskes->foto) }}" 
                                             alt="Foto {{ $selectedFaskes->nama }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-hospital text-gray-400 text-4xl sm:text-6xl"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Rating Section -->
                                @if($selectedFaskes->getAverageRating() > 0)
                                    <div class="mt-4 text-center">
                                        <div class="flex items-center justify-center space-x-1 mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $selectedFaskes->getAverageRating() ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            {{ number_format($selectedFaskes->getAverageRating(), 1) }} dari 5 
                                            ({{ $selectedFaskes->ratings->count() }} rating)
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <!-- Details Section -->
                            <div class="lg:col-span-2">
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">{{ $selectedFaskes->nama }}</h2>

                                <div class="space-y-4">
                                    <!-- Basic Info -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        @if($selectedFaskes->jenisFaskes)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Faskes</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->jenisFaskes->nama }}</p>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->kategori)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->kategori->nama }}</p>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->nama_pengelola)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Pengelola</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->nama_pengelola }}</p>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->kode_faskes)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Faskes</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->kode_faskes }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Location -->
                                    @if($selectedFaskes->alamat || $selectedFaskes->kabkota)
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                            <div class="space-y-1">
                                                @if($selectedFaskes->alamat)
                                                    <p class="text-gray-900">{{ $selectedFaskes->alamat }}</p>
                                                @endif
                                                @if($selectedFaskes->kabkota)
                                                    <p class="text-gray-600">
                                                        {{ $selectedFaskes->kabkota->nama }}
                                                        @if($selectedFaskes->kabkota->provinsi)
                                                            , {{ $selectedFaskes->kabkota->provinsi->nama }}
                                                        @endif
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Contact Info -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        @if($selectedFaskes->telepon)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->telepon }}</p>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->email)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                                <a href="mailto:{{ $selectedFaskes->email }}" class="text-blue-600 hover:underline">
                                                    {{ $selectedFaskes->email }}
                                                </a>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->website)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                                <a href="{{ $selectedFaskes->website }}" target="_blank" class="text-blue-600 hover:underline">
                                                    {{ $selectedFaskes->website }}
                                                </a>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->jam_operasional)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Jam Operasional</label>
                                                <p class="text-gray-900">{{ $selectedFaskes->jam_operasional }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Services -->
                                    @if($selectedFaskes->layanan)
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Layanan</label>
                                            <p class="text-gray-900">{{ $selectedFaskes->layanan }}</p>
                                        </div>
                                    @endif

                                    <!-- Description -->
                                    @if($selectedFaskes->deskripsi)
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                            <p class="text-gray-900">{{ $selectedFaskes->deskripsi }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="bg-gray-50 px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:justify-between items-center space-y-2 sm:space-y-0">
                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                            @if($selectedFaskes->website)
                                <a href="{{ $selectedFaskes->website }}" target="_blank"
                                   class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors w-full sm:w-auto">
                                    <i class="fas fa-globe mr-2"></i>
                                    Kunjungi Website
                                </a>
                            @endif
                            @if($selectedFaskes->telepon)
                                <a href="tel:{{ $selectedFaskes->telepon }}"
                                   class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors w-full sm:w-auto">
                                    <i class="fas fa-phone mr-2"></i>
                                    Hubungi
                                </a>
                            @endif
                        </div>
                        <button wire:click="closeModal" 
                                class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors w-full sm:w-auto mt-2 sm:mt-0">
                            <i class="fas fa-times mr-2"></i>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('livewire:init', () => {
    // Add heart beat animation when favoriting
    Livewire.on('favoriteToggled', (event) => {
        const data = Array.isArray(event) ? event[0] : event;
        const button = document.querySelector(`[wire\\:click="toggleFavorite(${data.faskesId})"]`);
        if (button) {
            button.classList.add('heart-beat');
            
            // Update button state
            if (data.action === 'added') {
                button.classList.add('favorited', 'text-red-500');
                button.classList.remove('text-gray-400');
            } else {
                button.classList.remove('favorited', 'text-red-500');
                button.classList.add('text-gray-400');
            }
            
            setTimeout(() => {
                button.classList.remove('heart-beat');
            }, 300);
        }
        
        // Show toast notification
        const message = data.action === 'added' ? 'Ditambahkan ke favorit!' : 'Dihapus dari favorit!';
        showToast(message, data.action === 'added' ? 'success' : 'info');
    });
    
    // Close modal on outside click enhancement
    document.addEventListener('click', (e) => {
        if (e.target.matches('[wire\\:click="closeModal"]')) {
            e.target.style.opacity = '0.8';
            setTimeout(() => {
                e.target.style.opacity = '1';
            }, 150);
        }
    });
});

// Toast notification function
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-x-full ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 
        'bg-blue-500'
    }`;
    toast.innerHTML = `
        <div class="flex items-center space-x-2">
            <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 100);
    
    // Animate out and remove
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 300);
    }, 3000);
}

</script>
