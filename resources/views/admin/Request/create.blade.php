@extends('layout.layout')

@section('content')
    <div class="container">
<h1>Create Request</h1>

<form action="{{ route('requests.store') }}" method="POST">
    @csrf

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <label for="categorie">Categorie:</label>
    <input type="text" name="categorie" id="categorie">

    <label for="image">Image:</label>
    <input type="text" name="image" id="image">

    <label for="etat">Etat:</label>
    <input type="text" name="etat" id="etat">

    <button type="submit">Submit</button>
</form>
</div>
@endsection
