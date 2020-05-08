<?php
include_once "../../conn.php";
date_default_timezone_set('America/Mexico_City');
$tot = $_GET['total'];
$id = $_GET['idUsuario'];
$mon=$tot *.30;
//$Price = $_POST['precio'];
$fecha=date("Y").'/'.date("m").'/'.date("d");
$hora=(date("h").':'.date("i"));

$con=mysqli_query($conn,"SELECT idUsuario, monedas FROM usuarios WHERE gamerTag='$id'");
$aux=mysqli_fetch_array($con);
$aux2=$aux['idUsuario'];
$money=$aux['monedas']+$mon;

$sql = "INSERT INTO ventasdulces (fecha, total,user,monedas) VALUES ('$fecha','$tot','$id',$mon)";
$acccion="Compraste un total de: ".$tot." pesos en productos de dulceria"." ganando ".$mon." en monedas.";
$sql2="INSERT INTO historial (fecha,hora, descripcion, idUsuario) VALUES('$fecha','$hora','$acccion','$aux2');";
$sql3="UPDATE usuarios SET monedas='$money' WHERE gamerTag='$id'";


if(mysqli_query($conn,$sql)){
	mysqli_query($conn,$sql2);
	mysqli_query($conn,$sql3);
  	echo true;
}else{
   echo  false;
}




mysqli_close($conn);

?>