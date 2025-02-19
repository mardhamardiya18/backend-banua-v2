<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubproductController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Category
    Route::resource('category', CategoryController::class);


    // Product
    Route::resource('product', ProductController::class);

    // Subproduct
    Route::resource('subproduct', SubproductController::class);
});
