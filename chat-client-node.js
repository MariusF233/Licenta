const ws = new WebSocket('ws://localhost:8080');
const messagesDiv = document.getElementById('messages');
const sender = "<?php echo $_SESSION['userName']; ?>"; // Use PHP to get the username.

ws.onmessage = (event) => {
    const message = event.data;

    appendMessage(message.user, message.message);
};

function sendMessage() {
    const messageInput = document.getElementById('message');
    const message = messageInput.value;
    const receiver = document.getElementById('receiver-dropdown').value; // Get the selected receiver.
    ws.send(JSON.stringify({ user: sender, receiver, message })); // Include sender and receiver.
    appendMessage(sender, message);
    messageInput.value = '';
}

function appendMessage(user, message) {
    messagesDiv.innerHTML += `<p><strong>${user}:</strong> ${message}</p>`;
}
