@extends('layouts.app')

@section('title', 'Master Kabupaten/Kota')
@section('page-title', 'Master Kabupaten/Kota')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-6 border-b border-gray-200 dark:border-gray-700">
        <div>
            <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Data Kabupaten/Kota</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data kabupaten dan kota</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('kabkota.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus w-4 h-4 mr-2"></i>
                Tambah Kabupaten/Kota
            </a>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <label for="search" class="sr-only">Cari kabupaten/kota</label>
                <div class="relative">
                    <input type="text" 
                           id="search" 
                           placeholder="Cari nama kabupaten/kota..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            <div class="sm:w-48">
                <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <option value="">Semua Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Nama Kabupaten/Kota
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Provinsi
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Jumlah Faskes
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($kabkotas as $kabkota)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ $kabkota->nama }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                {{ $kabkota->provinsi->nama }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200">
                                {{ $kabkota->faskes->count() }} faskes
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('kabkota.show', $kabkota) }}" 
                                   class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300">
                                    <i class="fas fa-eye w-4 h-4"></i>
                                </a>
                                <a href="{{ route('kabkota.edit', $kabkota) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                    <i class="fas fa-edit w-4 h-4"></i>
                                </a>
                                <form action="{{ route('kabkota.destroy', $kabkota) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus kabupaten/kota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <i class="fas fa-trash w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="text-gray-500 dark:text-gray-400">
                                <i class="fas fa-city text-4xl mb-4"></i>
                                <p class="text-lg font-medium">Belum ada data kabupaten/kota</p>
                                <p class="mt-1">Silakan tambah data kabupaten/kota baru</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($kabkotas->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $kabkotas->links('pagination::tailwind') }}
        </div>
    @endif
</div>
@endsection
