<?php
include_once "../../conn.php";

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$usuario= $_POST['usuario'];
$tiempo = $_POST['tiempo'];
$consola = $_POST['consola'];
$tiempo = $_POST['tiempo'];
$total = $_POST['total'];
$monedas = $_POST['monedas'] * $tiempo;
$accion="Rentaste ".$tiempo." de tiempo en la ".$consola." con un total de: ".$total." ganando ".$monedas." de monedas";
$sql = "INSERT INTO renta (fecha, hora, idGamer, tiempo, idConsola, total) 
VALUES ('$fecha', '$hora', '$usuario', '$tiempo', '$consola', '$total')";

$sql2 = "UPDATE usuarios SET monedas=monedas+'$monedas' WHERE idUsuario ='$usuario'";

$sql3="INSERT INTO historial (fecha,hora, descripcion, idUsuario) VALUES('$fecha','$hora','$accion','$usuario');"; 

if(mysqli_query($conn,$sql) ){
	mysqli_query($conn,$sql2);
	mysqli_query($conn, $sql3);
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>