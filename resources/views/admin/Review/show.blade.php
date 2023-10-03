@extends('layout.layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Review Details</h1>

            <div class="card">
                <div class="card-body">
                    <h2>{{ $review->description }}</h2>
                    <p>Note: {{ $review->note }}</p>
                    <p>Like: {{ $review->Like }}</p>
                    <p>DisLike: {{ $review->Dislike }}</p>
                    <p>Image: {{ $review->image }}</p>
                    <p>Avis: {{ $review->PosNeg }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
