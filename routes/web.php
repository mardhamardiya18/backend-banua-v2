<?php

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
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Category/Index');
        })->name('category.index');

        Route::get('/create', function () {
            return Inertia::render('Category/Create');
        })->name('category.create');

        Route::get('/edit', function () {
            return Inertia::render('Category/Edit');
        })->name('category.edit');
    });

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
