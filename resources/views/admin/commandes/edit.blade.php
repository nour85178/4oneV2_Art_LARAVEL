<!-- resources/views/commandes/edit.blade.php -->
@extends('layout.layout')

@section('content')
    <div class="container">
        <h2>Edit Commande</h2>
        <form method="POST" action="{{ route('commandes.update', $commande->id) }}">
            @csrf
            @method('PUT')
            <!-- Form fields for editing a Commande -->
            <div class="form-group">
                <label for="etat">État</label>
                <input type="text" name="etat" class="form-control" value="{{ $commande->etat }}" required>
            </div>
            <div class="form-group">
                <label for="Total">Total</label>
                <input type="number" name="Total" class="form-control" value="{{ $commande->Total }}" required>
            </div>
            <div class="form-group">
                <label for="methode_paiement">Méthode de Paiement</label>
                <input type="text" name="methode_paiement" class="form-control" value="{{ $commande->methode_paiement }}" required>
            </div>
            <div class="form-group">
                <label for="Adresse">Adresse</label>
                <input type="text" name="Adresse" class="form-control" value="{{ $commande->Adresse }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
