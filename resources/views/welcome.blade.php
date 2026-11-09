@extends('layout')

@section('title', 'Accueil')

@section('content')

<!-- Bannière avec logo et date -->
<section style="width: 100%; background: linear-gradient(90deg, #000000cc 0%, #C49000cc 100%);
    color: #fff; padding: 10px 20px; text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden;">

    <img src="{{ asset('images/logo.png') }}" alt="Logo LMG"
         style="height: 180px; object-fit: contain; max-width: 100%; margin-bottom: 0px;">

    <h1 style="font-size: 2.5rem; font-weight: 800; letter-spacing: 2px; text-shadow: 0 0 10px #C49000;">
        LMG Ivoire Awards 2025 1ère Édition
    </h1>

    <h2 style="color: #C49000; font-size: 1.5rem; margin-bottom: 25px;">
        Novembre 2025
    </h2>

    <p style="max-width: 700px; margin: auto; color: #eee; font-size: 1rem;">
        Le LMG Ivoire Awards est la cérémonie de célébration du gospel urbain ivoirien. <br>
        Parce que ceux qui propagent l’Évangile méritent aussi d’être vus, reconnus et honorés.<br>
        📍 Rendez-vous en novembre 2025 !
    </p>
</section>

<!-- Section 2 : Boutons -->
<section style="width: 100%; padding: 60px 20px; background: #111; text-align: center;">
    <h2 style="color: #C49000; font-size: 1.5rem; font-weight: 700; margin-bottom: 30px;
        text-transform: uppercase; letter-spacing: 1.5px;">
        Participez dès maintenant
    </h2>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px;">
        @php
            $buttons = [
                ['url' => url('/pre-nominations'), 'text' => 'Pré-nomination'],
                ['url' => url('/contribuer'), 'text' => 'Contribuer'],
                ['url' => url('/categories'), 'text' => 'Catégories'],
                ['url' => url('/'), 'text' => 'Vote du public'],
            ];
        @endphp

        @foreach ($buttons as $btn)
            <a href="{{ $btn['url'] }}"
               style="background: linear-gradient(45deg, #C49000, #7a6100);
                      color: #000; font-weight: 700; padding: 16px 32px; border-radius: 50px;
                      box-shadow: 0 5px 15px #7a610033; text-decoration: none;
                      font-size: 1rem; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                {{ $btn['text'] }}
            </a>
        @endforeach
    </div>
</section>

<!-- Vidéo teaser -->
<section style="background: #000; padding: 60px 20px; text-align: center;">
    <h2 style="color: #C49000; font-weight: 700; font-size: 1.5rem; margin-bottom: 30px;
        text-transform: uppercase; letter-spacing: 1.2px;">
        Regardez le teaser
    </h2>
    <div style="max-width: 720px; margin: auto; border: 5px solid #C49000; border-radius: 15px;
        overflow: hidden; box-shadow: 0 0 20px #C49000cc;">
        <iframe width="100%" height="405" src="https://www.youtube.com/embed/VIDEOCODE" frameborder="0"
                allowfullscreen style="display: block; border-radius: 15px;"></iframe>
    </div>
</section>

<!-- Pourquoi les LMG ? -->
<section style="padding: 60px 20px; background: #111; color: #eee;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    max-width: 900px; margin: 60px auto; border-radius: 20px; box-shadow: 0 0 20px #C4900033;">
    <h2 style="color: #C49000; font-weight: 700; font-size: 1.5rem; margin-bottom: 25px; text-align: center;">
        Pourquoi les LMG Ivoire Awards ?
    </h2>
    <p style="font-size: 1rem; line-height: 1.6; text-align: center; padding: 0 15px;">
        Les <strong>LMG Ivoire Awards</strong> sont une plateforme dédiée à la reconnaissance et à la valorisation
        des jeunes talents du gospel urbain en Côte d'Ivoire. À travers un processus participatif et transparent,
        nous mettons en lumière les artistes qui façonnent le futur du gospel ivoirien.
    </p>
</section>

<!-- Partenaires -->
<section style="background: #000; padding: 60px 20px; text-align: center;">
    <h2 style="color: #C49000; font-weight: 700; font-size: 1.5rem; margin-bottom: 40px;
        text-transform: uppercase; letter-spacing: 1.3px;">
        Nos partenaires
    </h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; align-items: center;">
        <img src="{{ asset('images/partenaire1.png') }}" alt="Partenaire 1"
             style="height: 60px; filter: drop-shadow(0 0 5px #C49000);" />
        <img src="{{ asset('images/partenaire2.png') }}" alt="Partenaire 2"
             style="height: 60px; filter: drop-shadow(0 0 5px #C49000);" />
        <img src="{{ asset('images/partenaire3.png') }}" alt="Partenaire 3"
             style="height: 60px; filter: drop-shadow(0 0 5px #C49000);" />
    </div>
</section>

@endsection
