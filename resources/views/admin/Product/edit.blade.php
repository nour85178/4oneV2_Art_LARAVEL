@extends('layouts.app')
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="titre">Titre:</label>
    <input type="text" name="titre" id="titre" value="{{ $product->titre }}">
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="{{ $product->description }}">

    
    <button type="submit">Submit</button>
</form>