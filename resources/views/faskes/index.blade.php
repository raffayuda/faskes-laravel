@extends('layouts.app')

@section('title', 'Data Faskes')
@section('page-title', 'Data Faskes')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    <i class="fas fa-hospital mr-2 text-blue-500"></i>
                    Data Fasilitas Kesehatan
                </h1>
                <p class="text-gray-600 mt-1">
                    Kelola data fasilitas kesehatan di seluruh Indonesia
                </p>
            </div>

            @if(auth()->user()->role === 'admin')
            <div class="flex space-x-3">
                <a href="{{ route('faskes.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Faskes
                </a>
                
            </div>
            @endif
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
        <div x-data="{ showFilters: false }">
            <button @click="showFilters = !showFilters" 
                    class="flex items-center text-gray-700 hover:text-gray-900">
                <i class="fas fa-filter mr-2"></i>
                Filter & Pencarian
                <i x-show="!showFilters" class="fas fa-chevron-down ml-2"></i>
                <i x-show="showFilters" class="fas fa-chevron-up ml-2"></i>
            </button>

            <div x-show="showFilters" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                    <input type="text" 
                           placeholder="Cari nama faskes..."
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Provinsi</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Faskes</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Jenis</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-search mr-2"></i>
                        Cari
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        @if($faskes->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Foto
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Faskes
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lokasi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jenis & Kategori
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kontak
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">                    @foreach($faskes as $item)
                    <tr class="hover:bg-gray-50">
                        <!-- Foto -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 h-16 w-16">
                                @if($item->foto)
                                    <img class="h-16 w-16 rounded-lg object-cover border-2 border-gray-200" 
                                         src="{{ asset('uploads/faskes/' . $item->foto) }}" 
                                         alt="Foto {{ $item->nama }}"
                                         title="{{ $item->nama }}">
                                @else
                                    <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-hospital text-gray-400 text-xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        
                        <!-- Nama Faskes -->
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $item->nama }}
                                </div>
                                @if($item->nama_pengelola)
                                    <div class="text-sm text-gray-500">
                                        {{ $item->nama_pengelola }}
                                    </div>
                                @endif
                                @if($item->rating)
                                    <div class="flex items-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star text-xs {{ $i <= $item->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                        @endfor
                                        <span class="text-xs text-gray-500">({{ $item->rating }})</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm space-y-1">
                                @if($item->kabkota)
                                    <div class="text-gray-900">
                                        <i class="fas fa-map-marker-alt mr-1 text-red-400"></i>
                                        {{ $item->kabkota->nama }}
                                    </div>
                                @endif
                                @if($item->kabkota && $item->kabkota->provinsi)
                                    <div class="text-gray-500">
                                        {{ $item->kabkota->provinsi->nama }}
                                    </div>
                                @endif
                                @if($item->alamat)
                                    <div class="text-gray-500 text-xs">
                                        {{ Str::limit($item->alamat, 50) }}
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                @if($item->jenisFaskes)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $item->jenisFaskes->nama }}
                                    </span>
                                @endif
                                @if($item->kategori)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $item->kategori->nama }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm space-y-1">
                                @if($item->email)
                                    <div class="text-gray-900">
                                        <i class="fas fa-envelope mr-1 text-gray-400"></i>
                                        {{ $item->email }}
                                    </div>
                                @endif
                                @if($item->website)
                                    <div class="text-gray-900">
                                        <i class="fas fa-globe mr-1 text-gray-400"></i>
                                        <a href="{{ $item->website }}" target="_blank" class="text-blue-600 hover:text-blue-500">
                                            {{ $item->website }}
                                        </a>
                                    </div>
                                @endif
                                @if(!$item->email && !$item->website)
                                    <span class="text-gray-400">Tidak tersedia</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                @if(auth()->user()->role === 'user')
                                    @php
                                        $isFavorited = auth()->user()->favoritesFaskes()->where('faskes_id', $item->id)->exists();
                                    @endphp
                                    <form method="POST" action="{{ route('favorites.toggle', $item) }}" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="text-{{ $isFavorited ? 'red' : 'gray' }}-600 hover:text-{{ $isFavorited ? 'red' : 'blue' }}-900"
                                                title="{{ $isFavorited ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}">
                                            <i class="fas {{ $isFavorited ? 'fa-heart' : 'fa-heart-o' }}"></i>
                                        </button>
                                    </form>
                                @endif
                                
                                <a href="{{ route('faskes.show', $item) }}" 
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('faskes.edit', $item) }}" 
                                   class="text-yellow-600 hover:text-yellow-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form method="POST" 
                                      action="{{ route('faskes.destroy', $item) }}" 
                                      class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus faskes ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $faskes->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-hospital text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data faskes</h3>
            <p class="text-gray-500 mb-6">
                Mulai dengan menambahkan fasilitas kesehatan pertama Anda.
            </p>
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('faskes.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Tambah Faskes Pertama
            </a>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
