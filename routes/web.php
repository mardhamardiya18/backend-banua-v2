<?php

use App\Http\Controllers\CategoryController;
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
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Product/Index');
        })->name('product.index');

        Route::get('/create', function () {
            return Inertia::render('Product/Create');
        })->name('product.create');

        Route::get('/edit', function () {
            return Inertia::render('Product/Edit');
        })->name('product.edit');
    });
});
