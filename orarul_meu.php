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
        <h1>ORAR</h1>



        <div class="orar_section">


            <?php
            /*if(isset($_SESSION['userName'])){
          echo $_SESSION['userName'];  
                }
                 */

            include('simple_html_dom.php');
            $nume_user = $_SESSION['userName'];
            $sql = "SELECT * FROM detalii_user WHERE nume_user='" . $nume_user . "';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_fetch_assoc($result);

            if ($resultCheck > 0) {
                $an = $resultCheck['an'];
               // echo  $an;
                $facultatea = $resultCheck['facultate'];
               // echo $facultatea;
                $grupa = $resultCheck['grupa'];
                //echo $grupa;

                if($facultatea=="fac_informatica"){//am orar info

                    $url="https://profs.info.uaic.ro/~orar/participanti/orar_I" . $an . $grupa . ".html";

                }else if($facultatea="fac_FEAA"){//am orar FEAA

                    $url="https://elearning.feaa.uaic.ro/pluginfile.php/384896/mod_resource/content/1/web/participanti/orar_".$grupa.".html";
                
                }


                //trimitem un GET request ca sa iau html de la  alt website
                //zona de completat facultatea,grupa dupa sa apare automat orarul
                //inatai sa isi puna singur datele
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url); //de aici iau
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //pun variabila return transfer=true ca sa pot salva html intro variabila

                $html = curl_exec($ch);

                //var_dump($html);//merge

                $dom = new DOMDocument();
                @$dom->loadHTML($html);

                //var_dump($dom);

                $trs = $dom->getElementsByTagName('tr');

                $tr_array = array();
                $cuvinte = array();
                foreach ($trs as $tr) {
                    $title_text = $tr->textContent;
                    $tr_array[] = $title_text;
                    echo '<h3 class="orar_text">' . $title_text . '</h3> <br>';
                    $cuvinte = preg_split('/ +/', $title_text); //despart dupa 1 sau mai multe spaces

                    // echo $cuvinte[0].$cuvinte[5];



                }


                //var_dump($trs);
            } else {
                echo '<form class="new_visit_form" action="submit/detalii.sub.php" method="post">
                <div class="border_line"></div>

                <label>Facultate:</label>
                <select name="facultatea">
                    <option value="">Tip</option>
                    <option value="fac_informatica">Facultatea de informatica</option>
                    <option value="fac_FEAA">FEAA</option>
                    <option value="fac_matematica">Facultatea de matematica</option>

                </select>

                <div class="an_area">
                    <label>Anul:</label>
                    <div>
                        <input type="radio" name="an_1" value="an_1">
                        <label>An I</label>
                    </div>
                    <div>
                        <input type="radio" name="an_2" value="an_2">
                        <label>An II</label>
                    </div>
                    <div>
                        <input type="radio" name="an_3" value="an_3">
                        <label>An III</label>
                    </div>
                    <div>
                        <input type="radio" name="an_4" value="an_4">
                        <label>An IV</label>
                    </div>
                    <div>
                        <input type="radio" name="cursant" value="cursant">
                        <label>cursant</label>
                    </div>
                </div>
                <label>Grupa:</label>
                <input type="text" name="grupa" class="new_visit_form_text" placeholder="grupa">
                <button type="submit" name="buton_detalii" class="submit_btn"> Submit</button>

            </form>
                ';
            }
            ?>

            <?php

            //error handle

            if (isset($_GET["error4"])) {
                if ($_GET["error4"] == "emptyinputs") {
                    echo "<h3>Empty field!</h3>";
                }
            }
            //  $id++;
            //  echo $id;
            //sa am si ziua imppartita pe ore ca in google calendar
            //
            ?>

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

<!--prorpiul template ,fara stl,iterarea perechilor cheie-valoare folosind for each si auto,
key-value-index in map
toate cele 3 aspecte sa fie acoperite in for each
ca sa mearga for each,am nevoie de 2 metode begin si end care sa dea un pointer catre first si last element din vectorul
meu de x elem.
in cursul 8 avem explicat la slide 50 clasa myvector si am si met begin si end ultimul elem e x[10]
end da adressa de dupa ultimul elem

la auto 

cursul 8 am exemple am o structurea care simuleaza structura key-value-index,un array de 100 elem in clasa map
in struct respectiva sa am aceste 3 elem de structure binding

fac o clasa cu membri publici cei 3

get->o val la o cheie
set->sa returneze val pt o cheie data
clear
delete
includes
        -->