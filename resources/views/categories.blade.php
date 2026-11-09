@extends('layout')

@section('title', 'Catégories')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #000 !important;
    }
</style>

<h1 style="color: #D4AF37; text-align: center; margin-bottom: 30px;">
    🏆 Catégories Officielles – LMG Ivoire Awards 2025
</h1>

<div class="container">
    <div class="row g-4">
        @php
            $categories = [
                ['id' => 1, 'titre' => 'Révélation de l’année', 'description' => 'Récompense un(e) artiste qui s’est fait remarquer pour la première fois dans l’année, avec un impact notable dans le gospel urbain ivoirien.', 'criteres' => ['Première apparition publique significative', 'Qualité musicale et message', 'Émergence remarquée par le public ou les médias', 'Croissance de visibilité en 2025']],
                ['id' => 2, 'titre' => 'Artiste masculin de l’année', 'description' => 'Célèbre le parcours d’un artiste homme ayant marqué l’année par ses œuvres, sa constance et son engagement dans le gospel urbain.', 'criteres' => ['Impact dans l’année', 'Projets sortis et visibilité', 'Influence dans le milieu gospel', 'Professionnalisme et régularité']],
                ['id' => 3, 'titre' => 'Artiste féminin de l’année', 'description' => 'Met en lumière une artiste femme dont l’année a été marquée par un travail remarquable dans le gospel urbain.', 'criteres' => ['Visibilité artistique', 'Qualité des sorties musicales', 'Influence sur la communauté gospel', 'Engagement dans son art et sa foi']],
                ['id' => 4, 'titre' => 'Clip Rap Gospel Ivoire de l’année', 'description' => 'Récompense le clip vidéo de rap gospel produit en Côte d’Ivoire qui s’est démarqué par sa créativité et son message.', 'criteres' => ['Qualité visuelle et artistique', 'Pertinence du message gospel', 'Originalité du scénario ou de l’approche', 'Engagement sur les réseaux sociaux']],
                ['id' => 5, 'titre' => 'Collaboration Rap Gospel de l’année', 'description' => 'Met à l’honneur une collaboration entre deux ou plusieurs artistes rap gospel ayant marqué l’année par leur union musicale.', 'criteres' => ['Alchimie artistique', 'Impact et accueil du public', 'Originalité du projet collaboratif', 'Message et énergie du morceau']],
                ['id' => 6, 'titre' => 'Projet de l’année', 'description' => 'Récompense une initiative créative (série de freestyles, évènement, contenu digital, etc.) ayant enrichi la scène gospel urbaine.', 'criteres' => ['Innovation et originalité', 'Qualité d’exécution', 'Portée et retombées dans la communauté', 'Message transmis']],
                ['id' => 7, 'titre' => 'Album ou EP de l’année', 'description' => 'Met en avant le meilleur projet musical (album ou EP) sorti dans l’année par un artiste gospel urbain.', 'criteres' => ['Cohérence artistique', 'Production musicale', 'Thématique et message', 'Réception du public et critiques']],
                ['id' => 8, 'titre' => 'Morceau de l’année', 'description' => 'Récompense la chanson qui a le plus marqué l’année en termes de qualité, diffusion et impact dans la culture gospel urbaine.', 'criteres' => ['Popularité et partages', 'Message spirituel ou social', 'Production et originalité', 'Présence sur scène ou réseaux']],
                ['id' => 9, 'titre' => 'Beatmaker de l’année', 'description' => 'Met en lumière le travail d’un beatmaker ou producteur ayant signé plusieurs sons marquants dans le gospel urbain.', 'criteres' => ['Nombre de productions notables', 'Qualité sonore et créativité', 'Influence dans les hits de l’année', 'Collaboration avec divers artistes']],
                ['id' => 10, 'titre' => 'Prix d’or LMG Ivoire', 'description' => 'Distinction spéciale remise à l’artiste ou acteur du gospel urbain qui a été le plus constant, influent et engagé sur l’ensemble de l’année.', 'criteres' => ['Présence continue dans l’actualité', 'Volume et qualité des projets', 'Engagement dans la communauté gospel', 'Rayonnement local ou international']],
                ['id' => 11, 'titre' => '🎖️ Prix d’honneur', 'description' => 'Ce prix spécial distingue une figure emblématique du gospel urbain ivoirien, dont l’impact s’est construit sur plusieurs années.', 'criteres' => ['Ancienneté dans le milieu gospel', 'Contribution à la culture gospel urbaine', 'Influence sur la nouvelle génération', 'Parcours inspirant']],
            ];
        @endphp

        @foreach($categories as $cat)
            <div class="col-md-4">
                <div class="card h-100" style="background-color: #111; color: white; cursor: pointer; border-radius: 15px;" data-bs-toggle="modal" data-bs-target="#modalCat{{ $cat['id'] }}">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #D4AF37;">{{ $cat['titre'] }}</h5>
                        <p class="card-text">{{ Str::limit($cat['description'], 80) }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalCat{{ $cat['id'] }}" tabindex="-1" aria-labelledby="modalLabel{{ $cat['id'] }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="background-color: #111; color: #fff;">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modalLabel{{ $cat['id'] }}" style="color: #D4AF37;">{{ $cat['titre'] }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $cat['description'] }}</p>
                            <h6 style="color: #D4AF37;">Critères :</h6>
                            <ul>
                                @foreach($cat['criteres'] as $critere)
                                    <li>{{ $critere }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bouton retour en haut -->
<button onclick="scrollToTop()" id="scrollTopBtn" title="Haut de page"
        style="display: none; position: fixed; bottom: 30px; right: 30px; z-index: 9999;
               background: #D4AF37; color: #000; border: none; padding: 12px 18px;
               border-radius: 50px; font-weight: bold; box-shadow: 0 0 10px #D4AF37cc;
               transition: opacity 0.4s ease;">
    ↑ Haut
</button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Bouton "haut de page" visible après scroll
    window.onscroll = function () {
        const btn = document.getElementById("scrollTopBtn");
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    };

    // Scroll vers le haut
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
@endsection
