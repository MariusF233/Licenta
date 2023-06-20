<?php

require_once 'submit/database_handler.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the data sent by the AJAX request
$input = $_POST['input'];
$select = $_POST['select'];
$spanText=$_POST['spanText'];
$text_ora=$_POST['text_ora'];

// Escape the input to prevent SQL injection
$input = $conn->real_escape_string($input);
$select = $conn->real_escape_string($select);
$spanText=$conn->real_escape_string($spanText);
// Prepare the SQL statement
$sql = "INSERT INTO activities2 (nume_activitate, tip_activitate,data1,ora) VALUES ('$input', '$select','$spanText','$text_ora')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();


?>