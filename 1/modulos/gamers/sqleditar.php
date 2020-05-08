<?php
include_once "../../conn.php";

$Id = $_POST['id'];
$Nombre = $_POST['nombre'];
$Ap = $_POST['apellidos'];
$Fecha = $_POST['fecha'];
$Genero = $_POST['genero'];
$Telefono = $_POST['telefono'];
$Correo = $_POST['correo'];
$Tag = $_POST['gamertag'];
$Redes = $_POST['redes'];

  $sql = "UPDATE usuarios SET nombre = '$Nombre', apellidos = '$Ap', fechaNacimiento = '$Fecha', idGenero = '$Genero', telefono = '$Telefono', correo = '$Correo', gamerTag = '$Tag', redesSociales = '$Redes' WHERE idUsuario ='$Id'";

if(mysqli_query($conn,$sql)){
    echo '<script>alert("Usuario modificado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>