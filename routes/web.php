<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Semua halaman membutuhkan login
Route::middleware(['auth'])->group(function () {

    // Dashboard: Admin dan User
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Index Kategori: Admin dan User
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    // Index Produk: Admin dan User
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    // Fitur khusus Admin
    Route::middleware(['role:admin'])->group(function () {

        // CRUD Kategori selain Index
        Route::resource('categories', CategoryController::class)
            ->except(['index', 'show']);

        // CRUD Produk selain Index
        Route::resource('products', ProductController::class)
            ->except(['index', 'show']);

        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });
});

// Authentication
require __DIR__.'/auth.php';
