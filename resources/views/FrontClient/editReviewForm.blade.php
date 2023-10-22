<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review Form</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap CSS and JavaScript if you're using Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<form action="{{ route('reviews.update', $review->id) }}" method="POST" id="editReviewForm">
@csrf
@method('PATCH')

<!-- Title Field -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $review->title }}">
    </div>

    <!-- Description Field -->
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="5">{{ $review->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="note">Note:</label>
        <div class="rating">

            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->note)
                    <i class="star fas fa-star" data-value="{{ $i }}"></i>
                @else
                    <i class="star far fa-star" data-value="{{ $i }}"></i>
                @endif

            @endfor
                <input type="hidden" name="note" id="note" value="{{ $review->note }}">
        </div>

    </div>

    <!-- Tags Field -->
    <div class="form-group">
        <label>Select Tags:</label>
        @foreach ($tags as $tag)
            <label>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, $review->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                <span style="background-color: {{ $tag->color }}; padding: 2px 6px; border-radius: 4px; margin-right: 5px;"></span>
                {{ $tag->name }}
            </label>
        @endforeach
    </div>

    <!-- Image Preview Field -->


    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update Review</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Handle form submission
        $('#editReviewForm').on('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // Close the modal upon successful update
                    $('#editReviewModal').modal('hide');
                },
                error: function(data) {
                    // Handle errors if needed
                }
            });
        });

        // Handle star rating
        $('.star').on('click', function() {
            const value = $(this).data('value');
            $('#note').val(value);
            $('.star').each(function(index, star) {
                if (index < value) {
                    $(star).addClass('fas').removeClass('far');
                } else {
                    $(star).addClass('far').removeClass('fas');
                }
            });
        });
    });
</script>
</body>
</html>
