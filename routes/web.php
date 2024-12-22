<?php

use App\Models\articles;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearhController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('home.index');
});

// recherche
Route::resource('/search', SearhController::class);
// recherche artile par l'admin 
Route::get('/searchArticle', [SearhController::class, 'article'])->middleware('auth','verified')->name('search.article');
// recherche utilisateur par l'admin
Route::get('/searchUser', [SearhController::class, 'user'])->middleware('auth','verified')->name('search.user');

Route::get('/detail', function () {
    return view('home.detail');
});

// A propos de nous 
Route::get('/apropos', function () {
    $categories= categories::all();
    return view('pages.apropos', compact('categories'));
});

// Notre politique et condition 
Route::get('/politique', function () {
    $categories= categories::all();
    return view('pages.politique', compact('categories'));
});

// Mesure securite 
Route::get('/securite', function () {
    $categories= categories::all();
    return view('pages.securite', compact('categories'));
    });
    

// Liste des Utilisateurs 
Route::get('/users/all',[RegisteredUserController::class, 'all'])->name('users.all')->middleware(['auth', 'verified']);

// Activer/Desactiver un users
Route::patch('/users/{users}/activate', [RegisteredUserController::class, 'activate'])->name('users.activate')->middleware(['auth', 'verified']);
Route::patch('/users/{users}/desactivate', [RegisteredUserController::class, 'desactivate'])->name('users.desactivate')->middleware(['auth', 'verified']);

// Dashboard 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::user()->statut == 'admin')
            return view('dashboard.admin');
        elseif(Auth::user()->statut == 'client')
            $articlesC= Articles::where(['user_id'=>Auth::user()->id])->get();
            return view('dashboard.client', compact('articlesC'));

    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD pour les Articles
Route::resource('/article', ArticleController::class)->middleware(['auth', 'verified']);
Route::get('/article/{articles}',[ArticleController::class, 'show'])->name('article.show')->middleware(['auth', 'verified']);
Route::get('/article/{articles}',[ArticleController::class, 'destroy'])->name('article.destroy')->middleware(['auth', 'verified']);
Route::get('/article/{articles}/edit',[ArticleController::class, 'edit'])->name('article.edit')->middleware(['auth', 'verified']);
Route::post('/article/{articles}',[ArticleController::class, 'update'])->name('article.update')->middleware(['auth', 'verified']);

// Detail article 
Route::get('/view/{articles}', function ($slug) {
    $articles= articles::where('slug', $slug)->firstOrFail();
    $articles->increment('click_count');
    $categories= categories::all();
    // dd($articles);
    return view('home.detail', compact('articles','categories'));
})->name('article.view');

// activer/desactiver un article 
Route::patch('/article/{articles}/activate', [ArticleController::class, 'activate'])->name('articles.activate')->middleware(['auth', 'verified']);
Route::patch('/article/{articles}/desactivate', [ArticleController::class, 'desactivate'])->name('articles.desactivate')->middleware(['auth', 'verified']);


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
    
// Categories     
Route::resource('/categories', CategoriesController::class)->middleware(['auth', 'verified']);
Route::get('categories/create',[CategoriesController::class, 'create'])->name('categories.create')->middleware(['auth', 'verified']);


// Payment Paytech 
Route::get('/abonnement', function () {
    return view('dashboard.abonnement');
})->middleware(['auth', 'verified'])->name('abonne');

Route::get('/paiement', [PaymentController::class, 'makePayment'])->middleware(['auth', 'verified'])->name('paiement');
Route::get('/success', function () {
    return 'Paiement réussi !';
});
Route::get('/cancel', function () {
    return 'Paiement annulé.';
});

require __DIR__.'/auth.php';




// use Carbon\Carbon;

// $userCreatedAt = auth()->user()->created_at; // Date de création de l'utilisateur
// $futureDate = $userCreatedAt->addDays(15); // Ajouter 15 jours

// if ($futureDate->isPast()) {
//     echo "Les 15 jours sont passés.";
// } else {
//     echo "Il reste encore du temps.";
// }
