<?php
// Include your database connection script.
require('submit/database_handler.php'); 

// Ensure you are receiving data properly from your Node.js server.
$data = json_decode(file_get_contents('php://input'));

if ($data) {
    $sender = $data->user;
    $receiver = $data->receiver;
    $message = $data->message;

    // Insert the message into your database table (e.g., "chats").
    $sql = "INSERT INTO chats (sender, receiver, message_content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $sender, $receiver, $message);

        if ($stmt->execute()) {
            // Message insertion was successful.
            echo json_encode(array("success" => true));
        } else {
            // Error occurred while inserting the message.
            echo json_encode(array("success" => false, "error" => $stmt->error));
        }
        $stmt->close();
    } else {
        // Error preparing the SQL statement.
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
} else {
    // Error: Invalid data received.
    echo json_encode(array("success" => false, "error" => "Invalid data"));
}

// Close your database connection.
$conn->close();
?>
