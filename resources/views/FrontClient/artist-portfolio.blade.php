@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row d-flex flex-column">
        <div>
            <div>
                <h1>{{ $artist->name }}'s Portfolio</h1>
            </div>
            <div>
                <a href="{{ route('requests.create', $artist) }}">Envoyer une demande</a>
            </div>
        </div>



        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="box_main">
                        <h4 class="shirt_text">{{ $product->titre }}</h4>
                        <p class="price_text">Description <span style="color: #262626;">
                                {{ $product->description }}</span></p>
                        <h4 class="shirt_text">{{ $product->category }}</h4>
                        <div class="tshirt_img">
                            <a href="{{ route('products.getprod', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    style="width: 300px; height: 300px;">
                            </a>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>




</div>

@include('FrontClient.footerfront')
