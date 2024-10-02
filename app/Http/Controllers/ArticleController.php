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
        return view('articles.index');
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
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
        ]);

        // Gestion des l'images
        if ($request->hasFile('image')) {
            // Stockage de l'image dans le dossier 'public/images'
            $imagePath = $request->file('image')->store('imgArticles', 'public');
        }
        if ($request->hasFile('image2')) {
            // Stockage de l'image2 dans le dossier 'public/images'
            $imagePath = $request->file('image2')->store('imgArticles', 'public');
        }
        if ($request->hasFile('image3')) {
            // Stockage de l'image3 dans le dossier 'public/images'
            $imagePath = $request->file('image3')->store('imgArticles', 'public');
        }

        // creation de l'article
        $articles= articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'image2' => $imagePath,
            'image3' => $imagePath,
            'stock' => $request->stock,
            'user_id' => $request->user_id,
        ]);

        // dd($request);
        return redirect()->route('article.index', compact('articles'))->with('success', 'Article cree avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
