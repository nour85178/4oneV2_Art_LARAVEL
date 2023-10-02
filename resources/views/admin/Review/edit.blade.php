

<h1>Edit Review</h1>

<form action="{{ route('reviews.update', $review->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="description">Description:</label>
    <input type="text" name="description" id="description" value="{{ $review->description }}">

    <label for="note">Note:</label>
    <input type="number" name="note" id="note" min="1" max="5" value="{{ $review->note }}">

    <button type="submit">Submit</button>
</form>
