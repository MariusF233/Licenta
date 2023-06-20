<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Contact_us</title>
        <link rel="stylesheet" href="./css/contact_style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
            .profile_pic{
    height:45px;
    width:45px;
    border-radius:50px;
    margin-left:370px;
}
        </style>
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
    <div class="contact_section">
            <h1>CONTACT US</h1>
            <form class="contact_form" method="post" action="mail_handler.php">
                <div class="border_line"></div>
                <label >name:</label>
                <input type="text" name="name" class="contact_form_text" placeholder="your name">
                <label >email:</label>
                <input type="email" name="email" class="contact_form_text" placeholder="your email" >
                
                
                <label >subject:</label>
                <input type="number" name="subject" class="contact_form_text" placeholder="your phone" >
                <label >message::</label>
                <textarea class="contact_form_text" name="message" placeholder="Your Message"></textarea>         
                <button type="submit" name="submit" value="send" class="contact_btn"> SEND</button>
            
                  
            </form>
        </div>



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

