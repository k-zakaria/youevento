<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('dashboard.category', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Categorie::create($request->all());

        return redirect()->back()->with('success', 'Category created successfully');
    }


    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $categorie->update($request->all());

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
