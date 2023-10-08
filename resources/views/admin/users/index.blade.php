<!-- resources/views/admin/users/index.blade.php -->

@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un utilisateur</a>
    </div>
@endsection
