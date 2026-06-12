<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SavedBookController;
use App\Http\Controllers\BookRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SavedBookController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/save/{id}', [SavedBookController::class, 'save'])->name('books.save');
    Route::delete('/unsave/{id}', [SavedBookController::class, 'unsave'])->name('books.unsave');
    Route::get('/requests', [BookRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [BookRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [BookRequestController::class, 'store'])->name('requests.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/requests', [BookRequestController::class, 'adminIndex'])->name('admin.requests');
    Route::post('/admin/requests/{id}/fulfill', [BookRequestController::class, 'fulfill'])->name('admin.requests.fulfill');
});

require __DIR__.'/auth.php';