<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LMG @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --fond-noir: #000;
            --or-bronze: #C49000;
            --or-bronze-clair: #e3b657;
            --texte-clair: #FFE4B5;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--fond-noir);
            color: var(--or-bronze);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: var(--fond-noir);
            color: var(--or-bronze);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 2rem;
            position: relative;
            z-index: 1001;
        }

        .logo a {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--or-bronze);
            text-decoration: none;
        }

        .menu-toggle {
            font-size: 2rem;
            cursor: pointer;
            color: var(--or-bronze);
            background: none;
            border: none;
        }

       nav#mainNav {
    position: fixed;
    top: 0;
    left: -300px;
    width: 250px;
    height: 100vh;
    background-color: rgba(17, 17, 17, 0.6); /* Fond semi-transparent */
    backdrop-filter: blur(10px); /* Effet flou derrière */
    -webkit-backdrop-filter: blur(10px); /* Pour Safari */
    display: flex;
    flex-direction: column;
    padding: 2rem 1rem;
    transition: left 0.3s ease;
    z-index: 9999; /* Plus élevé que le logo */
    box-shadow: 5px 0 15px rgba(196, 144, 0, 0.3);
}


        nav#mainNav.show {
            left: 0;
        }

        nav#mainNav a {
            color: var(--or-bronze);
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0.8rem 0;
        }

        nav#mainNav a.active-link {
            color: var(--texte-clair);
            text-decoration: underline;
        }

        .btn {
            background-color: var(--or-bronze);
            color: #000;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
            border: none;
        }

        .btn:hover {
            background-color: var(--or-bronze-clair);
        }

      .close-btn {
    font-size: 2rem;
    color: var(--texte-clair);
    cursor: pointer;
    align-self: flex-end;
    margin-bottom: 2rem;
}

        main {
            flex: 1;
            padding: 2rem;
        }

        footer {
            color: var(--or-bronze);
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
        }

      
        @media (max-width: 600px) {
            .logo img {
                height: 50px;
            }
        }

        #scrollTopBtn {
            position: fixed;
            bottom: 30px;
            right: 20px;
            z-index: 9999;
            background-color: var(--or-bronze);
            color: #000;
            border: none;
            padding: 12px 18px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 0 12px var(--or-bronze-clair);
            display: none;
            transition: background-color 2.3s ease, transform 5.3s ease;
        }

        #scrollTopBtn:hover {
            background-color: var(--or-bronze-clair);
            transform: scale(1.1);
        }

.menu-toggle.hide-toggle {
    display: none;
}

    </style>
</head>
<body>

<header>
    <div class="logo">
        <a href="{{ url('/') }}">
<img src="{{ asset('images/logo.png') }}" alt="Logo LMG"
         style="height: 140px; object-fit: contain; max-width: 100%; margin-bottom: 1px;">

        </a>
    </div>

    <button class="menu-toggle" onclick="toggleMenu()">
        <i class="bi bi-list"></i>
    </button>
</header>

<nav id="mainNav">
    <div class="close-btn" onclick="toggleMenu()">✖</div>

    @php $currentUrl = url()->current(); @endphp

    <a href="{{ url('/') }}" class="{{ $currentUrl == url('/') ? 'active-link' : '' }}">Accueil</a>
    <a href="{{ url('/pre-nominations') }}" class="{{ $currentUrl == url('/pre-nominations') ? 'active-link' : '' }}">Pré-nominations</a>
    <a href="{{ url('/categories') }}" class="{{ $currentUrl == url('/categories') ? 'active-link' : '' }}">Catégories</a>
    
    {{-- <a href="{{ url('/nomines') }}" class="{{ $currentUrl == url('/nomines') ? 'active-link' : '' }}">Nominés</a> --}}
    {{-- <a href="{{ url('/vote') }}" class="{{ $currentUrl == url('/vote') ? 'active-link' : '' }}">Vote du Public</a> --}}
    {{-- <a href="{{ url('/resultats') }}" class="{{ $currentUrl == url('/resultats') ? 'active-link' : '' }}">Résultats</a> --}}

    <a href="{{ url('/contribuer') }}" class="{{ $currentUrl == url('/contribuer') ? 'active-link' : '' }}">Contribuer</a>

    @auth('admin')
        @if (request()->routeIs('admin.dashboard'))
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn">🔒 Logout</button>
            </form>
        @else
            <a href="{{ route('admin.dashboard') }}" class="btn btn-success" style="padding: 8px; color: #000; text-align: center;">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        @endif
    @else
        <a href="{{ route('admin.login') }}" class="btn" style="color: #000; text-align: center;">🔑 Login</a>
    @endauth
</nav>
@auth('admin')
    {{-- Montrer dashboard ou logout --}}
@else
    {{-- Montrer le bouton de login --}}
@endauth


<main>
    @yield('content')
</main>

<footer>
    © 2025 Vote-Up. Tous droits réservés.
</footer>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mainNav');
        const toggleBtn = document.querySelector('.menu-toggle');
        
        menu.classList.toggle('show');
        toggleBtn.classList.toggle('hide-toggle');
    }
</script>

<!-- Bouton retour haut -->
<button onclick="scrollToTop()" id="scrollTopBtn" title="Revenir en haut">
    ↥
</button>

<script>
    // Affiche le bouton après un certain scroll
    window.onscroll = function () {
        const btn = document.getElementById("scrollTopBtn");
        if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    };

    // Remonter en douceur
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

</body>
</html>
