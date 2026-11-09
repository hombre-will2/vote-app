<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NomineController;
use App\Http\Controllers\Admin\VoteController as AdminVoteController;
use App\Http\Controllers\Admin\ResultatController as AdminResultatController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\PreNominationController as AdminPreNominationController;

use App\Http\Controllers\PreNominationController;
use App\Http\Controllers\NomineController as PublicNomineController;
use App\Http\Controllers\VoteController;

// --- 📌 Pages publiques ---
Route::view('/', 'welcome')->name('accueil');
Route::view('/categories', 'categories')->name('categories');
Route::view('/contribuer', 'contribuer')->name('contribuer');

// --- ✍️ Pré-nominations publiques ---
Route::get('/pre-nominations', [PreNominationController::class, 'index'])->name('pre-nominations');
Route::post('/pre-nominations/submit', [PreNominationController::class, 'submit'])->name('pre-nominations.submit');

// --- 🗳️ Vote public ---
Route::get('/vote', [VoteController::class, 'show'])->name('vote');
Route::post('/vote', [VoteController::class, 'submit'])->name('vote.submit');

// --- 👥 Nominés publics ---
Route::get('/nomines', [PublicNomineController::class, 'index'])->name('nomines.index');
Route::get('/nomines/{nomine}', [PublicNomineController::class, 'show'])->name('nomines.show');

// --- 🏆 Résultats publics ---
Route::get('/resultats', [AdminResultatController::class, 'index'])->name('resultats');

// --- 🔐 Connexion Admin ---
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

// --- ⚙️ Zone sécurisée Admin ---
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // 📁 Gestion des nominés
    Route::resource('nomines', NomineController::class);

    // ✍️ Pré-nominations (Admin)
    Route::get('/pre-nominations', [AdminPreNominationController::class, 'index'])->name('pre-nominations.index');

    // 🗳️ Votes
    Route::get('/votes', [AdminVoteController::class, 'index'])->name('votes.index');

    // 🏆 Résultats
    Route::get('/resultats', [AdminResultatController::class, 'index'])->name('resultats.index');

    // 🚪 Déconnexion
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});
