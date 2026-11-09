@extends('layout')

@section('title', 'Modifier un Nominé')

@section('content')
    <h1 style="color: #C49000; margin-bottom: 30px; text-align: center;">✏️ Modifier un Nominé</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px; max-width: 600px; margin: auto;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.nomines.update', $nomine->id) }}" method="POST" enctype="multipart/form-data"
          style="max-width: 600px; margin: auto; background-color: #111; padding: 30px; border-radius: 20px; box-shadow: 0 0 15px rgba(196,144,0,0.6);">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="nom" style="color: #C49000; font-weight: bold;">👤 Nom de l’artiste *</label><br>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $nomine->nom) }}" required
                style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
        </div>

        <!-- Catégorie -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="categorie" style="color: #C49000; font-weight: bold;">🏷️ Catégorie *</label><br>
            <input type="text" name="categorie" id="categorie" value="{{ old('categorie', $nomine->categorie) }}" required
                style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
        </div>

        <!-- Lien YouTube -->
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="lien" style="color: #C49000; font-weight: bold;">📺 Lien YouTube (facultatif)</label><br>
            <input type="url" name="lien" id="lien" value="{{ old('lien', $nomine->lien) }}"
                style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #C49000; background-color: #000; color: #fff;">
        </div>

        <!-- Image -->
        <div style="margin-bottom: 30px; text-align: left;">
            <label for="image" style="color: #C49000; font-weight: bold;">🖼️ Image du Nominé (laisser vide pour garder)</label><br>
            <input type="file" name="image" id="image" style="margin-top: 10px; color: #fff;">
        </div>

        <!-- Bouton Mettre à jour -->
        <button type="submit"
            style="background: linear-gradient(45deg, #C49000, #B8860B); border: none; padding: 14px 28px;
                   font-weight: bold; font-size: 1.1rem; border-radius: 50px; color: #000;
                   box-shadow: 0 0 10px rgba(196,144,0,0.7); transition: transform 0.3s ease;">
            💾 Mettre à jour
        </button>
    </form>

    <!-- Supprimer -->
    <form action="{{ route('admin.nomines.destroy', $nomine->id) }}" method="POST" style="margin-top: 30px; text-align: center;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Supprimer ce Nominé ?')" 
                style="background: #8B0000; border: none; padding: 12px 24px; font-weight: bold; font-size: 1rem;
                       border-radius: 50px; color: #fff; box-shadow: 0 0 10px red; margin-top: 15px;">
            🗑️ Supprimer ce Nominé
        </button>
    </form>
@endsection
