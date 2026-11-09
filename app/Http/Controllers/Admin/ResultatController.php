<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nomine;

class AdminController extends Controller

{
    /**
     * Affiche les résultats des votes triés par nombre décroissant
     */
    public function resultats()
    {
        $resultats = Nomine::withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get();

        return view('admin.resultats', compact('resultats'));
    }

    /**
     * Affiche le tableau de bord admin
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * (Facultatif) Alias de resultats() si besoin
     */
    public function afficherResultats()
    {
        return $this->resultats();
    }
}
