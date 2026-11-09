@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div style="max-width: 1200px; margin: auto; text-align: center; color: #eee;">
    <h1 style="color: #C49000; margin-bottom: 10px;">Tableau de Bord - LMG Admin</h1>
    <p style="font-size: 1.1rem;">
        Bienvenue, <strong>{{ Auth::guard('admin')->user()->name }}</strong> 👋
    </p>

    <!-- Résumés -->
    <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; margin-top: 40px;">
        <!-- Nominés -->
        <div style="background: #111; padding: 25px; border: 2px solid #C49000; border-radius: 16px; width: 260px; text-align: center; box-shadow: 0 0 15px #C4900044;">
            <h3 style="color: #C49000; font-size: 1.3rem;">🎤 Nominés</h3>
            <p style="font-size: 2.4rem; font-weight: bold; color: white;">{{ $totalNomines }}</p>
            <a href="{{ route('admin.nomines.index') }}" class="btn" style="margin-top: 12px; background-color: #C49000; color: #000;">🔧 Gérer</a>
        </div>

        <!-- Votes -->
        <div style="background: #111; padding: 25px; border: 2px solid #C49000; border-radius: 16px; width: 260px; text-align: center; box-shadow: 0 0 15px #C4900044;">
            <h3 style="color: #C49000; font-size: 1.3rem;">🗳️ Votes</h3>
            <p style="font-size: 2.4rem; font-weight: bold; color: white;">{{ $totalVotes }}</p>
            <a href="{{ route('admin.votes.index') }}" class="btn" style="margin-top: 12px; background-color: #C49000; color: #000;">Voir</a>
        </div>

        <!-- Pré-nominations -->
        <div style="background: #111; padding: 25px; border: 2px solid #C49000; border-radius: 16px; width: 260px; text-align: center; box-shadow: 0 0 15px #C4900044;">
            <h3 style="color: #C49000; font-size: 1.3rem;">📋 Pré-nominations</h3>
            <p style="font-size: 2.4rem; font-weight: bold; color: white;">{{ $totalPreNominations ?? '—' }}</p>
            <a href="{{ route('admin.pre-nominations.index') }}" class="btn" style="margin-top: 12px; background-color: #C49000; color: #000;">📂 Voir</a>
        </div>

        <!-- Résultats -->
        <div style="background: #111; padding: 25px; border: 2px solid #C49000; border-radius: 16px; width: 260px; text-align: center; box-shadow: 0 0 15px #C4900044;">
            <h3 style="color: #C49000; font-size: 1.3rem;">📊 Résultats</h3>
            <p style="font-size: 2rem; font-weight: bold; color: white;">✔️</p>
            <a href="{{ route('admin.resultats.index') }}" class="btn" style="margin-top: 12px; background-color: #C49000; color: #000;">📊 Voir</a>
        </div>
    </div>

    <!-- Actions rapides -->
    <section style="margin-top: 60px;">
        <h2 style="color: #C49000; font-size: 1.5rem;">⚡ Actions Rapides</h2>
        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
            <a href="{{ route('admin.nomines.create') }}" class="btn" style="background-color: #C49000; color: #000;">➕ Ajouter un Nominé</a>
            <a href="{{ route('admin.nomines.index') }}" class="btn" style="background-color: #C49000; color: #000;">🛠️ Gérer les Nominés</a>
        </div>
    </section>

    <!-- Déconnexion -->
    <form method="POST" action="{{ route('admin.logout') }}" style="margin-top: 60px;">
        @csrf
        <button type="submit" class="btn" style="background: #222; color: #C49000; border: 1px solid #C49000;">
            🔒 Se déconnecter
        </button>
    </form>
</div>
@endsection
