@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row">
        <h1>Panier</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th> <!-- New column for quantity -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panierContent as $product)
                    <tr>
                        <td>{{ $product->titre }}</td>
                        <td><img src="{{ $product->image }}" alt="Product Image" width="100" height="100"></td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td> <!-- Display the quantity from pivot -->
                        <td>
                            <form method="POST" action="{{ route('panier.removeProduct', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total Price: ${{ $totalPrice }}</p>
    </div>
</div>

@include('FrontClient.footerfront')
