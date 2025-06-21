@extends('layouts.app')

@section('title', 'Edit Jenis Faskes')
@section('page-title', 'Edit Jenis Faskes')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <a href="{{ route('jenis-faskes.index') }}" 
                   class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <i class="fas fa-arrow-left w-5 h-5"></i>
                </a>
                <div>
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Edit Jenis Faskes</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Edit data jenis faskes</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('jenis-faskes.update', $jenisFaskes) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Jenis Faskes <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nama" 
                       name="nama" 
                       value="{{ old('nama', $jenisFaskes->nama) }}"
                       placeholder="Contoh: Rumah Sakit, Puskesmas, Klinik"
                       class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}"
                       required>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Masukkan nama jenis fasilitas kesehatan seperti Rumah Sakit, Puskesmas, Klinik, dll.
                </p>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('jenis-faskes.index') }}" 
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
