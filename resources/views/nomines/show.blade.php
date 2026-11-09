@extends('layout')

@section('title', 'Détails du Nominé')

@section('content')
    <div style="max-width: 800px; margin: auto; text-align: center;">
        <h1 style="color: #FFD700; margin-bottom: 30px;">🎙️ Détails du Nominé</h1>

        <div style="background-color: #111; border: 2px solid #FFD700; padding: 30px; border-radius: 16px; box-shadow: 0 0 15px #FFD70044;">
            <!-- Image -->
            @if($nomine->image)
                <img src="{{ asset('storage/' . $nomine->image) }}" alt="Image du nominé" style="max-width: 100%; height: auto; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 0 10px #FFD70099;">
            @endif

            <!-- Infos -->
            <h2 style="color: #FFD700;">{{ $nomine->nom }}</h2>
            <p style="color: #eee; font-size: 1.2rem; margin-top: 10px;">
                🏷️ <strong>Catégorie :</strong> {{ $nomine->categorie }}
            </p>

            <!-- Lien YouTube -->
            @if($nomine->lien)
                <div style="margin-top: 25px;">
                    <iframe width="100%" height="360"
                        src="{{ Str::replace('watch?v=', 'embed/', $nomine->lien) }}"
                        frameborder="0" allowfullscreen
                        style="border-radius: 12px;"></iframe>
                </div>
            @endif

            <!-- Bouton retour -->
            <div style="margin-top: 30px;">
                <a href="{{ url('/nomines') }}" class="btn">← Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection
