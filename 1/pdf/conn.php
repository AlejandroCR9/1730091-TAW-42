<?php
$server = "localhost";
$pass = "";
$user = "root";
$db = "dbsaas";

//crear conexion
$mysqli = new mysqli('localhost', 'root', '', 'dbsaas');
$conn = mysqli_connect($server,$user,$pass,$db);
mysqli_set_charset($conn, 'utf8');
if (!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
?>
