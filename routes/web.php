<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/detail', function () {
    return view('home.detail');
});


Route::get('/test', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('test');


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD pour les Annonces
Route::resource('/article', ArticleController::class)->middleware(['auth', 'verified']);
Route::get('/article/{articles}',[ArticleController::class, 'show'])->name('article.show');
Route::get('/article/{articles}',[ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('/article/{articles}/edit',[ArticleController::class, 'edit'])->name('article.edit');

require __DIR__.'/auth.php';
