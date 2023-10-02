<!-- resources/views/reviews/index.blade.php -->

<h1>Reviews</h1>

@foreach ($reviews as $review)
    <div>
        <h2>{{ $review->description }}</h2>
        <p>Note: {{ $review->note }}</p>
        <!-- Add more fields to display as needed -->

        <!-- Link to view review -->
        <a href="{{ route('reviews.show', $review->id) }}">View</a>

        <!-- Link to edit review -->
        <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>

        <!-- Form to delete review -->
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

<!-- Link to create a new review -->
<a href="{{ route('reviews.create') }}">Create New Review</a>
