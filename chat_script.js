$(document).ready(function () {
    // Function to append a message to the chat interface.
    function appendMessage(message, sender) {
        var messageHTML = '<div><strong>' + sender + ':</strong> ' + message + '</div>';
        $('#messages').append(messageHTML);
    }

    // Use jQuery to send messages with AJAX.
    $('#form_messages').submit(function () {
        var message = $('#message').val();
        var sender = $('#users_name').text().trim();
        var receiver = $('#receiver-dropdown option:selected').text();

        // Send the message using AJAX to a PHP script that stores it in the database.
        $.post('send_message.php', { message: message, receiver: receiver }, function (response) {
            if (response.success) {
                appendMessage(message, sender);
            } else {
                alert('Message sending failed.');
            }
        });

        $('#message').val(''); // Clear the input field.
        return false; // Prevent form submission.
    });

    // Function to update messages based on the selected user.
    function updateMessages(selectedUser) {
        $.get('get_messages.php?receiver=' + selectedUser, function (messages) {
            $('#messages').empty(); // Clear existing messages.

            for (var i = 0; i < messages.length; i++) {
                var message = messages[i];
                if (message.message_content && message.sender) {
                    appendMessage(message.message_content, message.sender);
                }
            }
        });
    }

    // Use setInterval to periodically fetch new messages.
    setInterval(function () {
        $.get('get_messages.php', function (messages) {
            for (var i = 0; i < messages.length; i++) {
                var message = messages[i];
                if (message.message_content && message.sender) {
                    appendMessage(message.message_content, message.sender);
                }
            }
        });
    }, 5000); // Poll every 5 seconds.

    // Initially load messages for the first selected user
    var initialSelectedUser = $('#receiver-dropdown option:selected').text();
    updateMessages(initialSelectedUser);

    // Add an event listener to handle user changes in the dropdown
    $('#receiver-dropdown').change(function() {
        var selectedUser = $('#receiver-dropdown option:selected').text();
        updateMessages(selectedUser);
    });
    
});
