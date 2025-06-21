@extends('layouts.app')

@section('title', 'Edit Provinsi')
@section('page-title', 'Edit Provinsi')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <a href="{{ route('provinsi.index') }}" 
                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <i class="fas fa-arrow-left w-5 h-5"></i>
                </a>
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Edit Provinsi</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Edit data provinsi</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('provinsi.update', $provinsi) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Provinsi <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama" 
                       name="nama" 
                       value="{{ old('nama', $provinsi->nama) }}"
                       placeholder="Contoh: Jawa Barat, DKI Jakarta, Sumatera Utara"
                       class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}"
                       required>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Masukkan nama provinsi sesuai dengan nama resmi provinsi di Indonesia.
                </p>
            </div>

            <!-- Ibu Kota -->
            <div>
                <label for="ibukota" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Ibu Kota (Opsional)
                </label>
                <input type="text" 
                       id="ibukota" 
                       name="ibukota" 
                       value="{{ old('ibukota', $provinsi->ibukota) }}"
                       placeholder="Contoh: Bandung, Jakarta, Medan"
                       class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('ibukota') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                @error('ibukota')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Masukkan nama ibu kota provinsi.
                </p>
            </div>

            <!-- Koordinat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Latitude -->
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Latitude (Opsional)
                    </label>
                    <input type="number" 
                           id="latitude" 
                           name="latitude" 
                           step="any"
                           min="-90"
                           max="90"
                           value="{{ old('latitude', $provinsi->latitude) }}"
                           placeholder="Contoh: -6.2088"
                           class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('latitude') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                    @error('latitude')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Longitude -->
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Longitude (Opsional)
                    </label>
                    <input type="number" 
                           id="longitude" 
                           name="longitude" 
                           step="any"
                           min="-180"
                           max="180"
                           value="{{ old('longitude', $provinsi->longitude) }}"
                           placeholder="Contoh: 106.8456"
                           class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('longitude') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                    @error('longitude')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200">
                            Tips Koordinat
                        </h3>
                        <div class="mt-2 text-sm text-blue-700 dark:text-blue-300">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Latitude: -90 sampai 90 (negatif untuk selatan khatulistiwa)</li>
                                <li>Longitude: -180 sampai 180 (negatif untuk barat Greenwich)</li>
                                <li>Gunakan Google Maps untuk mendapatkan koordinat yang akurat</li>
                                <li>Format desimal (contoh: -6.2088, 106.8456)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('provinsi.index') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
