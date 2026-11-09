<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nomine;

class AdminResultatController extends Controller
{
    public function index()
    {
        // Récupère les nominés avec leur nombre de votes, triés par votes décroissants
        $resultats = Nomine::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        return view('admin.resultats.index', compact('resultats'));
    }
}
