<?php
$host = 'localhost';
$database = 'peopledb';
$user = 'php_test';
$pass = 'password';

$link = mysqli_connect($host, $user, $pass, $database);
mysqli_set_charset($link, "utf8");
?>