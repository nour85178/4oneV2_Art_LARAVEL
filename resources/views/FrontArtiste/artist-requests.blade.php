@extends('FrontArtiste.Styleprod')
@include('FrontArtiste.navbarfront')

<div class="container">
    <div class="row">
        <h1>Requests</h1>

        <div class="col-md-12">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Image de référence</th>
                        <th scope="col">Client</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->description }}</td>
                            <td>{{ $request->categorie }}</td>
                            <td>{{ $request->etat }}</td>
                            <td><img src="{{ asset('storage/' . $request->image) }}"
                                    style="width: 300px; height: 300px;">
                            </td>
                            <td>{{ $request->user->name }}</td>
                            <td>
                                @if ($request->etat === 'en attente')
                                    <form action="{{ route('accept-request', $request) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Accepter</button>
                                    </form>
                                @endif
                                <form action="{{ route('delete-request', $request) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                @if ($request->etat === 'en cours')
                                    <a href="{{ route('create-custom-product', $request) }}">Créer un produit
                                        personnalisé pour {{ $request->user->name }} </a>
                                @endif
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('FrontArtiste.footerfront')
