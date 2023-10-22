@extends('FrontClient.style')

@include('FrontClient.navbarfront')

<div class="row">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                    <h4 class="shirt_text">{{ $request->product->titre }}</h4>
                    <p class="price_text">Price <span style="color: #262626;">$ {{ $request->product->price }}</span></p>
                    <div class="tshirt_img">
                        <a href="{{ route('products.getprod', $request->product->id) }}"> <img
                                src="{{ asset('storage/' . $request->product->image) }}"
                                style="width: 300px; height: 300px;"></a>
                    </div>
                    <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <div class="seemore_bt"><a href="{{ route('products.show', $request->product->id) }}">See
                                More</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@include('FrontClient.footerfront')
