<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

//VOLGORDE VAN ROUTES IS OOK BELANGRIJK!!!!!!!!!!!!!!!!!!!!
Route::get('/houses', [HouseController::class, 'listTitles'])->name('houses.list');
Route::get('/houses/create', [HouseController::class, 'create'])->name('house.create');
Route::post('/houses', [HouseController::class, 'store'])->name('house.store');
Route::get('/houses/{id}', [HouseController::class, 'show'])->name('houses.show');
Route::delete('/houses/{id}', [HouseController::class, 'destroy'])->name('houses.destroy');


Route::get('secret', [SecretController::class, 'show']);

Route::get('/home', [HomeController::class, 'index'])->name('home');




require __DIR__.'/auth.php';
