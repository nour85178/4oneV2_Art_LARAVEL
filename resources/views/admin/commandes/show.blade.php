@extends('layout.layout')

@section('content')
<div class="container">
    <h2>Commande Details</h2>

    <!-- Responsive table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th>État</th>
                    <td>{{ $commande->etat }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ $commande->Total }}</td>
                </tr>
                <tr>
                    <th>Méthode de Paiement</th>
                    <td>{{ $commande->methode_paiement }}</td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td>{{ $commande->Adresse }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Back to List and Edit buttons -->
    <div class="d-flex justify-content-between">
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning">Edit</a>
    </div>

    <!-- Add a delete button with a form to delete the Commande -->
    <form action="{{ route('commandes.delete', $commande->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Commande?')">Delete</button>
    </form>
</div>
@endsection
