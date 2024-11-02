<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SecretController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// onder middleware 'auth' routes moet je ingelogd zijn om de pagina te kunnen bereiken
Route::middleware('auth')->group(function () {
    // Profiel
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // huizen
    Route::get('/houses', [HouseController::class, 'listTitles'])->name('houses.list');
    Route::get('/houses/create', [HouseController::class, 'create'])->name('house.create');
    Route::post('/houses', [HouseController::class, 'store'])->name('house.store');
    Route::get('/houses/{id}', [HouseController::class, 'show'])->name('houses.show');
    Route::delete('/houses/{id}', [HouseController::class, 'destroy'])->name('houses.destroy');
    Route::get('/houses/{id}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::put('/houses/{id}', [HouseController::class, 'update'])->name('house.update');

    // review
    Route::get('/houses/{house}/review/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/houses/{house}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::post('/houses/{house}/favorite', [HouseController::class, 'favorite'])->name('houses.favorite');
    Route::delete('/houses/{house}/unfavorite', [HouseController::class, 'unfavorite'])->name('houses.unfavorite');

    // admin
    Route::get('/admin/houses', [HouseController::class, 'adminIndex'])->name('admin.houses.index');
    Route::get('/admin/houses/{id}/edit', [HouseController::class, 'edit'])->name('admin.houses.edit');
    Route::put('/admin/houses/{id}', [HouseController::class, 'update'])->name('admin.houses.update');
    Route::delete('/admin/houses/{id}', [HouseController::class, 'destroy'])->name('admin.houses.destroy');
});

// overig van oefenen
Route::get('/about-us', [AboutUsController::class, 'show'])->name('about-us');
Route::get('products/{id}', function (int $id) {
    return view('products', ['id' => $id]);
})->name('products');
Route::get('secret', [SecretController::class, 'show']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

require __DIR__.'/auth.php';
