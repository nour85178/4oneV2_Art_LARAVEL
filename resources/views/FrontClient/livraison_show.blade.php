@extends('FrontClient.style')
@include('FrontClient.navbarfront')


<div class="container">
    <div class="row">
        <h1>Last Livraison Details</h1>

        @if (isset($lastLivraison))
            <p><strong>Nom:</strong> {{ $lastLivraison->nom }}</p>
            <p><strong>Adresse:</strong> {{ $lastLivraison->adresse }}</p>

            <form action="{{ route('livraison.confirmCommande') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary" name="confirmer_commande">Confirmer Commande</button>
</form>

        @else
            <p>No Livraison found.</p>
        @endif
    </div>
</div>

@include('FrontClient.footerfront')
