<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\PreNomination;


class AdminController extends Controller
{
 
public function showLoginForm()
{
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard'); // empêche accès à login si déjà connecté
    }

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

    public function voirPreNominations()
{
    $prenominations = PreNomination::latest()->get();
    return view('admin.pre_nominations.index', compact('prenominations'));
}
}


