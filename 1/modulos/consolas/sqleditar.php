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
$Num = $_POST['numero'];
$Plat = $_POST['plataforma'];
$Serial = $_POST['serial'];
$phora = $_POST['preciohra'];

$sql = "UPDATE consolas SET numero = '$Num', idPlataforma = '$Plat', serial = '$Serial', preciohra = $phora WHERE idConsola ='$Id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Consola modificada")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>