<!-- chat/client_index.blade.php -->

@extends('FrontClient.style')
@include('FrontClient.navbarfront')


    <div class="container">
        <h1>Chat with Artists</h1>

        <!-- List of artists -->
        <ul>
            @foreach ($artists as $artist)
                <li>
                    <a href="{{ route('chat.conversation', $artist) }}">
                        {{ $artist->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- List of conversations -->
        <h2>Your Conversations</h2>
        <ul>
            @foreach ($conversations as $conversation)
                <li>
                    <a href="{{ route('chat.conversation', $conversation->artist) }}">
                        Chat with {{ $conversation->artist->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>


@include('FrontClient.footerfront')
