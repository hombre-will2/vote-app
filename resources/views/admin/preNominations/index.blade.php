@extends('layout')

@section('title', 'Pré-nominations reçues')

@section('content')
    <div style="max-width: 1000px; margin: auto;">
        <h1 style="text-align: center; color: #C49000;">📥Liste des Prénomination</h1>

        @if($prenominations->isEmpty())
            <p style="text-align: center; margin-top: 30px; color: #eee;">Aucune pré-nomination enregistrée pour l’instant.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; margin-top: 30px; background-color: #111; color: white;">
                <thead>
                    <tr style="background-color: #C49000; color: black;">
                        <th style="padding: 10px;">#</th>
                        <th style="padding: 10px;">Artiste</th>
                        <th style="padding: 10px;">Catégorie</th>
                        <th style="padding: 10px;">Lien</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Soumis par</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prenominations as $index => $pre)
                        <tr style="border-top: 1px solid #444;">
                            <td style="padding: 10px;">{{ $index + 1 }}</td>
                            <td style="padding: 10px;">{{ $pre->nom_artiste }}</td>
                            <td style="padding: 10px;">{{ $pre->categorie }}</td>
                            <td style="padding: 10px;"><a href="{{ $pre->lien }}" target="_blank" style="color: #FFD700;">Voir</a></td>
                            <td style="padding: 10px;">
                                @if($pre->image)
                                    <img src="{{ asset('uploads/pre-nominations/' . $pre->image) }}" alt="Image" style="height: 60px; border-radius: 5px;">
                                @else
                                    <span style="color: #aaa;">—</span>
                                @endif
                            </td>
                            <td style="padding: 10px;">{{ $pre->nom_proposant ?? '—' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
