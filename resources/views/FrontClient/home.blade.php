@extends('FrontClient.style')

@include('FrontClient.navbarfront')
<div class="row">
<div class="container">


    <h1>Original Products</h1>

    <div id="originalCarousel" class="carousel slide" data-ride="carousel">
        <!-- Original Products -->
        @foreach ($originalProducts->chunk(3) as $key => $chunk)
            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                <div class="row">
                    @foreach ($chunk as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->titre }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                <div class="tshirt_img">
                                    <a href="{{ route('products.getprod', $product->id) }}" > <img src="{{ asset('storage/' . $product->image) }}" style="width: 300px; height: 300px;"></a>
                                </div>
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{ route('products.show', $product->id) }}">See More</a></div>
                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
    @endforeach

    <!-- Previous and Next Controls for Original -->
        <a class="carousel-control-prev" href="#originalCarousel" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#originalCarousel" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>

<div class="container">
    <h1>Reproduite Products</h1>
    <div id="reproduiteCarousel" class="carousel slide" data-ride="carousel">
        <!-- Reproduite Products -->
        @foreach ($reproduiteProducts->chunk(3) as $key => $chunk)
            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                <div class="row">
                    @foreach ($chunk as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->titre }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                <div class="tshirt_img">
                                    <a href="{{ route('products.getprod', $product->id) }}" > <img src="{{ asset('storage/' . $product->image) }}" style="width: 300px; height: 300px;"></a>
                                </div>
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{ route('products.show', $product->id) }}">See More</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endforeach

    <!-- Previous and Next Controls for Reproduite -->
        <a class="carousel-control-prev" href="#reproduiteCarousel" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#reproduiteCarousel" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
</div>
@include('FrontClient.footerfront')
