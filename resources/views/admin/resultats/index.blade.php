@extends('layout')

@section('title', 'Résultats des Votes')

@section('content')
<div style="max-width: 1000px; margin: auto; padding: 40px; color: white;">
    <h1 style="text-align: center; color: #C49000;">📊 Résultats des Votes</h1>

    @if ($resultats->isEmpty())
        <p style="text-align: center; color: #aaa; margin-top: 40px;">Aucun vote enregistré pour le moment.</p>
    @else
        <div style="overflow-x: auto; margin-top: 30px;">
            <table style="width: 100%; border-collapse: collapse; background: #111; color: #eee; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(196,144,0,0.2);">
                <thead>
                    <tr style="background-color: #C49000; color: #000;">
                        <th style="padding: 14px;">#</th>
                        <th style="padding: 14px;">🎤 Nominé</th>
                        <th style="padding: 14px;">🏷️ Catégorie</th>
                        <th style="padding: 14px;">🗳️ Total des Votes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultats as $index => $nomine)
                        <tr style="text-align: center; border-bottom: 1px solid #333;">
                            <td style="padding: 12px;">{{ $index + 1 }}</td>
                            <td style="padding: 12px;">{{ $nomine->nom }}</td>
                            <td style="padding: 12px;">{{ $nomine->categorie }}</td>
                            <td style="padding: 12px; font-weight: bold; color: #C49000;">
                                {{ $nomine->votes_count }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
