<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;

class AdminVoteController extends Controller
{
    public function index()
    {
        // Statistiques par nominé
        $voteStats = Vote::select('nomine_id')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('nomine_id')
            ->with('nomine')
            ->get();
        $voteStats = Vote::with('nomine')
            ->select('nomine_id')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('nomine_id')
            ->get()
            ->filter(fn($stat) => $stat->nomine !== null);

        // Tous les votes avec nominé
        $votes = Vote::with('nomine')->latest()->get();

        return view('admin.votes.index', compact('voteStats', 'votes'));
    }
}
