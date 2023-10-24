@extends('FrontClient.style')
@include('FrontClient.navbarfront')


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
                        <th scope="col">Artiste</th>
                        <th scope="col">Produit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->description }}</td>
                            <td>{{ $request->categorie }}</td>
                            <td>{{ $request->etat }}</td>
                            <td>{{ $request->artist->name }}
                            </td>
                            <td>
                                @if ($request->etat === 'prêt')
                                    <a href="{{ route('custom-product', $request) }}">Afficher votre produit</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>

</div>
@include('FrontClient.footerfront')
