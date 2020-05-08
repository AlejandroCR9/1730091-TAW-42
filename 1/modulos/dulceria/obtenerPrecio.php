<?php
include_once "../../conn.php";

/*session_start();
$idUser = $_SESSION['idUsuario'];

$idOrg="";
$result = mysqli_query($conn, $sql2);
if ($valores = ) {
  $idOrg = $valores['idOrganizacion'];
}*/

$q = $_REQUEST["q"];
$sql = "SELECT precio AS pri FROM dulceria WHERE nombre = '$q'";
$result = mysqli_query($conn, $sql);
$pre=mysqli_fetch_array($result);


echo $pre['pri'];
mysqli_close($conn);
?>