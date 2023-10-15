@extends('FrontEnd.Styleprod')

@include('FrontEnd.navbarfront')




<div class="container">
    <h1 class="mt-4">Product Details</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">{{ $product->titre }}</h2>
            <p class="card-text">Description: {{ $product->description }}</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->titre }}">

        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-primary mt-4">Back to List</a>
</div>
@include('FrontEnd.footerfront')
