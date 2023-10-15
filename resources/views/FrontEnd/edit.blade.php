@extends('FrontEnd.Styleprod')

@include('FrontEnd.navbarfront')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ $product->titre }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('FrontEnd.footerfront')
