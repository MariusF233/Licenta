<?php
session_start();
require('submit/database_handler.php');

// Handle the message from the POST request.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    // Get the message from the POST request.
    $message = $_POST["message"];
    
    // You can get the username from your session as you mentioned ($_SESSION['username']).
    $sender = $_SESSION['userName'];
    $receiver=$_POST['receiver'];
    // Prepare an SQL statement.
    $sql = "INSERT INTO chats (sender,receiver, message_content) VALUES (?,?,?)";

    // Create a prepared statement.
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement.
        $stmt->bind_param("sss", $sender,$receiver, $message);

        if ($stmt->execute()) {
            // Message inserted successfully.
            $response = ["success" => true];
        } else {
            // Handle the case where the message failed to send.
            $response = ["success" => false, "error" => $conn->error];
        }

        // Close the prepared statement.
        $stmt->close();
    } else {
        // Handle cases where the prepared statement could not be created.
        $response = ["success" => false, "error" => $conn->error];
    }

    // Return a JSON response.
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Handle cases where the request is not valid.
    $response = ["success" => false, "error" => "Invalid request."];

    // Return a JSON response.
    header("Content-Type: application/json");
    echo json_encode($response);
}

// Close the database connection.
$conn->close();
?>
