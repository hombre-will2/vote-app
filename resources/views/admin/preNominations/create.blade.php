@extends('layout')

@section('title', 'Pré-nominations')

@section('content')
    <div style="text-align: center; max-width: 700px; margin: auto;">

        <h1 style="color: #C49000; margin-bottom: 10px;">🎤 Pré-nominations</h1>
        <p style="color: #eee; margin-bottom: 30px;">
            Soumettez un artiste ou un titre pour les <strong>LMG Ivoire Awards</strong> dans la catégorie de votre choix.
        </p>

        @if(session('success'))
            <div style="background-color: #1e1e1e; border: 1px solid #C49000; color: #C49000; padding: 15px; border-radius: 10px; margin-top: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Description -->
        <div style="background-color: #1a1a1a; padding: 20px; border-left: 5px solid #C49000; color: #eee; margin-bottom: 30px; text-align: left; border-radius: 8px;">
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

        <form action="{{ route('pre-nominations.submit') }}" method="POST"
              style="background: #111; padding: 30px; border-radius: 20px; box-shadow: 0 0 15px rgba(196,144,0,0.3);">
            @csrf

            <!-- Artiste -->
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Nom de l’artiste *</label><br>
                <input type="text" name="nom_artiste" required
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <!-- Lien -->
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Lien vers le son ou clip *</label><br>
                <input type="url" name="lien" required placeholder="https://..."
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <!-- Catégorie -->
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Catégorie proposée *</label><br>
                <select name="categorie" required
                        style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
                    <option value="" disabled selected>-- Choisissez une catégorie --</option>
                    <option value="Artiste de l’Année">Artiste de l’Année</option>
                    <option value="Révélation de l’Année">Révélation de l’Année</option>
                    <option value="Meilleur Clip">Meilleur Clip</option>
                    <option value="Meilleure Voix Féminine">Meilleure Voix Féminine</option>
                    <option value="Meilleure Voix Masculine">Meilleure Voix Masculine</option>
                    <option value="Chanson de l’Année">Chanson de l’Année</option>
                    <option value="Meilleur Groupe">Meilleur Groupe</option>
                    <option value="Meilleur Artiste Gospel">Meilleur Artiste Gospel</option>
                    <option value="Meilleur Artiste Urbain">Meilleur Artiste Urbain</option>
                    <option value="Meilleure Collaboration">Meilleure Collaboration</option>
  {{--                <option value="Prix Spécial du Jury">Prix Spécial du Jury</option>  --}}
                </select>
            </div>

            <!-- Motivation -->
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Brève motivation *</label><br>
                <textarea name="motivation" required rows="3"
                          style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;"></textarea>
            </div>

            <!-- Proposant -->
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #C49000; font-weight: bold;">Votre nom (optionnel)</label><br>
                <input type="text" name="nom_proposant"
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <!-- Contact -->
            <div style="text-align: left; margin-bottom: 30px;">
                <label style="color: #C49000; font-weight: bold;">Contact (email ou téléphone, optionnel)</label><br>
                <input type="text" name="contact"
                       style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
            </div>

            <!-- Bouton -->
            <button type="submit"
                    style="background: linear-gradient(45deg, #C49000, #B8860B); border: none; padding: 14px 28px;
                           font-weight: bold; font-size: 1.1rem; border-radius: 50px; color: #000;
                           box-shadow: 0 0 10px rgba(196,144,0,0.5); transition: transform 0.3s ease;">
                ✉️ Soumettre
            </button>
        </form>
    </div>
@endsection
