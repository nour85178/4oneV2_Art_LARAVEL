@extends('layout.layout') <!-- You can use your layout or extend another one -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Commande Created</div>

                <div class="card-body">
                    <p>Your Commande has been created successfully.</p>
                    <a href="{{ route('commandes.index') }}" class="btn btn-primary">Back to Commandes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
