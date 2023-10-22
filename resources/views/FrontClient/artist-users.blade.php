@extends('FrontClient.style')
@include('FrontClient.navbarfront')

<div class="container">
    <div class="row">
        <div>
            <h1>Artists</h1>
        </div>


        <div class="row mt-3">
            @foreach ($artistUsers as $artist)
                <div class="col-md-6">
                    <div class="box_main d-flex flex-column">
                        <h4 class="shirt_text">{{ $artist->name }}</h4>
                        <span class="price_text">Email</span>
                        <p style="color: #262626;">{{ $artist->email }}</p>
                        <!-- Create a link to view the artist's portfolio -->
                        <a href="{{ route('artist-portfolio', $artist) }}">View Portfolio</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@include('FrontClient.footerfront')
