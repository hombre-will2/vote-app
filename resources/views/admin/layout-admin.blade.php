@extends('layout-admin')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 100vh;">
        <h1 class="mb-4">Bienvenue, {{ Auth::guard('admin')->user()->name }}</h1>

        <div class="row justify-content-center mt-4" style="width: 100%;">
            <div class="col-md-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Total Nominés</h5>
                        <p class="card-text">{{ $totalNomines }}</p>
                    </div>
                </div>
            </div>

            <!-- Tu peux ajouter d'autres widgets ici dans d'autres colonnes -->
        </div>
    </div>
@endsection
