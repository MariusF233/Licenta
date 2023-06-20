<?php
session_start();



if(isset($_POST["button_activity"])){
    /*//echo 'ok';
    if(isset($_SESSION['userName']))
               { $user=$_SESSION['userName'];
                  echo $user;  
              }

              */
   $nume_activitate=$_POST["nume_activitate"];
   $tip_activitate=$_POST["tip_activitate"];

   
  $nume_user=$_SESSION['userName'];
  $ora=$_POST["ora"];
  $day=$_POST["day"];
  $month=$_POST["month"];
  $year=$_POST["year"];
  

if($day=="day"){
    $day="";
}
 if($month=="month"){
    $month="";
}
if($year=="year"){
    $year="";
}



 if(isset($_POST["30_minutes"])){
    
    $durata="30_minutes";
 }
 else  if(isset($_POST["60_minutes"])){
    $durata="60_minutes";
  }
  else  if(isset($_POST["90_minutes"])){
    $durata="90_minutes";
  }

//echo $name.$detained_name.$relationship.$nature.$date.$duration.$possible_objects.$witness_list;
require_once 'database_handler.php';
require_once 'functions.sub.php';

   if(empty($nume_activitate)||empty($tip_activitate)||empty($ora)||empty($day)||empty($month)||empty($year)||empty($durata)){
       header("location:../activities.php?error4=emptyinputs");
       exit();//verific daca am empty inputs

   }
  /* if(nameExists($conn,$name)==false){
    header("location:../new_visit.php?error4=insertUsername");
    exit();

   }
   */


}

$date=$day."-".$month."-".$year;

createActivity($conn,$nume_activitate,$tip_activitate,$date,$durata);

?>