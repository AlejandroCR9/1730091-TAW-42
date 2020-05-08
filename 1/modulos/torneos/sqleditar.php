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
$Titulo = $_POST['titulo'];
$Juego = $_POST['juego'];
$Fecha = $_POST['fecha'];
$Hora = $_POST['hora'];
$Mod = $_POST['modalidad'];
$Forma = $_POST['forma'];
$cant = $_POST['cantidad'];
$Desc = $_POST['descripcion'];
$Estatus = $_POST['estatus'];

$sql = "UPDATE torneos SET titulo = '$Titulo', idJuego = '$Juego', fecha = '$Fecha', 
idModalidad = '$Mod', idForma = '$Forma', maxJugadores = '$cant', descripcion = '$Desc', 
idEstatus = '$Estatus' WHERE idTorneo ='$Id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Torneo modificado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>