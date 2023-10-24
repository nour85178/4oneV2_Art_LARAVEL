@extends('layout.layout')
@section('content')

    <style>
        .form-control {
            background-color: white;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Edit Review</h1>

                <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $review->description }}">
                    </div>

                    <div class="form-group">
                        <label for="note">Note:</label>
                        <input type="number" class="form-control" name="note" id="note" min="1" max="5" value="{{ $review->note }}">
                    </div>
                    <div class="form-group">
                        <label for="note">Like:</label>
                        <input type="number" class="form-control" name="like" id="like"  value="{{ $review->like }}">
                    </div>
                    <div class="form-group">
                        <label for="note">Dislike:</label>
                        <input type="number" class="form-control" name="dislike" id="dislike"  value="{{ $review->dislike }}">
                    </div>
                    <div class="form-group">
                        <label for="note">Image:</label>
                        <input type="text" class="form-control" name="image" id="image"  value="{{ $review->image }}">
                    </div>
                    <div class="form-group">
                        <label for="note">Title:</label>
                        <input type="text" class="form-control" name="title" id="title"  value="{{ $review->title }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
