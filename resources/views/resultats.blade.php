@extends('layout')

@section('title', 'Résultats')

@section('content')
<div style="max-width: 1000px; margin: auto; padding: 40px; background-color: #000; color: #eee; font-family: Arial, sans-serif; min-height: 80vh;">
    <h1 style="text-align: center; color: #C49000; margin-bottom: 30px;">📊 Résultats des Votes</h1>
    
    @if ($resultats->isEmpty())
        <p style="text-align: center; color: #777; margin-top: 40px;">Aucun résultat pour le moment.</p>
    @else
        <table style="width: 100%; border-collapse: collapse; background: #111; box-shadow: 0 0 15px #C4900033;">
            <thead>
                <tr style="background: #C49000; color: #000;">
                    <th style="padding: 12px;">#</th>
                    <th style="padding: 12px;">Nom du Nominé</th>
                    <th style="padding: 12px;">Catégorie</th>
                    <th style="padding: 12px;">Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultats as $index => $nomine)
                    <tr style="text-align: center; border-top: 1px solid #333;">
                        <td style="padding: 10px;">{{ $index + 1 }}</td>
                        <td style="padding: 10px;">{{ $nomine->nom }}</td>
                        <td style="padding: 10px;">{{ $nomine->categorie }}</td>
                        <td style="padding: 10px; font-weight: bold; color: #C49000;">{{ $nomine->votes_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
