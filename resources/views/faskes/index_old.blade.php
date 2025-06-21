@extends('layouts.app')

@section('title', 'Data Faskes')
@section('page-title', 'Data Faskes')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-hospital mr-2 text-blue-500"></i>
                    Data Fasilitas Kesehatan
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
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
                <button class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                    <i class="fas fa-file-import mr-2"></i>
                    Import Data
                </button>
            </div>
            @endif
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <div x-data="{ showFilters: false }">
            <button @click="showFilters = !showFilters" 
                    class="flex items-center text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
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
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pencarian</label>
                    <input type="text" 
                           placeholder="Cari nama faskes..."
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Provinsi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Semua Provinsi</option>
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jenis Faskes</label>
                    <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
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
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        @if($faskes->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Nama Faskes
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Lokasi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Jenis & Kategori
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Kontak
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Rating
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($faskes as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hospital text-blue-600 dark:text-blue-400 text-lg"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $item->nama }}
                                    </div>
                                    @if($item->nama_pengelola)
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Pengelola: {{ $item->nama_pengelola }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 dark:text-white">
                                @if($item->alamat)
                                    {{ Str::limit($item->alamat, 50) }}
                                @endif
                            </div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                @if($item->kabkota)
                                    {{ $item->kabkota->nama }}
                                    @if($item->kabkota->provinsi)
                                        , {{ $item->kabkota->provinsi->nama }}
                                    @endif
                                @else
                                    <span class="text-gray-400">Lokasi tidak tersedia</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="space-y-1">
                                @if($item->jenisFaskes)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                        {{ $item->jenisFaskes->nama }}
                                    </span>
                                @endif
                                @if($item->kategori)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                        {{ $item->kategori->nama }}
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm space-y-1">
                                @if($item->email)
                                    <div class="text-gray-900 dark:text-white">
                                        <i class="fas fa-envelope mr-1 text-gray-400"></i>
                                        {{ $item->email }}
                                    </div>
                                @endif
                                @if($item->website)
                                    <div class="text-gray-900 dark:text-white">
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->rating)
                                <div class="flex items-center space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-sm {{ $i <= $item->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"></i>
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $item->rating }}/5</span>
                                </div>
                            @else
                                <span class="text-gray-400">Belum ada rating</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('faskes.show', $item) }}" 
                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('faskes.edit', $item) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300"
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
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
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
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $faskes->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-hospital text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada data faskes</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-6">
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
