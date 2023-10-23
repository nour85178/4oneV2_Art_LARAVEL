@extends('layout.layout')

@section('content')
<div class="container">
    <h2>List of Commandes</h2>

    <!-- Responsive table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>État</th>
                    <th>Total</th>
                    <th>Méthode de Paiement</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->etat }}</td>
                    <td>{{ $commande->Total }}</td>
                    <td>{{ $commande->methode_paiement }}</td>
                    <td>{{ $commande->Adresse }}</td>
                    <td>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Add a delete button with a form to delete the Commande -->
                        <form action="{{ route('commandes.delete', $commande->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Commande?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Commande button -->
    <a href="{{ route('commandes.create') }}" class="btn btn-success">Create Commande</a>
</div>
@endsection
