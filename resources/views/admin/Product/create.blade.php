@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" name="titre" id="titre">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" class="form-control" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" name="category" id="category">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
