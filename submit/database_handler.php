<?php

$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="licenta-2023";

$conn=mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}


?>