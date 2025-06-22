<div>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white py-20 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-white rounded-full"></div>
            <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white rounded-full"></div>
            <div class="absolute bottom-32 right-1/3 w-20 h-20 bg-white rounded-full"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-lg border border-white/30 text-white rounded-full text-sm font-semibold mb-8 shadow-lg">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full mr-3 animate-pulse"></div>
                    <i class="fas fa-heart text-pink-300 mr-2"></i>
                    Koleksi Pribadi Anda
                </div>
                
                <!-- Main title with gradient text -->
                <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-yellow-300 via-pink-300 to-blue-300 bg-clip-text text-transparent">
                        Faskes Favorit
                    </span>
                    <br>
                    <span class="text-white">Saya</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-4xl mx-auto leading-relaxed">
                    Kelola koleksi fasilitas kesehatan favorit Anda dan berikan penilaian 
                    <span class="text-yellow-300 font-semibold">yang membantu pengguna lain</span>
                </p>
                
                <!-- Enhanced Search Bar -->
                <div class="max-w-3xl mx-auto">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-400 to-blue-400 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
                        <div class="relative bg-white/95 backdrop-blur-sm rounded-3xl p-2 shadow-2xl">
                            <div class="flex items-center">
                                <div class="flex-1 relative">
                                    <input type="text" 
                                           wire:model.live.debounce.300ms="search"
                                           placeholder="Cari faskes favorit berdasarkan nama, lokasi, atau jenis..."
                                           class="w-full px-8 py-5 text-gray-800 text-lg bg-transparent placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-300">
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-search text-gray-400 text-xl"></i>
                                    </div>
                                </div>
                                <button class="px-8 py-5 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl font-semibold hover:from-blue-700 hover:to-purple-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
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

    <!-- Stats Section -->
    <section class="bg-white py-8 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-center gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-red-600">{{ $favorites->total() }}</div>
                    <div class="text-sm text-gray-600">Total Favorit</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600">{{ auth()->user()->faskesRatings()->count() }}</div>
                    <div class="text-sm text-gray-600">Rating Diberikan</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">
                        {{ number_format(auth()->user()->faskesRatings()->avg('rating') ?? 0, 1) }}
                    </div>
                    <div class="text-sm text-gray-600">Rata-rata Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4">
            @if($favorites->count() > 0)
                <!-- Results Info -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            Daftar Favorit
                        </h2>
                        <p class="text-gray-600 mt-1">
                            {{ $favorites->total() }} faskes favorit
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

                <!-- Favorites Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($favorites as $faskes)
                        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                            <!-- Image -->
                            <div class="h-48 bg-gray-200 relative">
                                @if($faskes->foto)
                                    <img src="{{ asset('uploads/faskes/' . $faskes->foto) }}" 
                                         alt="Foto {{ $faskes->nama }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-hospital text-gray-400 text-4xl"></i>
                                    </div>
                                @endif
                                
                                <!-- Favorite Badge -->
                                <div class="absolute top-4 left-4">
                                    <div class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center">
                                        <i class="fas fa-heart mr-1"></i>
                                        Favorit
                                    </div>
                                </div>

                                <!-- Remove from Favorites -->
                                <form action="{{ route('favorites.destroy', $faskes) }}" method="POST" class="absolute top-4 right-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-white/90 hover:bg-white text-red-500 w-8 h-8 rounded-full flex items-center justify-center transition-colors"
                                            title="Hapus dari favorit"
                                            onclick="return confirm('Hapus dari favorit?')">
                                        <i class="fas fa-times text-sm"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg text-gray-900 mb-1 line-clamp-2">
                                            {{ $faskes->nama }}
                                        </h3>
                                        @if($faskes->jenisFaskes)
                                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                                {{ $faskes->jenisFaskes->nama }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                @if($faskes->nama_pengelola)
                                    <p class="text-sm text-gray-600 mb-2">
                                        <i class="fas fa-user-tie w-4 h-4 mr-1"></i>
                                        {{ $faskes->nama_pengelola }}
                                    </p>
                                @endif

                                <!-- Location -->
                                @if($faskes->kabkota)
                                    <p class="text-sm text-gray-600 mb-3">
                                        <i class="fas fa-map-marker-alt w-4 h-4 mr-1"></i>
                                        {{ $faskes->kabkota->nama }}
                                        @if($faskes->kabkota->provinsi)
                                            , {{ $faskes->kabkota->provinsi->nama }}
                                        @endif
                                    </p>
                                @endif

                                <!-- Average Rating Display -->
                                @if($faskes->getTotalRatings() > 0)
                                    <div class="flex items-center space-x-1 mb-4">
                                        @php $avgRating = round($faskes->getAverageRating(), 1); @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star text-sm {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                        @endfor
                                        <span class="text-sm text-gray-600 ml-2">
                                            {{ $avgRating }}/5 ({{ $faskes->getTotalRatings() }} rating)
                                        </span>
                                    </div>
                                @endif

                                <!-- User Rating Section -->
                                @php
                                    $userRating = auth()->user()->getRatingForFaskes($faskes->id);
                                @endphp
                                
                                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                    <h4 class="text-sm font-medium text-gray-700 mb-3">
                                        <i class="fas fa-star mr-1"></i>
                                        {{ $userRating ? 'Rating Anda' : 'Berikan Rating' }}
                                    </h4>
                                    
                                    <form action="{{ route('faskes.rating.store', $faskes) }}" method="POST" class="space-y-3">
                                        @csrf
                                        
                                        <!-- Star Rating -->
                                        <div class="flex items-center space-x-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <button type="button" 
                                                        class="rating-star text-2xl transition-colors duration-200 {{ $userRating && $i <= $userRating->rating ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400' }}"
                                                        data-rating="{{ $i }}"
                                                        data-faskes-id="{{ $faskes->id }}">
                                                    <i class="fas fa-star"></i>
                                                </button>
                                            @endfor
                                            <input type="hidden" name="rating" id="rating-{{ $faskes->id }}" value="{{ $userRating ? $userRating->rating : '' }}">
                                        </div>
                                        
                                        <!-- Review -->
                                        <textarea name="review" 
                                                  rows="2" 
                                                  placeholder="Berikan ulasan (opsional)"
                                                  class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">{{ $userRating ? $userRating->review : '' }}</textarea>
                                        
                                        <!-- Submit Buttons -->
                                        <div class="flex space-x-2">
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                                <i class="fas fa-save mr-1"></i>
                                                {{ $userRating ? 'Update' : 'Simpan' }}
                                            </button>
                                            
                                            @if($userRating)
                                                <button type="button"
                                                        onclick="if(confirm('Hapus rating Anda?')) { document.getElementById('delete-rating-{{ $faskes->id }}').submit(); }"
                                                        class="inline-flex items-center px-3 py-1.5 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors">
                                                    <i class="fas fa-trash mr-1"></i>
                                                    Hapus
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                    
                                    @if($userRating)
                                        <form id="delete-rating-{{ $faskes->id }}" action="{{ route('faskes.rating.destroy', $faskes) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>

                                <!-- Action Button -->
                                <button wire:click="showDetail({{ $faskes->id }})" 
                                        wire:loading.attr="disabled"
                                        wire:target="showDetail({{ $faskes->id }})"
                                        class="block w-full text-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                    <span wire:loading.remove wire:target="showDetail({{ $faskes->id }})">
                                        <i class="fas fa-eye mr-2"></i>
                                        Lihat Detail
                                    </span>
                                    <span wire:loading wire:target="showDetail({{ $faskes->id }})">
                                        <i class="fas fa-spinner fa-spin mr-2"></i>
                                        Loading...
                                    </span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $favorites->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart-broken text-red-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        @if($search)
                            Tidak ada favorit ditemukan
                        @else
                            Belum ada faskes favorit
                        @endif
                    </h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        @if($search)
                            Coba ubah kata kunci pencarian yang digunakan
                        @else
                            Mulai jelajahi faskes dan tandai yang menarik sebagai favorit
                        @endif
                    </p>
                    @if($search)
                        <button wire:click="$set('search', '')" 
                                class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors mb-4">
                            <i class="fas fa-refresh mr-2"></i>
                            Reset Pencarian
                        </button>
                    @endif
                    <div>
                        <a href="{{ route('landing.faskes') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search mr-2"></i>
                            Jelajahi Faskes
                        </a>
                    </div>
                </div>
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
             @keydown.escape.window="$wire.closeModal()"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
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
                    <div class="bg-gradient-to-r from-red-600 to-pink-700 px-4 sm:px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <i class="fas fa-heart mr-2"></i>
                                Detail Faskes Favorit
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

                                <!-- Favorite Badge -->
                                <div class="mt-4 text-center">
                                    <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium">
                                        <i class="fas fa-heart mr-2"></i>
                                        Favorit Saya
                                    </div>
                                </div>
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
                                                <a href="mailto:{{ $selectedFaskes->email }}" class="text-red-600 hover:underline">
                                                    {{ $selectedFaskes->email }}
                                                </a>
                                            </div>
                                        @endif

                                        @if($selectedFaskes->website)
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                                <a href="{{ $selectedFaskes->website }}" target="_blank" class="text-red-600 hover:underline">
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

                                    <!-- User Rating Display (if exists) -->
                                    @php
                                        $userRating = auth()->user()->getRatingForFaskes($selectedFaskes->id);
                                    @endphp
                                    @if($userRating)
                                        <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                            <label class="block text-sm font-medium text-red-700 mb-2">Rating Anda</label>
                                            <div class="flex items-center space-x-1 mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $userRating->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                @endfor
                                                <span class="text-sm text-gray-600 ml-2">{{ $userRating->rating }}/5</span>
                                            </div>
                                            @if($userRating->review)
                                                <p class="text-sm text-gray-700">{{ $userRating->review }}</p>
                                            @endif
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
                                   class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors w-full sm:w-auto">
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
                            <!-- Remove from Favorites Button -->
                            <form action="{{ route('favorites.destroy', $selectedFaskes) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Hapus dari favorit?')"
                                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors w-full sm:w-auto">
                                    <i class="fas fa-heart-broken mr-2"></i>
                                    Hapus dari Favorit
                                </button>
                            </form>
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

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="fixed top-4 right-4 z-50 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-4 right-4 z-50 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle star rating interactions
        const ratingContainers = document.querySelectorAll('form[action*="rating"]');
        
        ratingContainers.forEach(container => {
            const stars = container.querySelectorAll('.rating-star');
            const ratingInput = container.querySelector('input[name="rating"]');
            
            stars.forEach((star, index) => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    ratingInput.value = rating;
                    
                    // Update star colors in this specific container
                    const containerStars = container.querySelectorAll('.rating-star');
                    containerStars.forEach((s, i) => {
                        if (i < rating) {
                            s.classList.remove('text-gray-300');
                            s.classList.add('text-yellow-400');
                        } else {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        }
                    });
                });
                
                // Hover effect
                star.addEventListener('mouseenter', function() {
                    const rating = parseInt(this.dataset.rating);
                    const containerStars = container.querySelectorAll('.rating-star');
                    containerStars.forEach((s, i) => {
                        if (i < rating) {
                            s.classList.add('text-yellow-300');
                        }
                    });
                });
                
                star.addEventListener('mouseleave', function() {
                    const containerStars = container.querySelectorAll('.rating-star');
                    containerStars.forEach((s) => {
                        s.classList.remove('text-yellow-300');
                    });
                });
            });
        });

        // Auto-hide messages after 5 seconds
        setTimeout(function() {
            const messages = document.querySelectorAll('[class*="fixed top-4 right-4"]');
            messages.forEach(function(message) {
                message.style.display = 'none';
            });
        }, 5000);
    });
    </script>
</div>
