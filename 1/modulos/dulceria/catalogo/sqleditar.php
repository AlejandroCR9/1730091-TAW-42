<?php
include_once "../../../conn.php";

/*session_start();
$idUser = $_SESSION['idUsuario'];
$sql2="SELECT idOrganizacion FROM organizaciones WHERE idUsuario='$idUser'"; 
$idOrg="";
$result = mysqli_query($conn, $sql2);
if ($valores = mysqli_fetch_array($result)) {
  $idOrg = $valores['idOrganizacion'];
}*/

$Id = $_POST['id'];
$Name = $_POST['nombre'];
$Price = $_POST['precio'];

$sql = "UPDATE dulceria SET nombre = '$Name', precio = '$Price' WHERE idDulce ='$Id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Dulce modificado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>