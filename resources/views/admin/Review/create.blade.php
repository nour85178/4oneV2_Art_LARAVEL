<h1>Create Review</h1>

<form action="{{ route('reviews.store') }}" method="POST">
    @csrf

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <label for="note">Note:</label>
    <input type="number" name="note" id="note" min="1" max="5">

    <label for="image">Image:</label>
    <input type="text" name="image" id="image">

    <label for="like">Like:</label>
    <input type="number" name="like" id="like">

    <label for="dislike">Dislike:</label>
    <input type="number" name="dislike" id="dislike">

    <label for="PosNeg">PosNeg:</label>
    <input type="checkbox" name="PosNeg" id="PosNeg" value="1">

    <button type="submit">Submit</button>
</form>
