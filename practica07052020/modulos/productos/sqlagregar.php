<?php
include_once "../../conn.php";

$nom = $_POST['nombre'];
$des = $_POST['descripcion'];
$pventa = $_POST['precioventa'];
$pcompra = $_POST['preciocompra'];
$color = $_POST['color'];
$cat = $_POST['categoria'];
$fabri = $_POST['fabricante'];

$sql = "INSERT INTO productos (nombre, descripcion, precioventa, preciocompra,color, idcategoria,idfabricante) 
VALUES ('$nom', '$des', '$pventa','$pcompra','$color','$cat','$fabri')";

if(mysqli_query($conn,$sql)){
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    //echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>