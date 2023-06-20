
<div>


</div>


<?php
session_start();
//error_reporting(0);
$doc=new DOMDocument();

$doc->loadHTMLFile('../activities.php');

$span_luni=$doc->getElementById('luni');
$span_an=$doc->getElementById('an');
$span_cu_data=$doc->getElementById('span-cu-data');

$inner_value_luni=$span_luni->nodeValue;
$inner_value_an=$span_an->nodeValue;

//$inner_value_span_cu_data=$span_cu_data->nodeValue;

echo $inner_value_an.$inner_value_luni;


//echo $inner_value_span_cu_data;
if(isset($_POST['hidden_value_luni'])){//ar trebui sa am valoare actuala luna
    $val=$_POST['hidden_value_luni'];
    
    echo $val;

}

//header();


?>
