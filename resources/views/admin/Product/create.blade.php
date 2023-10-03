<h1>Create Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label for="titre">Titre:</label>
    <input type="text" name="titre" id="titre">

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <label for="image">Image:</label>
    <input type="text" name="image" id="image">

    <label for="price">Price:</label>
    <input type="number" name="price" id="price">

    <label for="category">Category:</label>
    <input type="text" name="category" id="category">

  

    <button type="submit">Submit</button>
</form>