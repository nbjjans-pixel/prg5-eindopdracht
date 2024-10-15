<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecretController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//andere mogelijkheden naar get zijn: patch, delete, put, post, options, match, any

Route::resource('products', ProductController::class);

Route::get('/about-us', [AboutUsController::class, 'show'])->name('about-us');

Route::get('products/{id}', function(int $id) {
    return view('products', ['id' => $id]);
}) ->name('products');


Route::get('/houses', [\App\Http\Controllers\HouseController::class, 'index']);

Route::get('secret', [SecretController::class, 'show']);


require __DIR__.'/auth.php';
