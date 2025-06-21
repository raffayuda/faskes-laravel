@extends('layouts.app')

@section('title', 'Detail Faskes - ' . $faskes->nama)
@section('page-title', 'Detail Faskes')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('faskes.index') }}" 
                   class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $faskes->nama }}</h1>
                    <p class="text-gray-600">Detail informasi fasilitas kesehatan</p>
                </div>
            </div>

            <div class="flex space-x-2">
                @if(auth()->user()->role === 'user')
                    @php
                        $isFavorited = auth()->user()->favoritesFaskes()->where('faskes_id', $faskes->id)->exists();
                    @endphp
                    <form method="POST" action="{{ route('favorites.toggle', $faskes) }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 {{ $isFavorited ? 'bg-red-600 hover:bg-red-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white rounded-lg transition-colors duration-200"
                                title="{{ $isFavorited ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}">
                            <i class="fas {{ $isFavorited ? 'fa-heart' : 'fa-heart-o' }} mr-2"></i>
                            {{ $isFavorited ? 'Hapus Favorit' : 'Tambah Favorit' }}
                        </button>
                    </form>
                @endif

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('faskes.edit', $faskes) }}" 
                   class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <form method="POST" 
                      action="{{ route('faskes.destroy', $faskes) }}" 
                      class="inline"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus faskes ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                    Informasi Dasar
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama Faskes</label>
                        <p class="text-gray-900 font-medium">{{ $faskes->nama }}</p>
                    </div>

                    @if($faskes->nama_pengelola)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Pengelola</label>
                        <p class="text-gray-900">{{ $faskes->nama_pengelola }}</p>
                    </div>
                    @endif

                    @if($faskes->alamat)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                        <p class="text-gray-900">{{ $faskes->alamat }}</p>
                    </div>
                    @endif

                    @if($faskes->jenisFaskes)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Faskes</label>
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $faskes->jenisFaskes->nama }}
                        </span>
                    </div>
                    @endif

                    @if($faskes->kategori)
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Kategori</label>
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $faskes->kategori->nama }}
                        </span>
                    </div>                    @endif
                </div>
            </div>

            <!-- Contact Information -->
            @if($faskes->email || $faskes->website)
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    <i class="fas fa-address-book mr-2 text-green-500"></i>
                    Informasi Kontak
                </h2>

                <div class="space-y-4">
                    @if($faskes->email)
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <a href="mailto:{{ $faskes->email }}" 
                               class="text-blue-600 hover:text-blue-500 font-medium">
                                {{ $faskes->email }}
                            </a>
                        </div>
                    </div>
                    @endif

                    @if($faskes->website)
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-globe text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Website</p>
                            <a href="{{ $faskes->website }}" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-500 font-medium">
                                {{ $faskes->website }}
                                <i class="fas fa-external-link-alt text-xs ml-1"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Foto Faskes -->
            @if($faskes->foto)
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    <i class="fas fa-image mr-2 text-purple-500"></i>
                    Foto Faskes
                </h3>
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ asset('uploads/faskes/' . $faskes->foto) }}" 
                         alt="Foto {{ $faskes->nama }}" 
                         class="w-full h-48 object-cover rounded-lg border-2 border-gray-200">
                </div>
            </div>
            @endif

            <!-- Location Info -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                    Lokasi
                </h3>

                @if($faskes->kabkota)
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-500">Kabupaten/Kota</p>
                        <p class="text-gray-900 font-medium">{{ $faskes->kabkota->nama }}</p>
                    </div>

                    @if($faskes->kabkota->provinsi)
                    <div>
                        <p class="text-sm text-gray-500">Provinsi</p>
                        <p class="text-gray-900 font-medium">{{ $faskes->kabkota->provinsi->nama }}</p>
                    </div>
                    @endif

                    @if($faskes->latitude && $faskes->longitude)
                    <div>
                        <p class="text-sm text-gray-500">Koordinat</p>
                        <p class="text-gray-900 text-sm">
                            {{ $faskes->latitude }}, {{ $faskes->longitude }}
                        </p>
                        <a href="https://maps.google.com/?q={{ $faskes->latitude }},{{ $faskes->longitude }}" 
                           target="_blank"
                           class="inline-flex items-center mt-2 px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 text-sm">
                            <i class="fas fa-map mr-1"></i>
                            Lihat di Google Maps
                        </a>
                    </div>
                    @endif
                </div>
                @else
                <p class="text-gray-500">Informasi lokasi tidak tersedia</p>
                @endif            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    <i class="fas fa-chart-bar mr-2 text-purple-500"></i>
                    Statistik
                </h3>

                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Tanggal Dibuat</span>
                        <span class="text-gray-900 font-medium">
                            {{ $faskes->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Terakhir Update</span>
                        <span class="text-gray-900 font-medium">
                            {{ $faskes->updated_at->format('d M Y') }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Status</span>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Aktif
                        </span>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
</div>
@endsection
