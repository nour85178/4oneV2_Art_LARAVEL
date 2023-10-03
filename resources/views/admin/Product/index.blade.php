@extends('layouts.app')
<h1>Products</h1>

@foreach ($products as $product)
    <div>
        <h2>{{ $product->titre }}</h2>
        <p>Description: {{ $product->description }}</p>
        <a href="{{ route('products.show', $product->id) }}">View</a>
        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
<a href="{{ route('products.create') }}">Create New Product</a>