<?php

use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearhController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;

Route::get('/', function () {
    return view('home.index');
});



// A propos de nous 
Route::get('/apropos', function () {
    $categories= categories::all();
    return view('pages.apropos', compact('categories'));
})->name('apropos');

// Notre politique et condition 
Route::get('/politique', function () {
    $categories= categories::all();
    return view('pages.politique', compact('categories'));
})->name('politique');

// Notre contact
Route::get('/contact', function () {
    $categories= categories::all();
    return view('pages.contact', compact('categories'));
})->name('contact');

// Mesure securite 
Route::get('/securite', function () {
    $categories= categories::all();
    return view('pages.securite', compact('categories'));
    });

// recherche
Route::resource('/search', SearhController::class);
// recherche artile par l'admin 
Route::get('/searchArticle', [SearhController::class, 'article'])->middleware('auth','verified')->name('search.article');
// recherche utilisateur par l'admin
Route::get('/searchUser', [SearhController::class, 'user'])->middleware('auth','verified')->name('search.user');

// deatail d'un article
Route::get('/detail', function () {
    return view('home.detail');
});    

// Liste de tous les Utilisateurs 
Route::get('/users/all',[RegisteredUserController::class, 'all'])->name('users.all')->middleware(['auth', 'verified']);
Route::get('/users/rgm',[RegisteredUserController::class, 'userReglement'])->name('users.rgm')->middleware(['auth', 'verified']);

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
Route::get('/article/{articles}/articles',[ArticleController::class, 'articles'])->name('article.articles')->middleware(['auth', 'verified']);
Route::get('/article/{articles}',[ArticleController::class, 'destroy'])->name('article.destroy')->middleware(['auth', 'verified']);
Route::get('/article/{articles}/edit',[ArticleController::class, 'edit'])->name('article.edit')->middleware(['auth', 'verified']);
Route::post('/article/{articles}',[ArticleController::class, 'update'])->name('article.update')->middleware(['auth', 'verified']);

// Detail article 
Route::get('/view/{articles}', function ($slug) {
    $articles= articles::where('slug', $slug)->firstOrFail();
    $articles->increment('click_count');
    $categories= categories::all();
    $catArticles= articles::where('reponse',0)->get();
    $vendeur= User::where('statut','client')->get();
    // dd($articles);
    return view('home.detail', compact('articles','categories','catArticles','vendeur'));
})->name('article.view');

// activer/desactiver un article 
Route::patch('/article/{articles}/activate', [ArticleController::class, 'activate'])->name('articles.activate')->middleware(['auth', 'verified']);
Route::patch('/article/{articles}/desactivate', [ArticleController::class, 'desactivate'])->name('articles.desactivate')->middleware(['auth', 'verified']);

// paiement article
Route::patch('/article/{art}/makePayment', [ArticleController::class, 'makePayment'])->name('paiement')->middleware(['auth', 'verified']);
Route::get('/success', function () {

    // $user= User::where('id', Auth::user()->id)->first();
    // $user->update(['paiement' => 1]);
    $article= articles::where('reponse',1)->first();
    $article->update(['reponse'=> 0]);
        // dd($article);
    return view('dashboard.paiements.success');
    // return 'Paiement réussi !';
});

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
Route::get('categories/{id}',[CategoriesController::class, 'show'])->name('categories.show');


// Payment Paytech 
Route::get('/abonnement', function () {
    return view('dashboard.abonnement');
})->middleware(['auth', 'verified'])->name('abonne');

Route::get('/cancel', function () {
    
    return view('dashboard.paiements.cancel');
    // return 'Paiement annulé.';
});

Route::post('/ipn-listener', function (Request $request) {
    // Lire les données envoyées par le prestataire
    $data = $request->all();

    // Vérifier la signature pour confirmer l'origine (important pour la sécurité)
    if ($data['signature'] === hash_hmac('sha256', $data['transaction_id'], 'votre_cle_secrete')) {

        return response('IPN reçu et traité', 200);
    }

    return response('Échec de la validation IPN', 400);
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
