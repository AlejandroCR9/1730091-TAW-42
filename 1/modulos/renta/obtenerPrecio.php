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
$sql2 ="SELECT  p.preciohra AS pri FROM consolas c 
INNER JOIN plataformas p WHERE c.idPlataforma = p.idPlataforma AND c.idConsola=".$q; 
$result = mysqli_query($conn, $sql2);
$pre=mysqli_fetch_array($result);


echo $pre['pri'];
mysqli_close($conn);
?>