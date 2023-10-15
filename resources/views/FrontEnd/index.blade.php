@extends('FrontEnd.Styleprod')
@include('FrontEnd.navbarfront')
<div class="container">

    <h1>Products</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->titre }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('products.delete', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
</div>
@include('FrontEnd.footerfront')

