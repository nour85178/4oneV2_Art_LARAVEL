
@extends('layout.layout')
<h1>Reviews</h1>

@foreach ($reviews as $review)
    <div>
        <h2>{{ $review->description }}</h2>
        <p>Note: {{ $review->note }}</p>
        <a href="{{ route('reviews.show', $review->id) }}">View</a>
        <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
        <form action="{{ route('reviews.delete', $review->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
<a href="{{ route('reviews.create') }}">Create New Review</a>
