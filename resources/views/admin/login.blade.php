@extends('layout')

@section('title', 'Connexion Admin')

@section('content')
<div style="max-width: 400px; margin: auto; padding: 30px; background: #111; border: 2px solid #C49000; border-radius: 12px; box-shadow: 0 0 15px #C4900044;">
    <h2 style="color: #C49000; margin-bottom: 20px; text-align: center;">🔐 Connexion Administrateur</h2>

    @if($errors->any())
        <div style="color: #ff6b6b; margin-bottom: 15px; font-weight: bold; text-align: center;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div style="margin-bottom: 15px;">
            <input type="email" name="email" placeholder="Adresse Email"
                style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #C49000; background-color: #000; color: #eee;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <input type="password" name="password" placeholder="Mot de passe"
                style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #C49000; background-color: #000; color: #eee;" required>
        </div>

        <button type="submit" class="btn" 
            style="width: 100%; background-color: #C49000; color: #000; font-weight: bold; padding: 12px; border-radius: 30px; box-shadow: 0 0 10px #C49000cc; transition: background-color 0.3s ease;">
            Connexion
        </button>
    </form>
</div>
@endsection
