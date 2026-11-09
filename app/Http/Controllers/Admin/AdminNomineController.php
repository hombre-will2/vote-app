<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nomine;

class AdminNomineController extends Controller
{
    public function index()
    {
        $nomines = Nomine::all();
        return view('admin.nomines.index', compact('nomines'));
    }

    public function create()
    {
        return view('admin.nomines.create');
    }

    public function store(Request $request)
    {
        Nomine::create($request->validate([
            'nom' => 'required|string',
            'categorie' => 'required|string'
        ]));

        return redirect()->route('admin.nomines.index')->with('success', 'Nominé ajouté avec succès');
    }

    public function edit(Nomine $nomine)
    {
        return view('admin.nomines.edit', compact('nomine'));
    }

    public function update(Request $request, Nomine $nomine)
    {
        $nomine->update($request->validate([
            'nom' => 'required|string',
            'categorie' => 'required|string'
        ]));

        return redirect()->route('admin.nomines.index')->with('success', 'Nominé mis à jour');
    }

    public function destroy(Nomine $nomine)
    {
        $nomine->delete();
        return back()->with('success', 'Nominé supprimé');
    }
}
