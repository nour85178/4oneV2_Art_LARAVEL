<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.Product.index', compact('products'));

    }
    public function show($id){
        $product= Product::findorFail($id);
        return view('admin.Product.show', compact('product'));

    }
    public function create()
{
     return view('admin.Product.create');

    
}


    public function store(Request $request){
        // return Product::create($request->all());
        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'product created successfully');


   
    }
    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.Product.edit', compact('product'));
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
