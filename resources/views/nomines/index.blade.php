@foreach ($nominations as $categorie => $nomines)
    <section style="margin-top: 60px; text-align: center;">
        <h2 style="color: #C49000; font-weight: 700; font-size: 1.8rem; margin-bottom: 20px;">
            {{ $categorie }}
        </h2>

        <div style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
            @forelse ($nomines as $nomine)
                <div style="background-color: #111; border: 3px solid #C49000; border-radius: 15px; padding: 20px; width: 280px; box-shadow: 0 0 15px #C4900088; transition: transform 0.3s ease, box-shadow 0.3s ease; text-align: center;">
                    
                    <!-- Image -->
                    @if($nomine->image)
                        <img src="{{ asset('storage/' . $nomine->image) }}" alt="{{ $nomine->nom }}" 
                             style="width: 100%; height: 180px; object-fit: cover; border-radius: 12px; margin-bottom: 15px; box-shadow: 0 0 10px #C4900099;">
                    @else
                        <div style="width: 100%; height: 180px; background: #333; border-radius: 12px; margin-bottom: 15px; display: flex; align-items: center; justify-content: center; color: #999;">
                            Pas d'image
                        </div>
                    @endif

                    <!-- Nom -->
                    <h3 style="color: #eee; font-weight: 700; font-size: 1.25rem; margin-bottom: 15px;">
                        {{ $nomine->nom }}
                    </h3>

                    <!-- Actions -->
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        
                        <!-- Lien YouTube -->
                        @if($nomine->lien)
                            <a href="{{ $nomine->lien }}" target="_blank"
                               style="display: inline-block; background: #C49000; color: #111; font-weight: 700; padding: 10px 20px; border-radius: 50px; text-decoration: none; box-shadow: 0 4px 10px #7a650044;">
                               🎧 Écouter
                            </a>
                        @endif

                        <!-- Voir -->
                        <a href="{{ route('admin.nomines.show', $nomine->id) }}"
                           style="background-color: #FFD700; color: #000; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-weight: bold;">
                           🔍 Voir
                        </a>

                        <!-- Modifier -->
                        <a href="{{ route('admin.nomines.edit', $nomine->id) }}"
                           style="background-color: #FFA500; color: #000; padding: 10px 20px; border-radius: 30px; text-decoration: none; font-weight: bold;">
                           ✏️ Modifier
                        </a>

                        <!-- Supprimer -->
                        <form action="{{ route('admin.nomines.destroy', $nomine->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="background-color: #ff4444; color: white; padding: 10px 20px; border-radius: 30px; border: none; font-weight: bold;">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="color: #999; font-size: 1.1rem;">Aucun nominé dans cette catégorie.</p>
            @endforelse
        </div>
    </section>
@endforeach
