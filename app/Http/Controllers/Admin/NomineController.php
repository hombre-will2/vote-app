<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nomine;
use Illuminate\Support\Facades\DB;

class NomineController extends Controller
{
    // Dashboard admin
    public function dashboard()
    {
        $totalNomines = Nomine::count();
        $totalVotes = DB::table('votes')->count();

        return view('admin.dashboard', compact('totalNomines', 'totalVotes'));
    }

    // Liste des nominés
    public function index()
    {
        $nomines = Nomine::all();

        // Regroupement par catégorie
        $nominations = $nomines->groupBy('categorie');

        return view('admin.nomines.index', compact('nominations'));
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('admin.nomines.create');
    }

    // Enregistrement d'un nouveau nominé
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'lien' => 'nullable|url',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['nom', 'categorie', 'lien']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('nomines', 'public');
        }

        Nomine::create($data);

        return redirect()->route('admin.nomines.index')->with('success', 'Nominé ajouté avec succès.');
    }

    // Voir un nominé
    public function show(Nomine $nomine)
    {
        return view('admin.nomines.show', compact('nomine'));
    }

    // Formulaire de modification
    public function edit(Nomine $nomine)
    {
        return view('admin.nomines.edit', compact('nomine'));
    }

    // Mise à jour d’un nominé
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'lien' => 'nullable|url',
            'image' => 'nullable|image|max:2048'
        ]);

        $nomine = Nomine::findOrFail($id);
        $nomine->nom = $request->nom;
        $nomine->categorie = $request->categorie;
        $nomine->lien = $request->lien;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('nomines', 'public');
            $nomine->image = $path;
        }

        $nomine->save();

        return redirect()->route('admin.nomines.index')->with('success', 'Nominé mis à jour avec succès.');
    }

    // Supprimer un nominé
    public function destroy(Nomine $nomine)
    {
        $nomine->delete();
        return redirect()->route('admin.nomines.index')->with('success', 'Nominé supprimé avec succès.');
    }
}

