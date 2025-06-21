@extends('layouts.app')

@section('title', 'Ubah Profile')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Ubah Profile</h1>
                    <p class="text-gray-600 mt-1">Kelola informasi profil dan keamanan akun Anda</p>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-edit text-2xl text-blue-600"></i>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span class="text-green-700">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Profile Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Informasi Profile</h2>
                </div>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                                Role
                            </label>
                            <input type="text" 
                                   id="role" 
                                   value="{{ ucfirst($user->role) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500"
                                   readonly>
                            <p class="text-sm text-gray-500 mt-1">Role tidak dapat diubah</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center mb-6">
                    <i class="fas fa-lock text-red-600 mr-3"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Ubah Password</h2>
                </div>

                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password Saat Ini
                            </label>
                            <input type="password" 
                                   id="current_password" 
                                   name="current_password"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent @error('current_password') border-red-500 @enderror">
                            @error('current_password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password Baru
                            </label>
                            <input type="password" 
                                   id="password" 
                                   name="password"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Konfirmasi Password Baru
                            </label>
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" 
                                class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                            <i class="fas fa-key mr-2"></i>
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Information -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mt-6">
            <div class="flex items-center mb-6">
                <i class="fas fa-info-circle text-gray-600 mr-3"></i>
                <h2 class="text-xl font-semibold text-gray-900">Informasi Akun</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Tanggal Bergabung</h3>
                    <p class="text-gray-900">{{ $user->created_at->format('d F Y') }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Terakhir Diperbarui</h3>
                    <p class="text-gray-900">{{ $user->updated_at->format('d F Y H:i') }}</p>
                </div>
                @if(auth()->user()->role === 'user')
                <div>
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Total Faskes Favorit</h3>
                    <p class="text-gray-900">{{ $user->favoritesFaskes()->count() }} faskes</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
