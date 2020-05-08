<?php
include_once "../../conn.php";

$Nombre = $_POST['nombre'];
$Ap = $_POST['apellidos'];
$Fecha = $_POST['fecha'];
$Genero = $_POST['genero'];
$Telefono = $_POST['telefono'];
$Correo = $_POST['correo'];
$Tag = $_POST['gamertag'];
$Contra = $_POST['contra'];
$Redes = $_POST['redes'];

$Foto=$_FILES['foto']['tmp_name'];
$ruta='../../files/usuarios/'.$Nombre.' '.$Ap.'/';
mkdir($ruta, 0777, true);
$nombreFoto=$_FILES['foto']['name'];
$rutaFoto=$ruta.$nombreFoto;


$sql = "INSERT INTO usuarios (nombre, apellidos, fechaNacimiento, idGenero, telefono, correo, gamerTag, rutaFoto, redesSociales, contrasena) 
VALUES ('$Nombre', '$Ap', '$Fecha', '$Genero', '$Telefono', '$Correo', '$Tag', '$rutaFoto', '$Redes', '$Contra')";
if(mysqli_query($conn,$sql)){
    move_uploaded_file($Foto, $rutaFoto);
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='../../login.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>