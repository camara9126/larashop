<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\articles;
use App\Services\PayTech;
// use App\Http\Controllers\Auth;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $categories = categories::all();
        if(Auth::user()->statut == 'admin') {
            $articlesA = Articles::orderBy('created_at', 'DESC')->get();
            return view('admin.articles.index',compact('articlesA', 'categories'));
        } else {
            $articlesC = Articles::where(['user_id'=>Auth::user()->id])->get();
            return view('articles.index',compact('articlesC', 'categories'));
        }
            

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = categories::all();
        return view('articles.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required','string',
            'content' => 'required',
            'price' => 'required',
            'category_id' => 'required', 'exists:categories,id',
            'contact' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgArticles', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // Préparer les données de l'article dans une variable
        $articleData = [
            'title' => $request['title'],
            'description' => $request['content'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
        ];
        
        // creation de l'article
        $articles= Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'contact' => $request->contact,
            'image' => $path,
            'stock' => $request->stock,
            'user_id' => $request->user_id,
        ]);

        // dd($articles);
        return redirect()->route('article.index', compact('articles'))->with('success', 'Article crée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show($articles)
    {
        $users= User::where('statut','client')->get();
        $articles= Articles::findOrFail($articles);
        $categories = categories::all();

    return view('articles.show', compact('articles', 'categories', 'users'));
    }
        

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($articles)
    {
        $articles= Articles::findOrFail($articles);
        $categories= categories::all();
        return view('articles.edit', compact('articles', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $articles)
    {
        $articles= Articles::findOrFail($articles);
        $request->validate([
            'title' => 'required','string',
            'content' => 'required',
            'price' => 'required',
            'category_id' => 'required', 'exists:categories,id',
            'contact' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
        ]);
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgArticles', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation de l'article
        $articles->update([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'contact' => $request->contact,
            'image' => $path,
            'stock' => $request->stock,
            'user_id' => $request->user_id,
        ]);

        // dd($request);
        return redirect()->route('article.index', compact('articles'))->with('success', 'Article modifié avec success.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($articles)
    {
        $articles= Articles::findOrFail($articles);
        $articles->delete();
        return redirect()->back()->with('success', 'Article supprimé avec success');
    }

    /**
     * Activation d'un article par l'admin.
     */
    public function activate($articles)
    {
        $articles= articles::FindOrFail($articles);
        $articles->update(['reponse'=> 0]);
        // dd($articles);
        return redirect()->route('paiement');
        // return redirect()->back()->with('success', 'Article approuvé avec succès.');
    }

    /**
     * Desactivation d'un article par l'admin.
     */
    public function desactivate($articles)
    {
        $articles= articles::FindOrFail($articles);
        $articles->update(['reponse' => 1]);
        // dd($articles);
        return redirect()->back()->with('success', 'Article rejeté avec succès.');
    }

    public function makePayment(PayTech $paytech, articles $art)
    {
        // Crée une instance de PayTech avec les clés de l'API
        $response = new \App\Services\PayTech(env('PAYTECH_API_KEY'), env('PAYTECH_API_SECRET'));

        // Création du ref_command avec la date et le matricule du client
        $ref_command = Carbon::now()->format('YmdHis') . '-' . Auth::user()->matricule;

        // Récupération du prix de l'article
        $price = $art->price*(10/100); // Accède directement au prix
        // dd($price); // Vérifie que le prix est correctement récupéré

        // Configuration pour PayTech
        $response = $paytech->setQuery([
            'item_name' => 'Paiement chez UAS-BC',
            'item_price' => $price,
            'command_name' => ': Paiement article ' . Carbon::now()->format('YmdHis') . ' : ' . Auth::user()->prename . '-' . Auth::user()->name . ' chez UAS-BC',
        ])
        ->setRefCommand($ref_command) // Ajoute la référence
        ->setNotificationUrl([        
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
            'ipn_url' => url('https://uasbc.net/ipn'),
        ])
        ->send();

        if ($response['success'] === 1) {
            return redirect($response['redirect_url']); // Redirige vers PayTech pour le paiement
        }

        return response()->json($response); // Montre l'erreur du transfert
    }


    /**
     * visualisation de tous les articles d'un user.
     */
    public function articles($id)
    {        
        $articles= articles::where('user_id', $id)->get();
        $user= User::findOrFail($id);
        $categories= categories::all();        
        // dd($user);
        return view('admin.users.show', compact('articles','categories','user'));
    }
}
