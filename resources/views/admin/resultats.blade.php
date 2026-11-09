@extends('layout')

@section('title', 'Résultats des Votes')

@section('content')
<div style="background-color: #000; min-height: 100vh; padding: 40px 20px; color: white; font-family: Arial, sans-serif;">
    <div style="max-width: 1000px; margin: auto;">

        <h1 style="text-align: center; color: #C49000;">📊 Résultats des Votes</h1>

        @if ($resultats->isEmpty())
            <p style="text-align: center; margin-top: 40px; color: gray;">Aucun résultat pour le moment.</p>
        @else
            <table style="width: 100%; margin-top: 40px; border-collapse: collapse; background: #111; box-shadow: 0 0 15px #C4900044;">
                <thead>
                    <tr style="background: #C49000; color: black;">
                        <th style="padding: 12px;">#</th>
                        <th style="padding: 12px;">Nom du Nominé</th>
                        <th style="padding: 12px;">Catégorie</th>
                        <th style="padding: 12px;">Votes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultats as $index => $nomine)
                        <tr style="text-align: center; border-top: 1px solid #444;">
                            <td style="padding: 12px;">{{ $index + 1 }}</td>
                            <td style="padding: 12px;">{{ $nomine->nom }}</td>
                            <td style="padding: 12px;">{{ $nomine->categorie }}</td>
                            <td style="padding: 12px; font-weight: bold; color: #C49000;">{{ $nomine->votes_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('admin.dashboard') }}" class="btn" 
               style="padding: 12px 25px; background-color: #C49000; color: black; border-radius: 8px; text-decoration: none; font-weight: bold; box-shadow: 0 0 8px #C49000cc;">
                ⬅ Retour au Dashboard
            </a>
        </div>

    </div>
</div>
@endsection
