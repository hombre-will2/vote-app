<aside style="background-color: #111; padding: 20px; width: 250px; min-height: 100vh; color: #C49000;">
    <h3 style="color: #C49000;">⚙️ Admin</h3>
    <ul style="list-style: none; padding: 0;">
        <li><a href="{{ route('admin.dashboard') }}" style="color: #eee; text-decoration: none;">🏠 Dashboard</a></li>
        <li><a href="{{ route('admin.nomines.index') }}" style="color: #eee; text-decoration: none;">👤 Gérer les Nominés</a></li>
        <li><a href="{{ route('admin.pre-nominations.index') }}" style="color: #eee; text-decoration: none;">📝 Pré-nominations</a></li>
        <li><a href="{{ route('admin.votes.index') }}" style="color: #eee; text-decoration: none;">🗳️ Votes</a></li>
        <li><a href="{{ route('admin.resultats.index') }}" style="color: #eee; text-decoration: none;">📊 Résultats</a></li>
        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" style="background: none; border: none; color: #C49000; cursor: pointer;">🔒 Déconnexion</button>
            </form>
        </li>
    </ul>
</aside>
