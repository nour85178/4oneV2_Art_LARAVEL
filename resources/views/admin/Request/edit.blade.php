@extends('layout.layout')

@section('content')
    <div class="container">
<h1>Edit Request</h1>

<form action="{{ route('requests.update', $request->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="{{ $request->description }}">

    <label for="categorie">Categorie:</label>
    <input type="text" name="categorie" id="categorie" value="{{ $request->categorie }}">

    <button type="submit">Submit</button>
</form>
</div>
@endsection
