@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <h1>Artists</h1>

    <div class="row">
        @foreach ($artistUsers as $artist)
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                    <h4 class="shirt_text">{{ $artist->name }}</h4>
                    <p class="price_text">Email <span style="color: #262626;">{{ $artist->email }}</span></p>

                    <!-- Create a link to view the artist's portfolio -->
                    <a href="{{ route('artist-portfolio', $artist) }}">View Portfolio</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('FrontClient.footerfront')
