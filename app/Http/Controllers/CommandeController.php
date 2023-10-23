<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('admin.commandes.index', compact('commandes'));
    }
    public function show($id){
        $commande= Commande::findorFail($id);
        return view('admin.commandes.show', compact('commande'));

    }
    public function create()
{
    return view('admin.commandes.create');
}
    public function store(Request $request){
        // Create a new Commande
    Commande::create($request->all());

    // Fetch the list of commandes again
    $commandes = Commande::all();

    // Redirect back to the list of commandes with the updated data
    return view('admin.commandes.index', compact('commandes'))->with('success', 'Commande created successfully');
}
    public function edit($id)
{
    $commande = Commande::findOrFail($id);
    return view('admin.commandes.edit', compact('commande'));
}
public function update(Request $request, $id)
{
    $commande = Commande::findOrFail($id);
    $commande->update($request->all());
    return redirect()->route('admin.commandes.index')->with('success', 'Commande updated successfully');
}

    public function delete(Request $request, $id){
        $commande = Commande::findOrFail($id);
    $commande->delete();

    // Redirect back to the list of commandes
    return redirect()->route('admin.commandes.index')->with('success', 'Commande deleted successfully');
    }

    public function showLastCommande()
{
    $lastCommande = Commande::latest()->first();

    return view('FrontClient.showLastCommande', compact('lastCommande'));
}


}
