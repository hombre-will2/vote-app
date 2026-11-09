@extends('layout')

@section('title', 'Contribuer')

@section('content')
    <div style="background: #000000; padding: 40px 20px; min-height: 100vh; color: white; font-family: Arial, sans-serif;">

        <h1 style="color: #B8860B; font-weight: 900; font-size: 2.8rem; margin-bottom: 15px; text-align: center;">
            Contribuez aux LMG Ivoire Awards
        </h1>

        <p style="max-width: 700px; margin: 0 auto 40px; font-size: 1.2rem; line-height: 1.6; color: #e0e0e0; text-align: center;">
            Soutenez la célébration des talents du gospel urbain ivoirien ! Que ce soit par un don, un sponsoring ou une aide matérielle, chaque geste compte pour faire briller cette grande fête.
        </p>

        <!-- Baromètre de collecte -->
        <section style="margin: 40px auto; max-width: 550px; background: #111; padding: 30px; border-radius: 16px; box-shadow: 0 0 20px #B8860Bcc; text-align: center;">
            <h2 style="color: #B8860B; font-weight: 700; font-size: 1.6rem;">Objectif de collecte</h2>
            @php
                $objectif = 5000000;
                $atteint = 1875000;
                $pourcentage = min(100, ($atteint / $objectif) * 100);
            @endphp

            <div style="background: #333; height: 30px; border-radius: 30px; overflow: hidden; margin-top: 25px; box-shadow: inset 0 0 5px #000;">
                <div id="progress-bar"
                     style="width: 0; background: linear-gradient(90deg, #D4AF37, #B8860B);
                            height: 100%; border-radius: 30px; transition: width 2s ease;"></div>
            </div>

            <p style="margin-top: 15px; font-size: 1.1rem; color: #f1e7c0;">
                <strong>{{ number_format($atteint, 0, ',', ' ') }} FCFA</strong> collectés sur <strong>{{ number_format($objectif, 0, ',', ' ') }} FCFA</strong>
            </p>
        </section>

        <!-- Moyens de paiement -->
        @php
            $paiements = [
                ['titre' => 'Orange Money', 'contact' => '+225 07 07 07 07 07', 'image' => 'orange.png'],
                ['titre' => 'Moov Money', 'contact' => '+225 01 01 01 01 01', 'image' => 'moov.png'],
                ['titre' => 'Wave', 'contact' => '+225 05 05 05 05 05', 'image' => 'logowave.png'],
                ['titre' => 'PayPal', 'contact' => 'paypal.me/tonlien', 'lien' => 'https://paypal.me/tonlien', 'image' => 'paypal.png'],
            ];
        @endphp

        <section style="margin: 60px auto; max-width: 900px;">
            <h2 style="color: #B8860B; text-align: center; font-weight: 800; font-size: 1.8rem; margin-bottom: 30px;">
                Soutenez-nous avec :
            </h2>

            <div style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
                @foreach ($paiements as $pay)
                    <div style="background: #1a1a1a; padding: 25px 20px; border-radius: 14px; width: 230px;
                                box-shadow: 0 0 20px #B8860B33; color: #fff; text-align: center;
                                transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;"
                         onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 0 25px #B8860B';"
                         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 20px #B8860B33';">

                        <!-- Logo -->
                        <img src="{{ asset('images/' . $pay['image']) }}"
                             alt="{{ $pay['titre'] }}"
                             onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';"
                             style="height: 60px; margin-bottom: 15px; filter: drop-shadow(0 0 3px #B8860B);">

                        <!-- Titre -->
                        <h3 style="color: #B8860B; margin-bottom: 12px; font-weight: 700;">
                            {{ $pay['titre'] }}
                        </h3>

                        <!-- Contact -->
                        @if(isset($pay['lien']))
                            <p>
                                <a href="{{ $pay['lien'] }}" target="_blank"
                                   style="color: #B8860B; text-decoration: underline;">
                                   {{ $pay['contact'] }}
                                </a>
                            </p>
                        @else
                            <p>{{ $pay['contact'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <p style="text-align: center; font-size: 1.1rem; margin-top: 60px; color: #fff5cc;">
            🙏 Merci pour votre générosité et votre engagement à faire rayonner la musique gospel ivoirienne !
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('progress-bar').style.width = '{{ $pourcentage }}%';
        });
    </script>
@endsection
