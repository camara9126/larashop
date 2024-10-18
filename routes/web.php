<?php

use PhpParser\Modifiers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

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
Route::post('/article/{articles}',[ArticleController::class, 'update'])->name('article.update');

// Modifier le mot de passe 
Route::get('/password', function () {
    return view('profile.partials.update-password-form');
})->middleware(['auth', 'verified'])->name('password');

// supprimé user 
Route::get('/supprimer', function () {
    return view('profile.partials.delete-user-form');
    })->middleware(['auth', 'verified'])->name('supprimer');

// editer user
Route::get('/editer', function () {
    $user= Auth::user();
    return view('profile.partials.update-profile-information-form', compact('user'));
    })->middleware(['auth', 'verified'])->name('editer');
    

require __DIR__.'/auth.php';
