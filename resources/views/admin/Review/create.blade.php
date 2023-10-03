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
            <h1 class="text-center">Create Review</h1>

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>

                <div class="form-group">
                    <label for="note">Note:</label>
                    <input type="number" class="form-control" name="note" id="note" min="1" max="5">
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="text" class="form-control" name="image" id="image">
                </div>

                <div class="form-group">
                    <label for="like">Like:</label>
                    <input type="number" class="form-control" name="like" id="like">
                </div>

                <div class="form-group">
                    <label for="dislike">Dislike:</label>
                    <input type="number" class="form-control" name="dislike" id="dislike">
                </div>

                <div class="form-group">
                    <label for="PosNeg">PosNeg:</label>
                    <input type="checkbox" class="form-check-input" name="PosNeg" id="PosNeg" value="1">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
