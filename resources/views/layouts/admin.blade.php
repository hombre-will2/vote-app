<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LMG Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --fond-noir: #000;
            --or-bronze: #C49000;
            --or-bronze-clair: #e3b657;
            --texte-clair: #FFE4B5;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--fond-noir);
            color: var(--or-bronze);
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background-color: #111;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.4);
        }

        .sidebar h2 {
            color: var(--or-bronze);
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: var(--or-bronze);
            text-decoration: none;
            margin-bottom: 15px;
        }

        .sidebar a:hover {
            color: var(--texte-clair);
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .logout-button {
            background-color: var(--or-bronze);
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            font-weight: bold;
            margin-top: 40px;
            display: inline-block;
        }

        .logout-button:hover {
            background-color: var(--or-bronze-clair);
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>🔧 Admin LMG</h2>

        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('admin.pre-nominations.index') }}">📋 Pré-nominations</a>
        <a href="{{ route('admin.nomines.index') }}">👤 Nominés</a>
        <a href="{{ route('admin.votes.index') }}">✅ Votes</a>
        <a href="{{ route('admin.resultats.index') }}">🏆 Résultats</a>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-button">🔒 Déconnexion</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
