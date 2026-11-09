<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}

namespace App\Http\Controllers;

use App\Models\Nomine;

class AdminController extends Controller
{
    public function resultats()
    {
        // On récupère tous les nominés avec leur nombre de votes
        $resultats = Nomine::withCount('votes')->orderBy('votes_count', 'desc')->get();

        // On retourne la vue avec la variable $resultats
        return view('admin.resultats', compact('resultats'));
    }
}
