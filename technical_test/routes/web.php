<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikePartsController;
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\StockHistoriesController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bikeparts', [BikePartsController::class, 'index'])->name('bikeparts.index');
    Route::get('/bikeparts/create', [BikePartsController::class, 'create'])->name('bikeparts.create');
    Route::post('/bikeparts', [BikePartsController::class, 'store'])->name('bikeparts.store');
    Route::get('/bikeparts/{id}', [BikePartsController::class, 'show'])->name('bikeparts.show');
    Route::get('/bikeparts/{id}/edit', [BikePartsController::class, 'edit'])->name('bikeparts.edit');
    Route::put('/bikeparts/{id}', [BikePartsController::class, 'update'])->name('bikeparts.update');
    Route::delete('/bikeparts/{id}', [BikePartsController::class, 'destroy'])->name('bikeparts.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/brands', [BrandsController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandsController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('/brands/{id}', [BrandsController::class, 'show'])->name('brands.show'); 
    Route::put('/brands/{id}', [BrandsController::class, 'update'])->name('brands.update'); 
    Route::get('/brands/{id}/edit', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::delete('/brands/{id}', [BrandsController::class, 'destroy'])->name('brands.destroy');   
    
    Route::get('/stockhistories/create/{bikePartId}', [StockHistoriesController::class, 'create'])->name('stockhistories.create');
    Route::post('/stockhistories', [StockHistoriesController::class, 'store'])->name('stockhistories.store');
});

require __DIR__.'/auth.php';
