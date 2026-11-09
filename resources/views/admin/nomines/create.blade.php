@extends('layout')

@section('title', 'Ajouter un Nominé')

@section('content')
<div style="max-width: 700px; margin: auto; text-align: center;">
    <h1 style="color: #C49000; margin-bottom: 30px;">🎤 Ajouter un Nominé</h1>

    <form action="{{ route('admin.nomines.store') }}" method="POST" enctype="multipart/form-data"
          style="background-color: #111; padding: 35px; border-radius: 20px; box-shadow: 0 0 20px rgba(196,144,0,0.5);">
        @csrf

        <!-- Nom -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="nom" style="color: #C49000; font-weight: bold;">👤 Nom de l’artiste *</label>
            <input type="text" name="nom" id="nom" required
                   placeholder="Ex. John Doe"
                   style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000;
                          background-color: #000; color: #fff; margin-top: 5px;">
        </div>

        <!-- Catégorie -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="categorie" style="color: #C49000; font-weight: bold;">🏷️ Catégorie *</label>
            <input type="text" name="categorie" id="categorie" required
                   placeholder="Ex. Meilleur clip gospel urbain"
                   style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000;
                          background-color: #000; color: #fff; margin-top: 5px;">
        </div>

        <!-- Lien YouTube -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="lien" style="color: #C49000; font-weight: bold;">📺 Lien YouTube (facultatif)</label>
            <input type="url" name="lien" id="lien" placeholder="https://youtube.com/watch?v=..."
                   style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000;
                          background-color: #000; color: #fff; margin-top: 5px;">
        </div>

        <!-- Image -->
        <div style="margin-bottom: 30px; text-align: left;">
            <label for="image" style="color: #C49000; font-weight: bold;">🖼️ Image du Nominé</label><br>
            <input type="file" name="image" id="image"
                   style="margin-top: 10px; color: #fff;">
        </div>

        <!-- Bouton -->
        <button type="submit"
            style="background: linear-gradient(45deg, #C49000, #B8860B); border: none; padding: 14px 30px;
                   font-weight: bold; font-size: 1.1rem; border-radius: 50px; color: #000;
                   box-shadow: 0 0 10px rgba(196,144,0,0.7); transition: transform 0.3s ease;">
            💾 Enregistrer
        </button>
    </form>
</div>
@endsection
