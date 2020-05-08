<?php
include_once "../../conn.php";
session_start();
$usuario = $_SESSION['idUsuario'];


$Id = $_POST['id'];
$ma=$_POST['max'];
$actual = $_POST['actual'] + 1;
$sql = "SELECT * FROM torneosusuarios t WHERE t.idTorneo='$Id' AND t.idUsuario='$usuario'";
$a=$conn->query($sql);

if($actual > $ma){
	echo '<script>alert("Ya no hay cupo para el torneo")</script>';
	echo '<script type="text/javascript"> history.back();</script>';
}
if(mysqli_fetch_array($a) != NULL){
	echo '<script>alert("Ya estas registrado")</script>';
	echo '<script type="text/javascript"> history.back();</script>';
}else{
	$sql = "INSERT INTO torneosusuarios (idTorneo, idUsuario) VALUES ('$Id','$usuario')";
	$sql2 = "UPDATE torneos SET	jugadoresActuales = '$actual' WHERE idTorneo ='$Id'";
	if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2 )){
	    echo '<script>alert("Registro a torneo exitoso")</script>';
	    echo "<script>location.href='panel.php'</script>";
	}else{
	    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
	    echo '<script type="text/javascript"> history.back();</script>';
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);

?>