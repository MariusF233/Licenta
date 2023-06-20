<?php

require_once 'submit/database_handler.php';

$sql = "SELECT * FROM activities2;";
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Convert the data array to JSON format
echo json_encode($data);

















?>