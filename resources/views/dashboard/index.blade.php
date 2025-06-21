@extends('layouts.app')

@section('title', 'Dashboard - Faskes')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Selamat Datang, {{ auth()->user()->name }}!</h1>
                <p class="text-blue-100 mt-2">
                    Anda login sebagai <span class="font-semibold">{{ ucfirst(auth()->user()->role) }}</span>
                </p>
                <p class="text-blue-100 text-sm">{{ now()->format('l, d F Y') }}</p>
            </div>
            <div class="hidden sm:block">
                <i class="fas fa-chart-line text-6xl text-blue-200"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <i class="fas fa-hospital text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Faskes</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_faskes']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                    <i class="fas fa-map-marked-alt text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Provinsi</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_provinsi']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                    <i class="fas fa-city text-yellow-600 dark:text-yellow-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Kab/Kota</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_kabkota']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                    <i class="fas fa-users text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_users']) }}</p>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Recent Faskes -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    <i class="fas fa-clock mr-2 text-blue-500"></i>
                    Faskes Terbaru
                </h2>
                <a href="{{ route('faskes.index') }}" 
                   class="text-blue-600 hover:text-blue-500 text-sm font-medium hover:underline">
                    Lihat Semua
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        @if($recentFaskes->count() > 0)
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
                            Jenis
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
                    @foreach($recentFaskes as $faskes)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                                    <i class="fas fa-hospital text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $faskes->nama }}
                                    </div>
                                    @if($faskes->nama_pengelola)
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $faskes->nama_pengelola }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            @if($faskes->kabkota)
                                {{ $faskes->kabkota->nama }}
                                @if($faskes->kabkota->provinsi)
                                    <br>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $faskes->kabkota->provinsi->nama }}</span>
                                @endif
                            @else
                                <span class="text-gray-500 dark:text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($faskes->jenisFaskes)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    {{ $faskes->jenisFaskes->nama }}
                                </span>
                            @else
                                <span class="text-gray-500 dark:text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            @if($faskes->rating)
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $faskes->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"></i>
                                    @endfor
                                    <span class="ml-2 text-sm">{{ $faskes->rating }}/5</span>
                                </div>
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Belum ada rating</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('faskes.show', $faskes) }}" 
                               class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                <i class="fas fa-eye mr-1"></i>
                                Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-hospital text-gray-400 text-2xl"></i>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-lg">Belum ada data faskes</p>
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('faskes.create') }}" 
               class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Tambah Faskes Pertama
            </a>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
