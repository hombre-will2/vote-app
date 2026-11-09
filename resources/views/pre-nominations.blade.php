@extends('layout')

@section('title', 'Pré-nominations')

@section('content')
    <div style="text-align: center; max-width: 700px; margin: auto;">

        <h1 style="color: #C49000; margin-bottom: 10px;">🎤 Pré-nominations</h1>
        <p style="color: #eee; margin-bottom: 30px;">
            Soumettez un artiste ou un titre pour les <strong>LMG Ivoire Awards</strong> dans la catégorie de votre choix.
        </p>

        @if(session('success'))
            <div style="background-color: #1a1a1a; border: 1px solid #C49000; color: #C49000; padding: 15px; border-radius: 10px; margin-top: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background-color: #111; padding: 20px; border-left: 5px solid #C49000; color: #ddd; margin-bottom: 30px; text-align: left; border-radius: 8px;">
            <h3 style="color: #C49000;">✍️ Pourquoi des pré-nominations ?</h3>
            <p>
                Les pré-nominations sont ouvertes à tout artiste, manager ou représentant souhaitant soumettre un talent
                qui, selon lui, mérite une place dans une ou plusieurs catégories.
            </p>
            <p>
                L’objectif est simple : nous permettre de découvrir ceux que nous pourrions ne pas avoir repérés.
                Car même si notre équipe suit activement la scène, nous savons que des pépites passent parfois sous les radars.
            </p>
            <p>
                Si vous croyez en un projet, un son, un clip ou un artiste, faites-nous signe.
            </p>
            <p style="color: #C49000; font-weight: bold;">
                ⚠️ La pré-nomination ne garantit pas une nomination finale, mais elle nous aide à être plus justes et représentatifs.
            </p>
        </div>

        <div style="background-color: #1e1e1e; border-left: 5px solid #C49000; color: #fff; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
    <strong>📅 Période éligible :</strong><br>
    Les œuvres, clips, projets ou collaborations pris en compte pour les <strong>LMG Ivoire Awards 2025</strong> doivent être sortis entre le <strong>1er juillet 2024</strong> et le <strong>31 juillet 2025</strong>.<br>
    <span style="color: #C49000; font-weight: bold;">Toute production en dehors de cette période ne pourra pas être considérée.</span>
</div>

        <form action="{{ route('pre-nominations.submit') }}" method="POST"
              style="background: #111; padding: 30px; border-radius: 20px; box-shadow: 0 0 15px #C4900055;">
            @csrf

            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Nom de l’artiste *</label><br>
                <input type="text" name="nom_artiste" required
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Lien vers le son ou clip *</label><br>
                <input type="url" name="lien" required placeholder="https://..."
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

                    <div style="text-align: left; margin-bottom: 20px;">
            <label style="color: #C49000; font-weight: bold;">Catégorie proposée *</label><br>

    <a href="{{ url('/categories') }}" target="_blank"
       style="font-size: 0.9rem; color: #C49000; text-decoration: underline; display: inline-block; margin: 8px 0 12px; text-align: center;">
        ❓ Voir la description des catégories
    </a>

    <select name="categorie" required
            style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
        <option value="" disabled selected>-- Choisissez une catégorie --</option>
        <option value="Révélation de l’année">Révélation de l’année</option>
        <option value="Artiste masculin de l’année">Artiste masculin de l’année</option>
        <option value="Artiste féminin de l’année">Artiste féminin de l’année</option>
        <option value="Clip Rap Gospel Ivoire de l’année">Clip Rap Gospel Ivoire de l’année</option>
        <option value="Collaboration Rap Gospel de l’année">Collaboration Rap Gospel de l’année</option>
        <option value="Projet de l’année">Projet de l’année</option>
        <option value="Album ou EP de l’année">Album ou EP de l’année</option>
        <option value="Morceau de l’année">Morceau de l’année</option>
        <option value="Beatmaker de l’année">Beatmaker de l’année</option>
        <option value="Prix d’or LMG Ivoire">Prix d’or LMG Ivoire</option>
        <option value="Prix d’honneur">Prix d’honneur</option>
    </select>
</div>

            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Brève motivation *</label><br>
                <textarea name="motivation" required rows="3"
                          style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;"></textarea>
            </div>

            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Votre nom (optionnel)</label><br>
                <input type="text" name="nom_proposant"
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <div style="text-align: left; margin-bottom: 30px;">
                <label style="color: #C49000; font-weight: bold;">Contact (email ou téléphone, optionnel)</label><br>
                <input type="text" name="contact"
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <button type="submit"
                    style="background: linear-gradient(45deg, #C49000, #7a6100); border: none; padding: 14px 28px;
                           font-weight: bold; font-size: 1.1rem; border-radius: 50px; color: #000;
                           box-shadow: 0 0 10px #C49000cc; transition: transform 0.3s ease;">
                ✉️ Soumettre
            </button>
        </form>
    </div>
@endsection
