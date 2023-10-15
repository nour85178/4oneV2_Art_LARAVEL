<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

        $user = Auth::user();


        $products = $user->products;

        return view('FrontEnd.index', compact('products'));
    }

    public function create()
    {
        return view('FrontEnd.addprod');
    }

    public function show($id) {

        $user = Auth::user();


        $product = $user->products()->findOrFail($id);

        return view('FrontEnd.show', compact('product'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'category' => 'required',
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
        $product->user()->associate($user);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('FrontEnd.edit', compact('product'));
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->update($request->all());
    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

    public function delete(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully');

    }
}
