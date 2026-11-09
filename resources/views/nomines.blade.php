@extends('layout')

@section('title', 'Nominés')

@section('content')
    <div style="text-align: center;">
        <h1 style="color: #C49000; font-weight: 900; font-size: 2.8rem; margin-bottom: 10px;">Nominés 2025</h1>
        <p style="max-width: 700px; margin: 0 auto 40px; font-size: 1.2rem; color: #ccc;">
            Découvrez les artistes sélectionnés dans chaque catégorie pour les LMG Ivoire Awards.
        </p>
    </div>

 
    @foreach ($nominations as $categorie => $nomines)
        <section style="margin-top: 60px; text-align: center;">
            <h2 style="color: #C49000; font-weight: 700; font-size: 1.8rem; margin-bottom: 20px;">
                {{ $categorie }}
            </h2>
            <div style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
                @foreach ($nomines as $nomine)
                    <div style="background-color: #111; border: 3px solid #C49000; border-radius: 15px; padding: 20px; width: 280px; box-shadow: 0 0 15px #C4900088; transition: transform 0.3s ease, box-shadow 0.3s ease; text-align: center;">
                        <img src="{{ asset('images/nomines/' . $nomine['image']) }}" alt="{{ $nomine['nom'] }}" 
                             style="width: 100%; height: 180px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; box-shadow: 0 0 10px #C4900099;">
                        <h3 style="color: #eee; font-weight: 700; font-size: 1.25rem; margin-bottom: 15px;">
                            {{ $nomine['nom'] }}
                        </h3>
                        <a href="{{ $nomine['lien'] }}" target="_blank" 
                           style="display: inline-block; background: #C49000; color: #111; font-weight: 700; padding: 12px 30px; border-radius: 50px; text-decoration: none; box-shadow: 0 5px 15px #7a650044; transition: background 0.3s ease;">
                           🎧 Écouter
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
@endsection
