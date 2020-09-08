<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/connection.php";
require_once($path);
$link = mysqli_connect($host, $user, $pass, $database) 
or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
if(isset($_GET['id'])) { $id=$_GET['id']; } 
$result = true;
$result = $result AND mysqli_query($link,"INSERT into person (person_1, person_2, relation_type, year_start, month_start, day_start, year_end, month_end, day_end) values ($relationship_person_1[$i],$relationship_person_2[$i],'$relationship_relation_type[$i]','$relationship_year_start[$i]','$relationship_month_start[$i]','$relationship_day_start[$i]','$relationship_year_end[$i]','$relationship_month_end[$i]','$relationship_day_end[$i]' )");

if ($result=='true') { echo'<span style="color: red; font-weight: bold;">OK</span>'; 
$url = "/person/edit.php?id=$id";
ob_start();
header('Location: '.$url);
ob_end_flush();
die();
} 
else { echo'<span style="color: red; font-weight: bold;">Something went wrong</span>'; } 
?>