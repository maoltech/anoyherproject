<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'mjchat';


$con = mysqli_connect($host, $user, $password, $database);

if (!$con){
    echo "connection error" .mysqli_connect_error();
}
?>