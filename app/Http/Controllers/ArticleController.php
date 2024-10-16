<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::all();
        $categories = categories::all();
        return view('articles.index',compact('articles','categories'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            // Stockage de l'image dans le dossier 'public/images'
            $imagePath = $request->file('image')->store('imgArticles', 'public');
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation de l'article
        $articles= Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
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
        $articles= Articles::findOrFail($articles);
        $categories= categories::all();
        return view('articles.show', compact('articles','categories'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($articles)
    {
        $articles= Articles::findOrFail($articles);
        return view('articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $articles)
    {
        $articles= Articles::findOfFail($articles);
        $request->validate([
            'title' => 'required','string',
            'content' => 'required',
            'price' => 'required',
            'category_id' => 'required', 'exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            // Stockage de l'image dans le dossier 'public/images'
            $imagePath = $request->file('image')->store('imgArticles', 'public');
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation de l'article
        $articles= Articles::updated([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'stock' => $request->stock,
            'user_id' => $request->user_id,
        ]);

        // dd($articles);
        return redirect()->route('article.index', compact('articles'))->with('success', 'Article crée avec success.'); 
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
}
