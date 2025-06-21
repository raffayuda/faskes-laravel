@extends('layouts.app')

@section('title', 'Detail Jenis Faskes')
@section('page-title', 'Detail Jenis Faskes')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Main Info Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('jenis-faskes.index') }}" 
                       class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <i class="fas fa-arrow-left w-5 h-5"></i>
                    </a>
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center">
                            <i class="fas fa-hospital-symbol text-primary-600 dark:text-primary-400 text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $jenisFaskes->nama }}</h1>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Detail jenis faskes</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('jenis-faskes.edit', $jenisFaskes) }}" 
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-yellow-700 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300 dark:hover:bg-yellow-800 rounded-lg transition-colors duration-200">
                        <i class="fas fa-edit w-4 h-4 mr-2"></i>
                        Edit
                    </a>
                    <form action="{{ route('jenis-faskes.destroy', $jenisFaskes) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis faskes ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800 rounded-lg transition-colors duration-200">
                            <i class="fas fa-trash w-4 h-4 mr-2"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Jenis Faskes</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $jenisFaskes->nama }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Faskes</dt>
                    <dd class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 dark:bg-primary-900 text-primary-800 dark:text-primary-200">
                            {{ $jenisFaskes->faskes->count() }} faskes
                        </span>
                    </dd>
                </div>                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID Jenis Faskes</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">#{{ $jenisFaskes->id }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                    <dd class="mt-1">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                            Aktif
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Faskes List -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Daftar Faskes</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Faskes dengan jenis {{ $jenisFaskes->nama }}</p>
        </div>

        @if($jenisFaskes->faskes->count() > 0)
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
                                Kategori
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($jenisFaskes->faskes as $faskes)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $faskes->nama }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                        {{ $faskes->kabkota->nama }}, {{ $faskes->kabkota->provinsi->nama }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                        {{ $faskes->kategori->nama }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('faskes.show', $faskes) }}" 
                                       class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center">
                <div class="text-gray-500 dark:text-gray-400">
                    <i class="fas fa-hospital text-4xl mb-4"></i>
                    <p class="text-lg font-medium">Belum ada faskes</p>
                    <p class="mt-1">Belum ada faskes dengan jenis {{ $jenisFaskes->nama }}</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
