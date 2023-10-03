<!-- resources/views/commandes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Commande</h2>
        <form method="POST" action="{{ route('commandes.store') }}">
            @csrf
            <!-- Form fields for creating a new Commande -->
            <div class="form-group">
                <label for="etat">État</label>
                <input type="text" name="etat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Total">Total</label>
                <input type="number" name="Total" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="methode_paiement">Méthode de Paiement</label>
                <input type="text" name="methode_paiement" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Adresse">Adresse</label>
                <input type="text" name="Adresse" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
