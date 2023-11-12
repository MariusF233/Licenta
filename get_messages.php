<?php

session_start();

require('submit/database_handler.php'); // Include your database connection script.

// Fetch chat messages from the database.
$receiver = $_GET['receiver'];
$sql = "SELECT * FROM chats WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $_SESSION['userName'], $receiver, $receiver, $_SESSION['userName']);
$stmt->execute();
$result = $stmt->get_result();

$messages = array();
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

// Return messages as JSON.
echo json_encode($messages);
?>
