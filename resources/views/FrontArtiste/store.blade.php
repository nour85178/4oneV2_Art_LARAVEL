@extends('FrontArtiste.Styleprod')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">product Created</div>

                <div class="card-body">
                    <p>Your product has been created successfully.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
