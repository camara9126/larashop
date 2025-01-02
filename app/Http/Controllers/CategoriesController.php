<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required','string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgCategories', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation du categorie
        $categories= categories::create([
            'name' => $request->name,
            'image' => $path,
        ]);
        // dd($categories);
        return redirect()->route('categories.index', compact('categories'))->with('success', 'Categorie crée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie= categories::findOrFail($id);
        $articles= articles::where('reponse',0)->get();
        // dd($categorie);
        return view('home.categorie', compact('articles','categorie'));
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
    public function destroy( $categories)
    {
        $categories=Categories::FindOrFail($categories);
        $categories->delete();

        return redirect()->back()->with('success', 'Categorie supprimé avec success');
    }
}
