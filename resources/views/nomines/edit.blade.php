@extends('layout')

@section('title', 'Modifier un Nominé')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 30px; background: #111; border-radius: 15px; color: white;">
    <h1 style="color: #FFD700; text-align: center;">✏️ Modifier un Nominé</h1>

    <form method="POST" action="{{ route('admin.nomines.update', $nomine->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label style="color: #FFD700;">Nom</label>
        <input type="text" name="nom" value="{{ old('nom', $nomine->nom) }}" required
               style="width: 100%; padding: 10px; border-radius: 10px; margin-bottom: 15px; background-color: #000; color: #fff; border: 1px solid #FFD700;">

        <label style="color: #FFD700;">Catégorie</label>
        <input type="text" name="categorie" value="{{ old('categorie', $nomine->categorie) }}" required
               style="width: 100%; padding: 10px; border-radius: 10px; margin-bottom: 15px; background-color: #000; color: #fff; border: 1px solid #FFD700;">

        <label style="color: #FFD700;">Lien (YouTube)</label>
        <input type="url" name="lien" value="{{ old('lien', $nomine->lien) }}"
               style="width: 100%; padding: 10px; border-radius: 10px; margin-bottom: 15px; background-color: #000; color: #fff; border: 1px solid #FFD700;">

        <label style="color: #FFD700;">Image (facultative)</label>
        <input type="file" name="image"
               style="width: 100%; padding: 10px; border-radius: 10px; margin-bottom: 20px; background-color: #000; color: #fff; border: 1px solid #FFD700;">

        <button type="submit" style="background-color: #FFD700; color: #000; font-weight: bold; padding: 12px 25px; border-radius: 30px;">
            💾 Enregistrer
        </button>
    </form>
</div>
@endsection
