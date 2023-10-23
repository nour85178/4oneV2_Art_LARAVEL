<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class PanierController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $panier = $user->panier;
    $panierContent = $panier->products;
    $totalPrice = $panierContent->sum('price');

    return view('FrontClient.panier', compact('panierContent', 'totalPrice'));
}




public function addProduct(Request $request)
{
    $product_id = $request->input('product_id');
    $quantity = $request->input('quantity');
    $user = Auth::user();

    // Check if the user already has a panier
    if ($user->panier === null) {
        // If not, create a new Panier and set commande_id and prix_total explicitly
        $panier = new Panier();
        $panier->commande_id = null; // Set to null
        $panier->prix_total = 0.00;
        $panier->user_id = $user->id; // Set the user_id
        $panier->save();
    } else {
        // If the user already has a panier, use the existing one
        $panier = $user->panier;
    }

    // Now you can attach the product to the panier
    $panier->products()->attach($product_id, ['quantity' => $quantity]);

    // Calculate the total price based on the quantity of each product
    $totalPrice = $panier->products->sum(function (Model $product) {
        return $product->price * $product->pivot->quantity;
    });

    return response()->json(['message' => 'Product added to panier successfully!', 'totalPrice' => $totalPrice]);
}



public function removeProduct(Request $request)
{
    $product_id = $request->input('product_id');
    $user = Auth::user();
    $panier = $user->panier;

    // Detach the product from the panier
    $panier->products()->detach($product_id);

    // Retrieve updated panier content and total price
    $panierContent = $panier->products;
    $totalPrice = $panierContent->sum('price');

    return response()->json(['message' => 'Product removed from panier successfully!', 'panierContent' => $panierContent, 'totalPrice' => $totalPrice]);}


}




