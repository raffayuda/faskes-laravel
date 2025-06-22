<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabkotaController;
use App\Http\Controllers\JenisFaskesController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaskesRatingController;
use App\Livewire\Home;
use App\Livewire\Layanan;
use App\Livewire\Tentang;
use App\Livewire\Kontak;
use App\Livewire\Faskes;
use App\Livewire\Favorit;

// Landing Page Routes (accessible to everyone)
Route::get('/', Home::class)->name('landing.home');
Route::get('/tentang', Tentang::class)->name('landing.tentang');
Route::get('/layanan', Layanan::class)->name('landing.layanan');
Route::get('/kontak', Kontak::class)->name('landing.kontak');
Route::get('/faskes-landing', Faskes::class)->name('landing.faskes');

// Landing Page Routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/favorit-landing', Favorit::class)->name('landing.favorit');
});


// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated Routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('admin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('faskes', FaskesController::class)->parameters([
        'faskes' => 'faskes'
    ]);
    
    // User Features
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{faskes}/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/favorites/{faskes}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    
    // Rating Features
    Route::post('/faskes/{faskes}/rating', [FaskesRatingController::class, 'store'])->name('faskes.rating.store');
    Route::delete('/faskes/{faskes}/rating', [FaskesRatingController::class, 'destroy'])->name('faskes.rating.destroy');
    
    // Profile Features
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Admin Only Routes
    Route::middleware('admin')->group(function () {
        Route::resource('provinsi', ProvinsiController::class);
        Route::resource('kabkota', KabkotaController::class)->parameters([
            'kabkota' => 'kabkotum'
        ]);  
        Route::resource('jenis-faskes', JenisFaskesController::class)->parameters([
            'jenis-faskes' => 'jenis_faske'
        ]);
        Route::resource('kategori', KategoriController::class);
        Route::resource('users', UserController::class);
    });
});
