<?php
include_once "../../conn.php";

$Nom = $_POST['nombre'];
$pre = $_POST['precio'];
$cmonedas = $_POST['costomonedas'];
$mganadas = $_POST['monedasganadas'];

$Foto=$_FILES['foto']['tmp_name'];
$ruta='../../files/plataformas/'.$Nom.'/';
mkdir($ruta, 0777, true);
$nombreFoto=$_FILES['foto']['name'];
$rutaFoto=$ruta.$nombreFoto;

$sql = "INSERT INTO plataformas (nombre, preciohra, costomonedas, monedasganadas, rutaImagen) 
VALUES ('$Nom', '$pre', '$cmonedas', $mganadas, '$rutaFoto')";
if(mysqli_query($conn,$sql)){
    move_uploaded_file($Foto, $rutaFoto);
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>