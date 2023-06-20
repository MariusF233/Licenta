<?php
session_start();

?>

<?php

if(isset($_POST["buton_detalii"])){
    /*//echo 'ok';
    if(isset($_SESSION['userName']))
               { $user=$_SESSION['userName'];
                  echo $user;  
              }

              */
   
$facultatea=$_POST["facultatea"];
$grupa=$_POST["grupa"];

if(isset($_POST["an_1"]))
{
    $an=1;
}else if(isset($_POST["an_2"]))
{
    $an=2;
}else if(isset($_POST["an_3"]))
{
    $an=3;
}else if(isset($_POST["an_4"]))
{
    $an=4;
}else if(isset($_POST["cursant"]))
{
    $an="cursant";
}

$nume_user=$_SESSION['userName'];





require_once 'database_handler.php';
require_once 'functions.sub.php';

   if(empty($facultatea)||empty($grupa)||empty($an)){
       header("location:../orarul_meu.php?error4=emptyinputs");
       exit();

   }

adaugaDetalii($conn,$nume_user,$facultatea,$an,$grupa);
}