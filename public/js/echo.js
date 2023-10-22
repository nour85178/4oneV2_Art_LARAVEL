import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-app-key',
    cluster: 'your-pusher-app-cluster',
    encrypted: true,
});

// Join the channel
window.Echo.channel('chat')
    .listen('MessageSent', (event) => {
        // Handle new messages received
        console.log('New message received:', event);
        // You can update the chat interface with the new message here
        // For example, append the message to the chat interface
        appendMessage(event.user.name, event.message.content);
    });
function appendMessage(username, content) {
    const messagesContainer = document.getElementById('messages');
    const messageElement = document.createElement('div');
    messageElement.className = 'message';
    messageElement.innerHTML = `<strong>${username}:</strong> ${content}`;
    messagesContainer.appendChild(messageElement);
}
