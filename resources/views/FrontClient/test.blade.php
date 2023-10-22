@component('mail::message')
    # Bidding Stopped for Product: {{ $product->titre }}

    Congratulations! The bidding for the following product has been stopped.

    **Product Title**: {{ $product->titre }}
    **Price**: ${{ $product->price }}

    @component('mail::button', ['url' => route('products.getprod', $product->id)])
        View Product
    @endcomponent

    Thank you for using our platform!

@endcomponent
