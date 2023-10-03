@extends('layout.layout')
@section('content')
<div class="container">
    <h1>Reviews</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Note</th>
                <th>Like</th>
                <th>Dislike</th>
                <th>PosNeg</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->description }}</td>
                    <td>{{ $review->note }}</td>
                    <td>{{ $review->like }}</td>
                    <td>{{ $review->dislike }}</td>
                    <td>{{ $review->PosNeg }}</td>
                    <td>{{ $review->image }}</td>
                    <td>
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('reviews.delete', $review->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('reviews.create') }}" class="btn btn-success">Create New Review</a>
</div>
@endsection
