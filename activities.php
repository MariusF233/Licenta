<?php
session_start();
include_once 'submit/database_handler.php';
include("links.php");
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Activities</title>
    <link rel="stylesheet" type="text/css" href="./css/activities_style3.css?v=1">
    <!--  <link rel="stylesheet" href="./css/calendar_style.css" type="text/css">-->

    <!--  <link rel="stylesheet" href=".css/chatbox.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>



</head>

<body class="intunecat1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css">

    <div class="navPanel">

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
                <div id="users_name">
                    <?php
                    echo $_SESSION['userName'];
                    ?>
                </div>


            </ul>

        </nav>
    </div>


    <div class="div_mare">

        <div class="navPanel2">
            <nav class="nav2">


                <ul class="menu_items2">

                    <li class="menu_item">
                        <a id="a1" href="activities.php">
                            <h5>INTELIGENTA ARTIFICIALA</h5>
                        </a>
                    </li>

                    <li class="menu_item">
                        <a href="activities.php">
                            <h5>SECURITATEA INFORMATIEI</h5>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="activities.php">
                            <h5>PYTHON</h5>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="activities.php">
                            <h5>MACHINE LEARNING</h5>
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="activities.php">
                            <h5>RETELE PETRI SI APLICATII</h5><!--DE LUAT MATERIILE DIN ORARUL  MEU-->
                        </a>
                    </li>


                </ul>

            </nav>

        </div>


        <div class="intunecat" id="id1">
            <div class="calendar"> <!--calendarul,div 2-->
                <div class="calendar-inceput">
                    <span class="luni" id="luni">
                        Ianuarie
                    </span>
                    <input type="hidden" id="hidden_value_luni" name="hidden_value_luni" value="Ianuarie">
                    <div class="spatiu">

                    </div>
                    <div class="ani">
                        <span class="ani-schimba" id="an-precedent">
                            <pre><</pre>
                        </span>
                        <span id="an">2023</span>
                        <span class="ani-schimba" id="an-urmator">
                            <pre>></pre>
                        </span>
                    </div>
                </div>
                <div class="calendar-middle">
                    <div class="zile-sapt">
                        <div>Luni</div>
                        <div>Marti</div>
                        <div>Miercuri</div>
                        <div>Joi</div>
                        <div>Vineri</div>
                        <div>Sambata</div>
                        <div>Duminica</div>
                    </div>
                    <div class="zile">
                        <div><button>1</button></div>
                        <div><button>2</button></div>
                        <div><button>3</button></div>
                        <div><button>4</button></div>
                        <div><button>5</button></div>
                        <div><button>6</button></div>
                        <div><button>7</button></div>
                        <div><button>1</button></div>
                        <div><button>2</button></div>
                        <div><button>3</button></div>
                        <div><button>4</button></div>
                        <div><button>5</button></div>
                        <div><button>6</button></div>
                        <div><button>7</button></div>

                    </div>
                </div>
                <div class="calendar-final">
                    <div class="toggle">
                        <span>Mod intunecat</span>
                        <div class="mod-intunecat-schimba">
                            <div class="mod-intunecat-buton"></div>
                        </div>
                    </div>
                </div>




                <div class="lista-luni">


                </div>
                <div class="lista-ore-mare">
                    <div class="lista-ore-header">









                    </div>
                    <script src="script5.js"></script>
                    <script>


                    </script>

                    <div class="lista-ore">
                        <?php
                        for ($i = 0; $i < 24; $i++) {
                            $zero = '';
                            if ($i < 10) {
                                $zero = "0" . $zero;
                            }
                            echo "<div class='div-ora'>
                <span>" . $zero . $i . ":00</span>
<div class='lista_activitati_create' id='lista_activitati_create" . $i . "'>";

                            $sql = "SELECT * FROM activities2;";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['ora'] == $i) {
                                        echo " <div class='toggle_activitate' id='" . $row['nume_activitate'] . "'> ";
                                        echo $row['nume_activitate'] . ":" . $row['tip_activitate'];


                                        echo "<button class='button_delete' id='button_delete' >X</button></div>";
                                    }
                                }
                            }
                            echo "<script src='delete_activity.js'>

</script>";

                            echo "
</div>



                <button onclick='showForm(\"form" . $i . "\",\"buton-adauga" . $i . "\")' class='buton-adauga' id='buton-adauga" . $i . "'>+</button>
                <div id='form" . $i . "' class='popup_form'>
                    <div class='ajax'>
                        <label>Creaza activitate:</label>
                        <input type='text' id='input_adauga_activitate" . $i . "' name='input_adauga_activitate' class='new_activity_form_text' placeholder='nume activitate'>
                        <select name='select_adauga_activitate' id='select_adauga_activitate" . $i . "' class='tip_activitate_adauga'>
                            <option value=''>Tip</option>
                            <option value='programare_competitiva'>programare competitiva</option>
                            <option value='sport'>sport</option>
                            <option value='practica_pedagogica'>practica pedagogica</option>
                            <option value='recreativa'>recreativa</option>
                        </select>
                        <button type='submit' onclick='hideForm(\"form" . $i . "\")' id='buton_adauga_activitate" . $i . "' name='buton_adauga_activitate' class='buton_adauga_activitate'> Adauga</button>
                    </div>
                </div>
            </div>";
                        }
                        ?>
                    </div>






                    <script>
                        $(document).ready(function() {
                            // Event handler for button click
                            $('[id^="buton_adauga_activitate"]').click(function(e) {
                                e.preventDefault();

                                var buttonId = $(this).attr('id').replace('buton_adauga_activitate', '');

                                var inputContent = $('#input_adauga_activitate' + buttonId).val();
                                var selectContent = $('#select_adauga_activitate' + buttonId).val();

                                $.ajax({
                                    url: 'activities.php',
                                    method: 'POST',
                                    data: {
                                        inputContent: inputContent,
                                        selectContent: selectContent
                                    },
                                    success: function(response) {

                                        var newDiv = $('<div>').text(inputContent + ':' + selectContent);


                                        var deleteButton = $('<button>').attr('id', 'button_delete').text('X');


                                        newDiv.append(deleteButton);


                                        newDiv.addClass('toggle_activitate');

                                        $('#lista_activitati_create' + buttonId).append(newDiv);
                                    },
                                    error: function(xhr, status, error) {

                                        console.log(xhr);
                                        console.log(status);
                                        console.log(error);
                                    }
                                });
                            });
                            $(document).on('click', '#button_delete', function() {
                                // Find the parent div and remove it
                                $(this).parent('div').remove();
                            });
                        });


                        function hideParentForm(button) {
                            $(button).closest('.popup_form').hide();
                        }
                    </script>


                    <script src='script4.js'></script>
                    <script src='script2.js'></script>
                    <script src='delete_activity.js'></script>
                    <!-- <script src="script2.js"></script>
                    -->
                </div>
            </div>



            <script src="script1.js"> </script>
            <!--trebuie schimbat nume-->

        </div>

        <!--sa poate adauga ACTIVITATI
//sa poata adauga alte act care o sa aibe titlu,descrie,
 -->


    </div>


    <!--  <div class="new_visit_section">
        <div>
            <h1>ADAUGA ACTIVITATE</h1>
            <form class="new_visit_form" action="submit/activities.sub.php" method="post">
                <div class="border_line"></div>
                <label> nume activitate:</label>

                <input type="text" name="nume_activitate" class="new_visit_form_text" placeholder="nume">

                <div class="meeting_data">
                    <div class="select_area">
                        <label>Tip activitate:</label>
                        <select name="tip_activitate">
                            <option value="">Tip</option>
                            <option value="programare_competitiva">programare competitiva</option>
                            <option value="sport">sport</option>
                            <option value="practica_pedagogica">practica pedagogica</option>
                            <option value="recreativa">recreativa</option>
                        </select>
                    </div>

                </div>
                <h4>Selecteaza data:</h4>
                <div class="meeting_time">
                    <div class="select_time_area">
                        <div class="time_cell">
                            <label>ora:</label>

                            <select name="ora">
                                <option>ora</option>
                                <?php
                                $ore = ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                                foreach ($ore as $ora) {
                                    echo "<option>" . $ora . "</option>";
                                }


                                ?>


                            </select>
                        </div>
                        <div class="time_cell">
                            <label>day:</label>

                            <select name="day">
                                <option>day</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option>" . $i . "</option>";
                                }

                                ?>


                            </select>
                        </div>
                        <div class="time_cell">
                            <label>month:</label>

                            <select name="month">
                                <option>month</option>
                                <?php
                                $months = ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                foreach ($months as $month) {
                                    echo "<option>" . $month . "</option>";
                                }


                                ?>

                                ]
                            </select>
                        </div>
                        <div class="time_cell">
                            <label>year:</label>
                            <select name="year">
                                <option>year</option>
                                <?php
                                for ($i = 2023; $i <= 2025; $i++) {
                                    echo "<option>" . $i . "</option>";
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="duration_area">
                        <label>Durata:</label>
                        <div>
                            <input type="radio" name="30_minutes" value="30_minutes">
                            <label>30 minute</label>
                        </div>
                        <div>
                            <input type="radio" name="60_minutes" value="60_minutes">
                            <label>60 minute</label>
                        </div>
                        <div>
                            <input type="radio" name="90_minutes" value="90_minutes">
                            <label>90 minute</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="button_activity" class="submit_btn"> Submit</button>
            </form>



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
    <div class="lista_activitati">

        <h1>LISTA ACTIVITATI:</h1>


        <?php
        /* if(isset($_SESSION['userName']))
 { $user=$_SESSION['userName'];
    
} //cand o sa am user setat
*/
        $sql = "SELECT * FROM activities2;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_fetch_assoc($result);

        if ($resultCheck > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                echo  "<h5> Nume activitate: " . $row['nume_activitate'] . " ,    Tip activitate: " . $row['tip_activitate'] . " , Data: " . $row['data1'] . " , Durata: " . $row['durata'] . "</h5><br>";
            }
        }


        ?>



    </div>
    -->

    <div id="chatbox">
    <div id="receiver">
        <select id="receiver-dropdown">
            <?php
            require('submit/database_handler.php');
            $sql = "SELECT * FROM users2;";
            $result = mysqli_query($conn, $sql);

            if ($result) { // Check if the query was successful.
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['full_name']!=$_SESSION['userName']){
                    echo "<option>" . $row['full_name'] . "</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    <div id="messages"></div>
    <input type="text" id="message" placeholder="Type a message">
    <button onclick="sendMessage()">Send</button>
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


    <script>
        const ws = new WebSocket('ws://localhost:8080');
        const messagesDiv = document.getElementById('messages');
        const sender = "<?php echo $_SESSION['userName']; ?>"; // Use PHP to get the username.

        ws.onmessage = (event) => {
    try {
        const message = JSON.parse(event.data);
        appendMessage(message.user, message.message);
    } catch (error) {
        console.error('Received invalid JSON:', event.data);
        // Handle the unexpected data here, or ignore it if needed.
    }
};
function sendMessage() {
    const messageInput = document.getElementById('message');
    const message = messageInput.value;
    const receiver = document.getElementById('receiver-dropdown').value;
    const messageObject = {
        user: sender,
        receiver,
        message
    };

    try {
        ws.send(JSON.stringify({ user: sender, receiver, message }));

        appendMessage(sender, message);
        messageInput.value = '';
    } catch (error) {
        console.error('Error sending message:', error);
    }
}


      /*  function sendMessage() {
            const messageInput = document.getElementById('message');
            const message = messageInput.value;
            const receiver = document.getElementById('receiver-dropdown').value; // Get the selected receiver.
            ws.send(JSON.stringify({
                user: sender,
                receiver,
                message
            })); // Include sender and receiver.
            appendMessage(sender, message);
            messageInput.value = '';
        }
*/
        function appendMessage(user, message) {
            messagesDiv.innerHTML += `<p><strong>${user}:</strong> ${message}</p>`;
        }
    </script>
</body>


</html>