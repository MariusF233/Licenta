<?php

session_start();

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

                echo "
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
        <h1>LOGIN</h1>

        <div class="register_section">
        

        <form class="register_form" action="submit/login.sub.php" method="post">
            <div class="border_line"></div>

            <label  >name:</label>
            <input type="text" name="name" class="register_form_text" placeholder="your name" />
            
           
            <label >password:</label>
            <input type="password" name="password" class="register_form_text" placeholder="your password" />
             
            
            
            <button type="submit" name="submit" class="register_btn"> Login </button>
          
          
        <?php
   
   if(isset($_GET["error"])){
       if($_GET["error"]=="emptyinput"){
           echo "<h3>Empty fields</h3>";
       }
       else if($_GET["error"]=="wrongName")
       {
        echo "<h3>wrong name</h3>";
       }
       else if ($_GET["error"]=="wrongPassword")
       {
        echo "<h3>wrong password</h3>";
       }
      
   }
   
   ?>
   




        <?php

        require_once 'vendor/autoload.php';
        require_once 'config.php';
        //error_reporting(0);

      


        echo "
         <button type='submit' name='login' class='register_btn'> <a  href='" . $client->createAuthUrl() . "'>Google Login</a> </button>";

        ?>
     </form>
    </div>
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

</html>