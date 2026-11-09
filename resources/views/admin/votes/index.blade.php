@extends('layout')

@section('title', 'Votes')

@section('content')
    <div style="text-align: center; padding: 30px; max-width: 1200px; margin: auto;">
        <h1 style="color: #C49000;">📊 Votes enregistrés</h1>

        <!-- Statistiques par nominé -->
        <h2 style="margin-top: 40px; color: #C49000;">🔢 Statistiques par Nominé</h2>
        <div style="overflow-x: auto;">
            <table style="margin: 20px auto; width: 95%; background: #111; color: white; border-collapse: collapse; text-align: center; box-shadow: 0 0 12px rgba(196,144,0,0.25);">
                <thead>
                    <tr style="background: #C49000; color: #000;">
                        <th style="padding: 14px;">🎤 Nominé</th>
                        <th style="padding: 14px;">🏷️ Catégorie</th>
                        <th style="padding: 14px;">🗳️ Total de Votes</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($voteStats as $stat)
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 12px;">
                                @if($stat->nomine)
                                    {{ $stat->nomine->nom }}
                                @else
                                    <span style="color: red; font-weight: bold;">Nominé supprimé</span>
                                @endif
                            </td>
                            <td style="padding: 12px;">{{ $stat->nomine?->categorie ?? '-' }}</td>
                            <td style="padding: 12px; font-weight: bold; color: #C49000;">{{ $stat->total }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="padding: 20px; color: #aaa;">Aucune statistique de vote disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Détails des votes -->
        <h2 style="margin-top: 60px; color: #C49000;">🧾 Détails des Votes</h2>
        <div style="overflow-x: auto;">
            <table style="margin: 20px auto; width: 100%; background: #111; color: white; border-collapse: collapse; text-align: center; box-shadow: 0 0 12px rgba(196,144,0,0.25);">
                <thead>
                    <tr style="background: #C49000; color: #000;">
                        <th style="padding: 14px;">📧 Email</th>
                        <th style="padding: 14px;">🌍 IP</th>
                        <th style="padding: 14px;">🎤 Nominé</th>
                        <th style="padding: 14px;">📅 Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($votes as $vote)
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 12px;">{{ $vote->email }}</td>
                            <td style="padding: 12px;">{{ $vote->ip }}</td>
                            <td style="padding: 12px;">
                                @if($vote->nomine)
                                    {{ $vote->nomine->nom }} ({{ $vote->nomine->categorie }})
                                @else
                                    <span style="color: red; font-weight: bold;">Nominé supprimé</span>
                                @endif
                            </td>
                            <td style="padding: 12px;">{{ $vote->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 20px; color: #aaa;">Aucun vote enregistré pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
