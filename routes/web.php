<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/create', function () {
        return view('brands.create');
    });
    Route::post('/create', [BrandController::class, 'store'])->name('brands.create');
});

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/create', function () {
        return view('categories.create');
    });
    Route::post('/create', [CategoryController::class, 'store'])->name('categories.create');
});

Route::prefix('/products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/create', [ProductController::class, 'createForm']);
    Route::post('/create', [ProductController::class, 'store'])->name('products.create');

    Route::get('update/{id}', [ProductController::class, 'detail']);
    Route::post('update/{id}', [ProductController::class, 'update'])->name('products.update');

    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
});

