<?php
session_start();
include_once 'submit/database_handler.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feedback Form</title>
    <style type="text/css" media="screen">
   
    *{
        background: #717D7E;
    padding: 40px 0;
   
   
    } 
    h1{
    text-align: center;
    color: #ddd;
    margin-bottom: 20px;
    }
    .contact_btn {
    float: center;
    width: 10vw;
    border: 0;
    margin-top: 10px;
    background: #34495e;
    color: #fff;
    padding: 12px 50px;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.5s;
}

.contact_btn:hover{
    background: #2980b9;
    box-shadow: 0 2px 10px 4px #34495e;
}
    </style>
    </head>
    
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$subject=$_POST['subject'];
$mailFrom=$_POST['email'];
$message=$_POST['message'];

$to="fmarius12345@gmail.com";

//$message="Name:".$name."\n"."Email:".$email."\n"."Wrote the following: "."\n".$msg;
$headers="From: ".$mailFrom;
$txt="you have recieved an email from:".$name.".\n\n".$message;
if(mail($to,$subject,$txt,$headers)){
echo "<h1>Sent successfull"." ".$name.",we will contact you soon!</h1>";

}else{
    echo "error";
}

}

?>

    <a href="contact_us.php">
         BACK
    </a>

</html>