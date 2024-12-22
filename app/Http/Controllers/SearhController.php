<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;

class SearhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories= categories::all();
        $search = $request->input('search');
        $resultat = articles::where('title', 'like', '%'.$search.'%')->get();

        return view('home.search', compact('categories','resultat'));
    }

    /**
     * Show the form for searching a article.
     */
    public function article(Request $request)
    {
        $categorie= categories::all();
        $article = $request->input('article');
        $resultat = articles::where('title', 'like', '%'.$article.'%')->get();
        // dd($resultat);
        return view('admin.articles.search', compact('categorie','article','resultat'));
    }

    /**
     * Show the form for searching a user.
     */
    public function user(Request $request)
    {
        $user = $request->input('user');
        $resultat = User::where('prename', 'like', '%'.$user.'%')->get();
        // dd($resultat);
        return view('admin.users.search', compact('user','resultat'));
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
