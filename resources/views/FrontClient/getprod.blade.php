@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row">

    <h1 class="mt-4">Product Details</h1>
        <div class="product-details">
    <div class="col-md-6">
    <div class="card mt-4">
        <div class="card-body">
            <h2 class="card-title">{{ $product->titre }}</h2>
            <p class="card-text">Description: {{ $product->description }}</p>
            <img src="{{ asset('storage/' . $product->image) }}" style="width: 300px; height: 200px;" alt="{{ $product->titre }}">
        </div>
    </div>
    </div>
    </div>
    </div>
@if ($product->bidding_enabled)
    <!-- Add a section to display the list of bids here -->
        <h3 class="mt-4">Bids for this product:</h3>
        <ul>
            @foreach ($product->bids->sortByDesc('amount') as $bid)
                <li>{{ $bid->user->name }} - ${{ $bid->amount }}</li>
            @endforeach
        </ul>

        @if (auth()->user()->hasParticipatedInBid($product))
            <button class="btn btn-secondary" disabled>Already Participated</button>
            <br>
            <form action="{{ route('bids.place', $product->id) }}" method="post">
                @csrf
                <div class="form-group" style="margin-top: 10px">
                    <label for="amount">Bid Amount:</label>
                    <input type="number" name="amount" id="amount" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Place Bid</button>
            </form>
        @else
            <form action="{{ route('bids.participate', $product->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Participate in Bid</button>
            </form>
        @endif
    @else
    <!-- If bidding is not enabled, show the winner's name -->
        @if ($product->winner)

            <h3 class="mt-4">Winner:</h3>
            <p>{{ $product->winner->name }}</p>

        @else
            <p>No winner yet</p>
        @endif
    @endif
<!-- Add Review Form -->
        <div class="add-review-form">
    <div class="col-md-6">
        <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Add a Review</h3>
            <form action="{{ route('reviews.store') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="Title" id="Title">
                    <small id="titleError" class="text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                    <small id="descriptionError" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="note">Note:</label>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="far fa-star" data-value="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="note" id="note" value="0">
                </div>


                <div class="form-group">
                    <label for="imagePreview">Image Preview:</label>
                    <input type="file" class="form-control" name="image" id="image">

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">

            </form>
        </div>
    </div>
    </div>
        </div>
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Product Reviews</h3>
            @if (optional($product->reviews)->count() > 0)
                @foreach ($product->reviews as $review)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Title:</strong> {{ $review->Title }}
                            <br>
                            <strong>Description:</strong> {{ $review->description }}
                            <br>
                            <strong>Note:</strong>
                            <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->note)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <br>
                            <strong>Image Preview:</strong>
                            <img src="{{ asset('storage/images/' . $review->image) }}" style="width: 200px; height: 150px;" alt="{{ $review->titre }}">

                        </li>
                    </ul>
                @endforeach
            @else
                <p>No reviews available for this product.</p>
            @endif
        </div>
    </div>
</div>
@include('FrontClient.footerfront')

@if ($errors->any())
    <script>
        // Display validation errors using Toastr
        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}", "Validation Error");
        @endforeach
    </script>
@endif
                <script>
                    const stars = document.querySelectorAll('.rating i');
                    const noteInput = document.getElementById('note');

                    stars.forEach((star) => {
                        star.addEventListener('click', () => {
                            const value = star.getAttribute('data-value');
                            noteInput.value = value;
                            stars.forEach((s, index) => {
                                if (index < value) {
                                    s.classList.remove('far');
                                    s.classList.add('fas');
                                } else {
                                    s.classList.remove('fas');
                                    s.classList.add('far');
                                }
                            });
                        });
                    });

                    function validateForm() {
                        const title = document.getElementById('Title').value.trim();
                        const description = document.getElementById('description').value.trim();


                        const titleError = document.getElementById('titleError');
                        const descriptionError = document.getElementById('descriptionError');

                        // Reset previous error messages
                        titleError.textContent = '';
                        descriptionError.textContent = '';

                        let isValid = true;

                        if (title === '') {
                            titleError.textContent = 'Title is required';
                            isValid = false;
                        }

                        if (description === '') {
                            descriptionError.textContent = 'Description is required';
                            isValid = false;
                        }

                        if (!isValid) {
                            return false;
                        }

                        // Rest of your validation logic

                        return true;
                    }
                </script>


