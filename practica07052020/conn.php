<?php
$server = "localhost";
$pass = "";
$user = "root";
$db = "practica07052020";

//crear conexion
$mysqli = new mysqli('localhost', 'root', '', 'practica07052020');
$conn = mysqli_connect($server,$user,$pass,$db);
mysqli_set_charset($conn, 'utf8');
if (!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
?>
