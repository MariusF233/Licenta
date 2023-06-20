<?php

require_once 'submit/database_handler.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


$activityId = $_POST['activityId'];


$activityId = $conn->real_escape_string($activityId);


$sql = "DELETE FROM `activities2` WHERE nume_activitate='".$activityId."'";

// Execute  SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Data deleted successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();


?>