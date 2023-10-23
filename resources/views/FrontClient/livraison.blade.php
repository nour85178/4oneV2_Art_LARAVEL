@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row">
<h1>Create Livraison</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('livraison.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}">
    </div>
    <button type="submit" class="btn btn-primary">Create Livraison</button>
</form>
</div>
</div>

@include('FrontClient.footerfront')
