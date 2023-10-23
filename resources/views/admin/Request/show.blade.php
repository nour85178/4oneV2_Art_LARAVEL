@extends('layout.layout')

@section('content')
    <div class="container">
<h1>Request Details</h1>

<h2>{{ $request->description }}</h2>
<p>Categorie: {{ $request->categorie }}</p>
<a href="{{ route('requests.index') }}">Back to List</a>
</div>
@endsection
