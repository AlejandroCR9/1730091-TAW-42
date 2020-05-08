<?php
include_once "../../conn.php";

$Titulo = $_POST['titulo'];
$Plat = $_POST['plataforma'];

$sql="SELECT nombre FROM plataformas WHERE idPlataforma = $Plat"; 
  $plataforma="";
  $result = mysqli_query($conn, $sql);
  while ($valores = mysqli_fetch_array($result)) {
    $plataforma = $valores['nombre'];
  }

$Foto=$_FILES['foto']['tmp_name'];
$ruta='../../files/juegos/'.$plataforma.'-'.$Titulo.'/';
mkdir($ruta, 0777, true);
$nombreFoto=$_FILES['foto']['name'];
$rutaFoto=$ruta.$nombreFoto;

$sql = "INSERT INTO juegos (titulo, idPlataforma, rutaImagen) VALUES ('$Titulo', '$Plat', '$rutaFoto')";
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