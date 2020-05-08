<?php
include_once "../../conn.php";

$id = $_POST['id'];
$nom = $_POST['nombre'];
$dir = $_POST['direccion'];
$tel = $_POST['telefono'];
$correo = $_POST['correo'];
$cat = $_POST['categoria'];

$sql = "UPDATE fabricantes SET nombre = '$nom', direccion = '$dir', telefono='$tel', correo='$correo',idcategoriaf='$cat' WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Modificado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>