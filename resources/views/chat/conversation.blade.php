@include('FrontClient.navbarfront')
    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="chat">
            <div class="top">
                <img src="{{ asset('path_to_your_image.jpg') }}" alt="Artist Image" />
                <h2>Chat with {{ $artist->name }}</h2>
            </div>
            <div class="messages">
                @if ($messages->isEmpty())
                    <p class="message">No messages in this conversation. Start chatting!</p>
                @else
                    @foreach($messages as $message)
                        <div class="message {{ $message->sender_id === Auth::id() ? 'right' : 'left' }}">
                            <p>{{ $message->message }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="bottom">
                <form id="message-form">
                    @csrf
                    <input type="text" name="message" id="message-input" placeholder="Enter message..." autocomplete="off">
                    <button type="submit" id="send-button">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include axios (you may need to install it if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // Use JavaScript to send messages via AJAX
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messagesContainer = document.querySelector('.messages');

    messageForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Get the message text
        const messageText = messageInput.value.trim();

        // Do nothing if the message is empty
        if (messageText === '') {
            return;
        }

        // Disable the form while sending
        messageInput.disabled = true;

        // Send the message via AJAX
        axios.post("{{ route('chat.send', ['receiver' => $artist]) }}", {
            message: messageText
        }).then(response => {
            // Clear the input and re-enable it
            messageInput.value = '';
            messageInput.disabled = false;

            // Add the sent message to the messages container
            const sentMessage = document.createElement('div');
            sentMessage.className = 'message right';
            sentMessage.innerHTML = `<p>${messageText}</p>`;
            messagesContainer.appendChild(sentMessage);

            // Scroll to the bottom of the messages to show the new message
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }).catch(error => {
            console.error(error);
            messageInput.disabled = false;
        });
    });
</script>
</body>
</html>
@include('FrontClient.footerfront')
