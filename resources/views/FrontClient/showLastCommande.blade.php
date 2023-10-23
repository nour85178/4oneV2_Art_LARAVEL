@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row">
        <h1>Last Commande Details</h1>

        @if (isset($lastCommande))
            <p><strong>Commande ID:</strong> {{ $lastCommande->id }}</p>

            <p><strong>État:</strong> {{ $lastCommande->etat }}</p>
            <p><strong>Méthode de Paiement:</strong> {{ $lastCommande->methode_paiement }}</p>
            <p><strong>Panier ID:</strong> {{ $lastCommande->panier_id }}</p>
            <p><strong>Livraison ID:</strong> {{ $lastCommande->livraison_id }}</p>

            @if ($lastCommande->panier)
                <h2>Panier Details</h2>
                <p><strong>Prix Total:</strong> {{ $lastCommande->panier->prix_total }}</p>
                <!-- Display other Panier attributes here -->
            @else
                <p>No associated Panier found.</p>
            @endif

            @if ($lastCommande->livraison)
                <h2>Livraison Details</h2>
                <p><strong>Nom:</strong> {{ $lastCommande->livraison->nom }}</p>
                <p><strong>Adresse:</strong> {{ $lastCommande->livraison->adresse }}</p>
                <!-- Display other Livraison attributes here -->
            @else
                <p>No associated Livraison found.</p>
            @endif
           
            
        @else
            <p>No Commande found.</p>
        @endif
    </div>
</div>

@include('FrontClient.footerfront')
