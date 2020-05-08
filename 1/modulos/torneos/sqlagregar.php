<?php
include_once "../../conn.php";

$Titulo = $_POST['titulo'];
$Juego = $_POST['juego'];
$Fecha = $_POST['fecha'];
$Hora = $_POST['hora'];
$Mod = $_POST['modalidad'];
$Forma = $_POST['forma'];
$cant = $_POST['cantidad'];
$Desc = $_POST['descripcion'];
$Estatus = $_POST['estatus'];

$Foto=$_FILES['foto']['tmp_name'];
$ruta='../../files/torneos/'.$Titulo.'/';
mkdir($ruta, 0777, true);
$nombreFoto=$_FILES['foto']['name'];
$rutaFoto=$ruta.$nombreFoto;

$sql = "INSERT INTO torneos (titulo, idJuego, fecha, hora, idModalidad, idForma, maxJugadores, descripcion, idEstatus, rutaImagen) 
VALUES ('$Titulo', '$Juego', '$Fecha', '$Hora', '$Mod', '$Forma', '$cant', '$Desc', '$Estatus', '$rutaFoto')";
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