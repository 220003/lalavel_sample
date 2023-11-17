<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// HomeController
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/', function () {
    return view('welcome');
});


// ItemController
Route::get('/item/', [ItemController::class, 'index'])->name('item.index');
Route::get('/item/create', [ItemController::class,'create'])->name('item.create');
Route::post('/item/store', [ItemController::class,'store'])->name('item.store');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';