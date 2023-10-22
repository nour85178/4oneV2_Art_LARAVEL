@extends('FrontArtiste.style')
@include('FrontArtiste.navbarfront')


    <div class="container">
        <h1>Chat as an Artist</h1>

        <!-- List of conversations with clients -->
        <h2>Your Conversations</h2>
        <ul>
            @foreach ($conversations as $conversation)
                <li>
                    <a href="{{ route('chat.conversation', $conversation->client) }}">
                        Chat with {{ $conversation->client->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@include('FrontArtiste.footerfront')
