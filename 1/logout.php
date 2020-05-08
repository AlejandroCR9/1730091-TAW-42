<?php  
include_once "conn.php";
	session_start();
	 date_default_timezone_set('America/Mexico_City');
 	$usuario = $_SESSION['idUsuario'];

  	if ($usuario == null || $usuario == ''){
   	 	header("Location: index.php");
		die();
	}

	
	$fecha=date("Y").'/'.date("m").'/'.date("d");
	$hora=(date("h").':'.date("i"));
	$sql="INSERT INTO historial (fecha,hora, descripcion, idUsuario) VALUES('$fecha','$hora','Cerraste Sesión','$usuario');"; 
	if(mysqli_query($conn, $sql)){
		session_destroy();
		header("Location: index.php");
	}
	else{
	   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
?>