<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Request as ModelsRequest;
use App\Notifications\BidWinnerNotification;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $user = Auth::user();


        $products = $user->products;

        return view('FrontArtiste.index', compact('products'));
    }

    public function create()
    {
        return view('FrontArtiste.addprod');
    }

    public function createCustomProd(ModelsRequest $requestt)
    {
        return view('FrontArtiste.addCustomProduct', compact('requestt'));
    }

    public function show($id)
    {

        $user = Auth::user();


        $product = $user->products()->findOrFail($id);

        return view('FrontArtiste.show', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'category' => 'required',
            'category_type' => 'required|in:Original,Reproduit',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('public/images', $request->file('image')->getClientOriginalName());
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $user = Auth::user();
        $product = new Product();
        $product->titre = $request->input('titre');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $imagePath;
        $product->category = $request->input('category');
        $categoryType = $request->input('category_type');
        $category = Categorie::where('name', $categoryType)->firstOrFail();
        $product->categorie_id = $category->id;
        $product->user()->associate($user);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function storeCustomProd(Request $request, ModelsRequest $requestt)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'category' => 'required',
            'category_type' => 'required|in:Original,Reproduit',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('public/images', $request->file('image')->getClientOriginalName());
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $user = Auth::user();
        $product = new Product();
        $product->titre = $request->input('titre');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $imagePath;
        $product->category = $request->input('category');
        $categoryType = $request->input('category_type');
        $category = Categorie::where('name', $categoryType)->firstOrFail();
        $product->categorie_id = $category->id;
        $product->user()->associate($user);
        $product->client()->associate($requestt->user);
        $requestt->etat = 'prêt';
        $product->save();
        $requestt->product()->associate($product);
        $requestt->save();


        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $hasBids = $product->bids()->exists();
        return view('FrontArtiste.edit', compact('product', 'hasBids'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully');
    }
    public function stopBidding(Product $product)
    {
        if ($product->categorie->name === 'Original') {
            $product->update(['bidding_enabled' => false]);


            $winningBid = $product->bids()->orderBy('amount', 'desc')->first();

            if ($winningBid) {
                $product->update(['winner_id' => $winningBid->user_id]);
                return response()->json(['success' => true, 'winner' => $winningBid->user_id]);
                $winner = User::find($winningBid->user_id);
                \Log::info('Winner User: ' . $winner);
                $winner->notify(new BidWinnerNotification($product));
            } else {

                return response()->json(['success' => true, 'winner' => $winningBid->user_id]);
            }
        }

        return response()->json(['success' => false]);
    }


    public function displayStyledProducts()
    {

        $originalProducts = Product::whereHas('categorie', function ($query) {
            $query->where('name', 'Original');
        })->get();


        $reproduiteProducts = Product::whereHas('categorie', function ($query) {
            $query->where('name', 'Reproduit');
        })->get();

        return view('FrontClient.home', compact('originalProducts', 'reproduiteProducts'));
    }
    public function getprod($id)
    {


        $user = Auth::user();
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get();

        return view('FrontClient.getprod', compact('product', 'user', 'reviews'));
    }
    public function portfolio(User $artist)
    {
        $products = $artist->products;

        return view('FrontClient.artist-portfolio', compact('products', 'artist'));
    }
}
