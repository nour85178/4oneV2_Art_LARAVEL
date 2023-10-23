<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Commande;
use App\Models\Panier;


class LivraisonController extends Controller
{
    public function create()
{
    return view('FrontClient.livraison');
}

public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
    ]);

    Livraison::create($request->all());

    // You can add a success message to be displayed in your view.
    // For example, you can set it in a session and display it in your view.
    session()->flash('success', 'Livraison created successfully!');

    // No redirection here
    // You can return a response if needed, e.g., a JSON response.
    // For example, return a JSON response:
    return response()->json(['message' => 'Livraison created successfully']);
}

public function showLastLivraison()
{
    $lastLivraison = Livraison::latest()->first();

    return view('FrontClient.livraison_show', compact('lastLivraison'));
}

public function updateLastLivraison(Request $request, $id)
{
    $lastLivraison = Livraison::latest()->first();

    if ($lastLivraison) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $lastLivraison->update($request->all());
    }

    // Redirect back to the same view to show updated Livraison.
    return redirect()->route('livraison.showLast')->with('success', 'Livraison updated successfully!');
}

public function deleteLastLivraison()
{
    $lastLivraison = Livraison::latest()->first();

    if ($lastLivraison) {
        $lastLivraison->delete();
    }

    // Redirect to a relevant page or route.
    return redirect()->route('livraison.create')->with('success', 'Livraison deleted successfully!');
}

public function confirmCommande()
{
    // Retrieve the last Panier and last Livraison
    $lastPanier = Panier::latest()->first();
    $lastLivraison = Livraison::latest()->first();

    if ($lastPanier && $lastLivraison) {
        // Create a new Commande linked to the last Panier and last Livraison
        $commande = new Commande([
            'etat' => 'En cours', // Adjust this based on your requirements
            'methode_paiement' => 'Cash on Delivery', // Adjust this based on your requirements
            'panier_id' => $lastPanier->id,
            'livraison_id' => $lastLivraison->id, // Set the panier_id
        ]);

        // Associate the user with the Commande
        $commande->user()->associate(auth()->user());

        // Save the Commande
        $commande->save();

        // Associate the Livraison with the Commande
        $lastLivraison->commande()->associate($commande);
        $lastLivraison->save();

        // You have already associated the Panier with the Commande above, so no need to do it again.

        // If needed, you can remove the items from the Panier, e.g., after confirming the Commande
        // $lastPanier->products()->detach();

        return redirect()->route('commande.showLastCommande', $commande->id)->with('success', 'Commande confirmed successfully!');
    }

    return redirect()->back()->with('error', 'Unable to confirm Commande. Please check your Panier and Livraison.');
}





}
