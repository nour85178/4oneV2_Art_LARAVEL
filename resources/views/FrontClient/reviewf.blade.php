<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

@yield('content') <!-- This is where your content will be inserted -->

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<style>
    .form-control {
        background-color: white;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">Create Review</h1>

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
                                <i class="far fa-star" data-value="1"></i>
                                <i class="far fa-star" data-value="2"></i>
                                <i class="far fa-star" data-value="3"></i>
                                <i class="far fa-star" data-value="4"></i>
                                <i class="far fa-star" data-value="5"></i>
                            </div>
                            <input type="hidden" name="note" id="note" value="0">
                        </div>
                        <div class="form-group">
                            <label for="imageFile">Choose an Image:</label>
                            <input type="file" class="form-control-file" id="imageFile" accept="image/*" onchange="setImagePath(event)">
                            <input type="hidden" name="image" id="image" value="">
                            <input type="hidden" name="like" id="like" value="0">
                            <input type="hidden" name="dislike" id="dislike" value="0">
                            <input type="hidden" name="PosNeg" id="PosNeg" value="1">
                            <input type="hidden" name="product_id" id="product_id" value="1">
                        </div>

                        <div class="form-group">
                            <label for="imagePreview">Image Preview:</label>
                            <img src="" alt="Image Preview" id="imagePreview" style="max-width: 100%; height: auto;">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center">All Reviews</h1>

                    @if(count($reviews) > 0)
                        <ul class="list-group">
                            @foreach($reviews as $review)
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
                                    <img src="{{ $review->image }}" alt="Review Image" style="max-width: 100%; height: auto;">
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center">No reviews available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
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
    function setImagePath(event) {
        const file = event.target.files[0];
        const imageInput = document.getElementById('image');

        if (file) {
            // Get the file path
            const filePath = URL.createObjectURL(file);
            imageInput.value = filePath;
            document.getElementById('imagePreview').setAttribute('src', filePath);
        }
    }
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
