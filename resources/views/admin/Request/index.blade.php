@extends('layout.layout')

@section('content')
    <div class="container">
<h1>Requests</h1>

@foreach ($requests as $request)
    <div>
        <h2>{{ $request->description }}</h2>
        <p>Categorie: {{ $request->categorie }}</p>
        <a href="{{ route('requests.show', $request->id) }}">View</a>
        <a href="{{ route('requests.edit', $request->id) }}">Edit</a>
        <form action="{{ route('requests.delete', $request->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
<a href="{{ route('requests.create') }}">Create New request</a>

    </div>
@endsection
