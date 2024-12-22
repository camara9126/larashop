<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        $users= User::all();
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
        return redirect()->back()->with('success', 'Article approuvé avec succès.');
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

    /**
     * visualisation des details d'un article.
     */
    public function view($slug)
    {
        $articles= articles::where('slug', $slug)->get();
        $categorie= categories::all();
        $articles = Articles::orderBy('click_count', 'desc')->take(4)->get(); // Limite à 4 articles récents
        // dd($articles);
        return view('home.detail', compact('articles','categories'));
    }
}
