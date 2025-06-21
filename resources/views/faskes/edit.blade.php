@extends('layouts.app')

@section('title', 'Edit Faskes - ' . $faskes->nama)
@section('page-title', 'Edit Faskes')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-4">
                <a href="{{ route('faskes.show', $faskes) }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Faskes</h1>
                    <p class="text-gray-600 dark:text-gray-400">{{ $faskes->nama }}</p>
                </div>
            </div>
        </div> <!-- Form -->
        <form method="POST" action="{{ route('faskes.update', $faskes) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Main Form -->
            <div class="space-y-6">
            <!-- Basic Information -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                Informasi Dasar
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <!-- Nama Faskes -->
                <div class="md:col-span-2">
                    <label for="nama"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Faskes <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $faskes->nama) }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan nama fasilitas kesehatan">
                    @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Foto -->
                <div class="md:col-span-2">
                    <label for="foto"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Foto Faskes
                    </label>

                    <!-- Current Photo -->
                    @if ($faskes->foto)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Foto saat ini:</p>
                        <img src="{{ asset('uploads/faskes/' . $faskes->foto) }}"
                        alt="Foto {{ $faskes->nama }}"
                        class="w-32 h-32 object-cover rounded-lg border-2 border-gray-300 dark:border-gray-600">
                    </div>
                    @endif

                    <div class="relative">
                    <input type="file" id="foto" name="foto" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        onchange="previewImage(this)">
                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                        Format: JPG, JPEG, PNG. Maksimal 2MB.
                        {{ $faskes->foto ? 'Kosongkan jika tidak ingin mengubah foto.' : '' }}
                    </div>
                    </div>
                    @error('foto')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror

                    <!-- Preview Image -->
                    <div id="imagePreview" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview foto baru:</p>
                    <img id="preview" src="" alt="Preview"
                        class="w-32 h-32 object-cover rounded-lg border-2 border-gray-300 dark:border-gray-600">
                    </div>
                </div>

                <!-- Nama Pengelola -->
                <div class="md:col-span-2">
                    <label for="nama_pengelola"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nama Pengelola
                    </label>
                    <input type="text" id="nama_pengelola" name="nama_pengelola"
                    value="{{ old('nama_pengelola', $faskes->nama_pengelola) }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan nama pengelola">
                    @error('nama_pengelola')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Alamat
                    </label>
                    <textarea id="alamat" name="alamat" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan alamat lengkap">{{ old('alamat', $faskes->alamat) }}</textarea>
                    @error('alamat')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Faskes -->
                <div>
                    <label for="jenis_faskes_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Jenis Faskes
                    </label>
                    <select id="jenis_faskes_id" name="jenis_faskes_id"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Pilih Jenis Faskes</option>
                    @foreach ($jenisFaskes as $jenis)
                        <option value="{{ $jenis->id }}"
                        {{ old('jenis_faskes_id', $faskes->jenis_faskes_id) == $jenis->id ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                        </option>
                    @endforeach
                    </select>
                    @error('jenis_faskes_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Kategori
                    </label>
                    <select id="kategori_id" name="kategori_id"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id }}"
                        {{ old('kategori_id', $faskes->kategori_id) == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama }}
                        </option>
                    @endforeach
                    </select>
                    @error('kategori_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Rating (1-5)
                    </label>
                    <select id="rating" name="rating"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Pilih Rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}"
                        {{ old('rating', $faskes->rating) == $i ? 'selected' : '' }}>
                        {{ $i }} ⭐
                        </option>
                    @endfor
                    </select>
                    @error('rating')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-address-book mr-2 text-green-500"></i>
                Informasi Kontak
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Email -->
                <div>
                    <label for="email"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email
                    </label>
                    <input type="email" id="email" name="email"
                    value="{{ old('email', $faskes->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="email@example.com">
                    @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website -->
                <div>
                    <label for="website"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Website
                    </label>
                    <input type="url" id="website" name="website"
                    value="{{ old('website', $faskes->website) }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="https://example.com">
                    @error('website')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            </div>

            <!-- Location Information -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                Informasi Lokasi
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kabupaten/Kota -->
                <div class="md:col-span-3">
                    <label for="kabkota_id"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Kabupaten/Kota
                    </label>
                    <select id="kabkota_id" name="kabkota_id"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Pilih Kab/Kota</option>
                    @foreach ($kabkota->groupBy('provinsi.nama') as $provinsiNama => $kabkotaList)
                        <optgroup label="{{ $provinsiNama }}">
                        @foreach ($kabkotaList as $kab)
                            <option value="{{ $kab->id }}"
                            {{ old('kabkota_id', $faskes->kabkota_id) == $kab->id ? 'selected' : '' }}>
                            {{ $kab->nama }}
                            </option>
                        @endforeach
                        </optgroup>
                    @endforeach
                    </select>
                    @error('kabkota_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Latitude -->
                <div>
                    <label for="latitude"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Latitude
                    </label>
                    <input type="number" id="latitude" name="latitude"
                    value="{{ old('latitude', $faskes->latitude) }}" step="any"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="-7.257472">
                    @error('latitude')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Longitude -->
                <div>
                    <label for="longitude"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Longitude
                    </label>
                    <input type="number" id="longitude" name="longitude"
                    value="{{ old('longitude', $faskes->longitude) }}" step="any"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="112.752088">
                    @error('longitude')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900 rounded-lg">
                <p class="text-sm text-blue-700 dark:text-blue-300">
                    <i class="fas fa-info-circle mr-1"></i>
                    Tip: Anda bisa mendapatkan koordinat latitude dan longitude dari Google Maps dengan klik
                    kanan pada lokasi.
                </p>
                </div>
            </div>

            <!-- Actions -->
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-save mr-2 text-green-500"></i>
                Update Data
                </h3>

                <div class="flex gap-6">
                <button type="submit"
                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                    <i class="fas fa-save mr-2"></i>
                    Update Faskes
                </button>

                <a href="{{ route('faskes.show', $faskes) }}"
                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200 font-medium">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                </div>
            </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
@endsection
