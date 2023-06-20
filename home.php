<?php

session_start();
include_once 'submit/database_handler.php';
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/homepage.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css">
    <nav class="navPanel">
        <ul class="menu_items">

            <li class="menu_item">
                <a id="a1" href="home.php">
                    <h5>HOMEPAGE</h5>
                </a>
            </li>



            <?php

            $adminName = "admin";
            if (isset($_SESSION["userName"])) {
                
                echo"
                <li class='menu_item'>
               <a href='orarul_meu.php'>
                   <h5>ORARUL MEU</h5>
               </a>
           </li>
           <li class='menu_item'>
               <a href='activities.php'>
                   <h5>ACTIVITATI</h5>
               </a>
           </li> ";

                echo "<li class='menu_item'><a href='submit/logout.sub.php'> <h5>LOGOUT</h5> </a> </li>";

                if ($_SESSION["userName"] == $adminName) {
                    echo "<li class='menu_item'><a href='admin_page.php'> <h5>ADMIN PAGE</h5> </a> </li>";
                }
            } else {
                
                echo "<li class='menu_item'><a href='login.php'> <h5>LOGIN</h5> </a> </li>";
            }

            ?>
             
            <li class="menu_item">
                <a href="contact_us.php">
                    <h5>CONTACT US</h5>
                </a>
            </li>
            <li class="menu_item">
                <a href="userguide_schollarly.html">
                    <h5>DOCUMENTATIE</h5>
                </a>
            </li>
            


        </ul>

    </nav>
    <div class="homepage_section">
        <h1>HOMEPAGE</h1>
    </div>
 <?php   

require_once 'vendor/autoload.php';
require_once 'config.php';
//error_reporting(0);
//session_start();
// authenticate code from Google OAuth Flow

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  //$email =  $google_account_info->email;
 // $name =  $google_account_info->name;
  $userinfo = [
    'email' => $google_account_info['email'],
    'last_name' => $google_account_info['givenName'],
    'first_name' => $google_account_info['familyName'],
    'full_name' => $google_account_info['name'],
    'verified_email' => $google_account_info['verifiedEmail'],
    'token_id' => $google_account_info['id']
    ];

$_SESSION['userName']=$google_account_info['name'];

        // if(isset($_SESSION['userName']))
         //echo'ok111';
        



//vedem daca user exista deja in database

$sql="SELECT * FROM users2 WHERE email='{$userinfo['email']}'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    //user exista
    $userdata=mysqli_fetch_assoc($result);
    $token_id=$userdata['token_id'];
}else{
    $sql="INSERT INTO users2(email,first_name,last_name,full_name,verified_email,
    token_id) VALUES('{$userinfo['email']}','{$userinfo['first_name']}','{$userinfo['last_name']}','{$userinfo['full_name']}','{$userinfo['verified_email']}','{$userinfo['token_id']}')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "user is created";
        $token_id=$userinfo['token_id'];
    }else{
        "user is not created";
        die();
    }
}
  echo "<pre>";
 // print_r($google_account_info);//aici am date user 
  $_SESSION['user_token'] = $token_id;


  // now you can use this profile info to create account in your website and make user logged in
};


?>
 <div class="social_menu">
            <div class="media_button">
                <a href="https://www.facebook.com/FacultateaDeInformaticaUAICIasi">
                    <img src="css/images/image8.png" alt="image8">
                </a>
            </div>
            <div class="media_button">
                <a href="https://www.info.uaic.ro/?fbclid=IwAR0y8-oeAUUfYWoya-yIpU3xbNOlAk1YLuvbzmVHb0aLI5psHp4mNiG8dcI">
                    <img src="css/images/image71.png" alt="image7">
                </a>
            </div>
            <div class="media_button">
                <a href="https://profs.info.uaic.ro/~orar/participanti/orar_I3A6.html">
                    <img src="css/images/image91.png" alt="image9">
                </a>
            </div>
            <div class="media_button">
                <a href="https://discord.com/channels/891080993962856468/891080995045007371">
                    <img src="css/images/image81.png" alt="image9">
                </a>
            </div>
        </div>

</body>

</html>