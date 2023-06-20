<?php
 require_once 'vendor/autoload.php';

// init configuration
$clientID ='647246637277-qngakog7ku1k14ehlgkn7ornb7b1er9f.apps.googleusercontent.com';
$clientSecret ='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';
$redirectUri ='http://localhost/Licenta/home.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");



//ma conectez la database
$hostname="localhost";
$username="root";
$password="";
$database="licenta-2023";

$conn=mysqli_connect($hostname,$username,$password,$database);



?>