<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nomine;
use App\Models\Vote;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalNomines = Nomine::count();
        $totalVotes = Vote::count();
        $nomine = Nomine::first(); // Peut être utile si tu veux préremplir ou tester

        return view('admin.dashboard', compact('totalNomines', 'totalVotes', 'nomine'));
    }
}
