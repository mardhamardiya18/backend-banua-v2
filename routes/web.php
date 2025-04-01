<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExtraMenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuOptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubproductController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// ADMIN ROUTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    // Category
    Route::resource('category', CategoryController::class);


    // Product
    Route::resource('product', ProductController::class);

    // Subproduct
    Route::resource('subproduct', SubproductController::class);

    // Product Gallery
    Route::resource('gallery', GalleryController::class)->except(['show', 'edit', 'update']);

    // Menu Options
    Route::resource('menu-option', MenuOptionController::class)->except(['show', 'edit', 'update']);

    // Extra Menu
    Route::resource('extra-menu', ExtraMenuController::class);

    // Banner
    Route::resource('banner', BannerController::class);
});

// WEB ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');