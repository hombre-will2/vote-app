@extends('layout')

@section('title', 'Vote du Public')

@section('content')
    <h1 style="color: #C49000; text-align: center; margin-bottom: 1rem;">Vote du Public</h1>

    <p style="text-align: center; max-width: 600px; margin: auto; font-size: 1.2rem; color: #eee;">
        Choisissez votre nominé préféré et cliquez sur "Voter".
    </p>

    @if(session('success'))
        <div style="background: #222; border: 2px solid #C49000; color: #C49000; padding: 15px; border-radius: 10px; margin: 20px auto; max-width: 600px; text-align: center; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #222; border: 2px solid #ff4d4d; color: #ff4d4d; padding: 15px; border-radius: 10px; margin: 20px auto; max-width: 600px; text-align: center; font-weight: bold;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Affiche les erreurs de validation --}}
    @if ($errors->any())
        <div style="background-color: #2c2c2c; border: 1px solid #ff4d4d; color: #ff4d4d; padding: 10px; border-radius: 8px; max-width: 600px; margin: 20px auto;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vote.submit') }}" method="POST" style="max-width: 600px; margin: 30px auto; background-color: #111; padding: 30px; border-radius: 15px;">
        @csrf

        @forelse ($nomines as $nomine)
            <div style="margin-bottom: 15px; color: #fff; border: 1px solid #C49000; padding: 15px; border-radius: 10px;">
                <label>
                    <input type="radio" name="nomine_id" value="{{ $nomine->id }}" required>
                    <strong>{{ $nomine->nom }}</strong> — {{ $nomine->categorie }}
                </label>
            </div>
        @empty
            <p style="color: #ccc;">Aucun nominé disponible pour le moment.</p>
        @endforelse

        {{-- Email optionnel --}}
        <div style="margin-bottom: 20px;">
            <input type="email" name="email" placeholder="Votre email (optionnel)" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #555; background-color: #222; color: #fff;">
        </div>

        <button type="submit" style="background: linear-gradient(45deg, #C49000, #7a6100); padding: 10px 25px; border-radius: 25px; font-weight: bold; color: #000; box-shadow: 0 0 10px #C49000cc;">
            🗳️ Voter
        </button>
    </form>

    {{-- Pagination --}}
    <div style="text-align: center; margin-top: 30px;">
        {{ $nomines->links() }}
    </div>
@endsection
