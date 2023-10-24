@extends('FrontArtiste.Styleprod')

@include('FrontArtiste.navbarfront')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ $product->titre }}">
        </div>

        <div class="form-group">
            <label for= "description">Description:</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
        </div>

        @if ($product->categorie->name === 'Original' && $product->bidding_enabled)
            @if ($hasBids)
            <!-- Use an image for the "Stop Bidding" action -->
                <img src="{{ asset('images/hammer.jpeg') }}" id="stop-bidding" data-has-active-bids="true" data-bidding-enabled="{{ $product->bidding_enabled ? 'true' : 'false' }}" style="cursor: pointer;">

            @endif
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<audio id="my-audio" src="{{ asset('audio/123.mp3') }}" preload="auto"></audio>

@include('FrontArtiste.footerfront')
<script>
    // Function to play the sound
    function playSound() {
        var audio = document.getElementById('my-audio');
        audio.play();
    }

    document.addEventListener('DOMContentLoaded', function() {
        const stopBiddingImage = document.getElementById('stop-bidding');
        const hasActiveBids = stopBiddingImage.getAttribute('data-has-active-bids');
        const biddingEnabled = stopBiddingImage.getAttribute('data-bidding-enabled');
        console.log('biddingEnabled:', biddingEnabled);
        if (stopBiddingImage && hasActiveBids === 'true' && biddingEnabled === 'true') {
            stopBiddingImage.style.display = 'block'; // Show the image
            stopBiddingImage.addEventListener('click', function() {
                // Play the sound
                playSound();

                // Send an AJAX request to update bidding_enabled for the product
                fetch('{{ route('products.stopBidding', $product->id) }}', {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                    .then(response => response.json())
                    .then(data => {

                        console.log(data);
                        if (data.success) {
                            alert('Bidding has been stopped for this product.');
                            // Optionally, you can update the button or UI here.
                        } else {
                            alert('Failed to stop bidding.');
                        }
                    });
            });
        }
    });
</script>
