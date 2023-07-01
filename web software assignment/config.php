<?php
$servername='localhost';
$username="root";
$password="allah@01";
$database = 'login';
$port = 3307;
$conn = mysqli_connect($servername,$username,$password,$database, $port);
if(!$conn){
    die('Connection error: ' . mysqli_connect_error());
}
else{
    
}
$db_select = mysqli_select_db($conn,$database);
?>