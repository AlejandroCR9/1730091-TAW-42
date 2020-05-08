<?php
include_once "../../conn.php";

/*session_start();
$idUser = $_SESSION['idUsuario'];
$sql2="SELECT idOrganizacion FROM organizaciones WHERE idUsuario='$idUser'"; 
$idOrg="";
$result = mysqli_query($conn, $sql2);
if ($valores = mysqli_fetch_array($result)) {
  $idOrg = $valores['idOrganizacion'];
}*/

$Id = $_POST['id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$usuario= $_POST['usuario'];
$tiempo = $_POST['tiempo'];
$consola = $_POST['consola'];
$tiempo = $_POST['tiempo'];
$total = $_POST['total'];
$monedas = $_POST['monedas'] * $tiempo;
$sql = "UPDATE renta SET fecha = '$fecha', hora = '$hora', idGamer = '$usuario', tiempo = '$tiempo', idConsola = '$consola', total = '$total' WHERE idRenta ='$Id'";

$sql2 = "UPDATE usuarios SET monedas=monedas+'$monedas' WHERE idUsuario ='$usuario'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Renta modificada")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>