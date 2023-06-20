<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

include("submit/database_handler.php");
include("links.php");


$users = mysqli_query($conn, "SELECT * FROM users2 WHERE full_name='" . $_SESSION["userName"] . "'");



$user = mysqli_fetch_assoc($users);

?>


<!DOCTYPE html>
<html>

<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p>Hello <?php echo $user['full_name']; ?> </p>
                <input type="text" id="expeditor" value=<?php echo $user['full_name']; ?> hidden />

                <p>Trimite la:</p>
                <ul>
                    <?php
                    $messages = mysqli_query($conn, "SELECT * FROM users2");



                    while ($message = mysqli_fetch_assoc($messages)) {
                        echo '<li>
                        <a href="?expeditor=' . $message["id"] . '">' . $message["full_name"] . '</a>
                          </li>';
                    };


                    ?>
                </ul>
                <a href="activities.php"><--Back</a>


            </div>
            <div class="col-md-4">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><?php   
                            if(isset($_GET["destinatar"])){

                                $userName = mysqli_query($conn, "SELECT * FROM users2 WHERE full_name='".$_GET["destinatar"]."'");



                                $u_name = mysqli_fetch_assoc($userName);
                                    echo '<input type="text" value='.$_GET["destinatar"].'id="destinatar" hidden/>';
                                    echo $u_name["full_name"];
                                

                            }
                            else{
                                $userName = mysqli_query($conn, "SELECT * FROM users2");



                                $u_name = mysqli_fetch_assoc($userName);
                                $_SESSION["destinatar"]=$u_name["full_name"];

                                    echo '<input type="text" value='.$_SESSION["destinatar"].'id="destinatar" hidden/>';
                                    echo $u_name["full_name"];

                            }
                            //completare auto cu orarul meu
                            //notificari in browser pe orele repsp
                            //impart div egal 
                            //culori diferite sa isi poata alege
                            //descriere eveniment
                            //numar maxim de act care se pot adauga
                            //sa pot modifica act pe div 
                            // sa poata avea profil private
                            //sa isi poate vedea your id 
                            //daca este email valid
                            //la register sa poate verifica email
                            //notificari discord
                            
                            ?><h4>

                        </div>

                        <div class="modal-body" id="msgBody" style="height:200px; overflow-y:scroll; overflow-x:hidden;">
                           <?php 
                           if(isset($_GET["destinatar"])){
                           $chats=mysqli_query($conn,"SELECT * FROM messages WHERE (expeditor='".$_SESSION["full_name"]."'
                           AND destinatar='".$_GET["destinatar"]."') OR (expeditor='".$_GET["destinatar"]."'
                           AND destinatar='".$_SESSION["full_name"]."') ");

                           $chat=mysqli_fetch_assoc($chats);
                           }
                           else{
                            $chats=mysqli_query($conn,"SELECT * FROM messages WHERE (expeditor='".$_SESSION["full_name"]."'
                           AND destinatar='".$_SESSION["destinatar"]."') OR (expeditor='".$_SESSION["destinatar"]."'
                           AND destinatar='".$_SESSION["full_name"]."') ");

                           $chat=mysqli_fetch_assoc($chats);
                           }
                           
                           
                           
                           
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>