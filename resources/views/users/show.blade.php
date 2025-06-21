@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    Detail User: {{ $user->name }}
                </h1>
                <p class="text-gray-600">Informasi lengkap pengguna</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('users.edit', $user) }}" 
                   class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('users.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- User Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="text-center">
                    <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl font-bold text-white">
                            {{ substr($user->name, 0, 1) }}
                        </span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $user->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $user->email }}</p>
                    
                    <!-- Role Badge -->
                    @if($user->role === 'admin')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <i class="fas fa-crown mr-2"></i>
                            Administrator
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-user mr-2"></i>
                            Regular User
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h4 class="text-lg font-semibold text-gray-900 mb-6">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    Informasi Akun
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ID User</label>
                        <p class="text-gray-900 font-mono text-sm bg-gray-50 px-3 py-2 rounded border">{{ $user->id }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <p class="text-gray-900">{{ ucfirst($user->role) }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>
                            Aktif
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Bergabung</label>
                        <p class="text-gray-900">{{ $user->created_at->format('d F Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diperbarui</label>
                        <p class="text-gray-900">{{ $user->updated_at->format('d F Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($user->role === 'user')
    <!-- User Activities (for regular users) -->
    <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h4 class="text-lg font-semibold text-gray-900 mb-6">
            <i class="fas fa-chart-line text-blue-600 mr-2"></i>
            Aktivitas User
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="text-3xl font-bold text-blue-600 mb-2">
                    {{ $user->favoritesFaskes()->count() }}
                </div>
                <p class="text-sm text-blue-800">Faskes Favorit</p>
            </div>

            <div class="text-center p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="text-3xl font-bold text-green-600 mb-2">
                    {{ $user->created_at->diffInDays() }}
                </div>
                <p class="text-sm text-green-800">Hari Bergabung</p>
            </div>

            <div class="text-center p-4 bg-purple-50 border border-purple-200 rounded-lg">
                <div class="text-3xl font-bold text-purple-600 mb-2">
                    {{ $user->updated_at->diffInDays() }}
                </div>
                <p class="text-sm text-purple-800">Hari Terakhir Aktif</p>
            </div>
        </div>

        @if($user->favoritesFaskes()->count() > 0)
        <!-- Favorite Faskes -->
        <div class="mt-6">
            <h5 class="text-md font-medium text-gray-900 mb-4">
                <i class="fas fa-heart text-red-500 mr-2"></i>
                Faskes Favorit ({{ $user->favoritesFaskes()->count() }})
            </h5>
            <div class="space-y-3 max-h-60 overflow-y-auto">
                @foreach($user->favoritesFaskes()->take(5)->get() as $faskes)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-medium text-gray-900">{{ $faskes->nama }}</p>
                        <p class="text-sm text-gray-600">{{ $faskes->kabkota->nama ?? 'N/A' }}</p>
                    </div>
                    <span class="text-xs text-gray-500">
                        {{ $faskes->jenisFaskes->nama ?? 'N/A' }}
                    </span>
                </div>
                @endforeach
                @if($user->favoritesFaskes()->count() > 5)
                <p class="text-sm text-gray-500 text-center">
                    Dan {{ $user->favoritesFaskes()->count() - 5 }} faskes lainnya...
                </p>
                @endif
            </div>
        </div>
        @endif
    </div>
    @endif

    <!-- Actions -->
    <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h4 class="text-lg font-semibold text-gray-900 mb-4">
            <i class="fas fa-cogs text-blue-600 mr-2"></i>
            Aksi
        </h4>
        
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('users.edit', $user) }}" 
               class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition-colors duration-200">
                <i class="fas fa-edit mr-2"></i>
                Edit User
            </a>

            @if($user->id !== auth()->id())
                <form action="{{ route('users.destroy', $user) }}" 
                      method="POST" 
                      class="inline-block"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $user->name }}? Tindakan ini tidak dapat dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus User
                    </button>
                </form>
            @else
                <span class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed">
                    <i class="fas fa-ban mr-2"></i>
                    Tidak dapat menghapus akun sendiri
                </span>
            @endif

            <a href="{{ route('users.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                <i class="fas fa-list mr-2"></i>
                Daftar User
            </a>
        </div>
    </div>
</div>
@endsection
