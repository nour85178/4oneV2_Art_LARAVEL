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
                <th>Titles</th>
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
                    <td>{{ $review->title }}</td>

                    <td>
                        <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-primary">View</a>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection
