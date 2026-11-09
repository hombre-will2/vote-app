<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nomine;
use App\Models\Vote;

class VoteController extends Controller
{
    // Affiche la page de vote avec la liste des nominés
    public function show()
    {
        $nomines = Nomine::paginate(10); // ou ->all()
        return view('vote', compact('nomines'));
    }

    // Traite le vote du public
    public function submit(Request $request)
    {
        $request->validate([
            'nomine_id' => 'required|exists:nomines,id',
            'email' => 'nullable|email',
        ]);

        $ip = $request->ip();
        $email = $request->email;

        // Empêche le double vote (même IP ou même email)
        $hasVoted = Vote::where('nomine_id', $request->nomine_id)
            ->where(function($query) use ($ip, $email) {
                $query->where('ip', $ip);
                if ($email) {
                    $query->orWhere('email', $email);
                }
            })
            ->exists();

        if ($hasVoted) {
            return redirect()->back()->with('success', 'Vous avez déjà voté pour ce nominé.');
        }

        Vote::create([
    'candidate_id' => $request->candidate_id, // ou une autre valeur valide
    'email' => $email,
]);


        return redirect()->back()->with('success', 'Votre vote a été enregistré avec succès.');
    }

    // Affiche les résultats
    public function results()
    {
        $candidates = Nomine::withCount('votes')->orderByDesc('votes_count')->get();
        return view('votes.results', compact('candidates'));
    }
}
