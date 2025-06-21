@extends('layouts.app')

@section('title', 'Tambah Kabupaten/Kota')
@section('page-title', 'Tambah Kabupaten/Kota')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <a href="{{ route('kabkota.index') }}" 
                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <i class="fas fa-arrow-left w-5 h-5"></i>
                </a>
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Tambah Kabupaten/Kota Baru</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Isi form untuk menambah kabupaten/kota baru</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('kabkota.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Kabupaten/Kota <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama" 
                       name="nama" 
                       value="{{ old('nama') }}"
                       placeholder="Contoh: Kabupaten Bandung / Kota Bandung"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('nama') border-red-500 @enderror"
                       required>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Provinsi -->
            <div>
                <label for="provinsi_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Provinsi <span class="text-red-500">*</span>
                </label>
                <select id="provinsi_id" 
                        name="provinsi_id" 
                        class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('provinsi_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}"
                        required>
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>
                            {{ $provinsi->nama }}
                        </option>
                    @endforeach
                </select>
                @error('provinsi_id')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Latitude -->
            <div>
                <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Latitude (Opsional)
                </label>
                <input type="number" 
                       id="latitude" 
                       name="latitude" 
                       value="{{ old('latitude') }}"
                       placeholder="Contoh: -6.914744"
                       step="any"
                       class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('latitude') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                @error('latitude')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Masukkan koordinat latitude kabupaten/kota (format desimal).
                </p>
            </div>

            <!-- Longitude -->
            <div>
                <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Longitude (Opsional)
                </label>
                <input type="number" 
                       id="longitude" 
                       name="longitude" 
                       value="{{ old('longitude') }}"
                       placeholder="Contoh: 107.609810"
                       step="any"
                       class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('longitude') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                @error('longitude')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Masukkan koordinat longitude kabupaten/kota (format desimal).
                </p>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('kabkota.index') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
