<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Events\PusherBroadcast;


class ChatController extends Controller
{
    // Display the chat interface
    public function index()
    {
        // Check the user's role
        if (auth()->user()->role === 'artist') {
            // Handle artist logic, e.g., load conversations with clients
            $conversations = Conversation::where('artist_id', auth()->id())->get();
            return view('chat.artist_index', compact('conversations'));
        } else {
            // Handle client logic, e.g., load artists to chat with
            $artists = User::where('role', 'artist')->get();
            $conversations = auth()->user()->conversations;
            return view('chat.client_index', compact('artists', 'conversations'));
        }
    }

    public function sendMessage(Request $request, User $receiver)
    {
        // Create a new message
        $message = new Message();
        $message->sender_id = Auth::id(); // Set the sender
        $message->receiver_id = $receiver->id; // Set the receiver
        $message->message = $request->input('message');

        // Find or create a conversation (you need to define your logic for this)
        $conversation = Conversation::firstOrNew([
            'client_id' => Auth::id(),
            'artist_id' => $receiver->id,
        ]);

        // Save the conversation (if it's new)
        if (!$conversation->exists) {
            $conversation->save();
        }

        // Associate the message with the conversation
        $message->conversation_id = $conversation->id;

        // Save the message
        $message->save();

        // Broadcast the message to the receiver
        broadcast(new PusherBroadcast(Auth::id(), $receiver->id, $message->message));

        // Redirect back to the chat interface
        return redirect()->route('chat.index');
    }


    public function loadConversation(User $artist)
    {
        $user = Auth::user();

        // Find all messages between the client and artist
        $messages = Message::whereIn('sender_id', [$user->id, $artist->id])
            ->whereIn('receiver_id', [$user->id, $artist->id])
            ->orderBy('created_at')
            ->get();

        // Load both client and artist
        $client = $user;

        return view('chat.conversation', compact('artist', 'messages', 'client'));
    }



}

