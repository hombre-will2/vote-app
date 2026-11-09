<?php
// app/Http/Controllers/NomineController.php

namespace App\Http\Controllers;

use App\Models\Nomine;
use Illuminate\Http\Request;

class NomineController extends Controller
{
    public function index()
    {
        // On récupère tous les nominés groupés par catégorie
        $nominations = Nomine::all()->groupBy('categorie');

        return view('nomines.index', compact('nominations'));
    }
    // app/Http/Controllers/Admin/NomineController.php

    public function edit($id)
    {
        $nomine = Nomine::findOrFail($id);
        return view('admin.nomines.edit', compact('nomine'));
    }

}
