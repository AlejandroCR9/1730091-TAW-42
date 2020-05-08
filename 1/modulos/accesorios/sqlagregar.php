<?php
include_once "../../conn.php";

$Cons = $_POST['consola'];
$Descr = $_POST['descripcion'];
$uni = $_POST['unidades'];
$prenta = $_POST['preciorenta'];

$sql = "INSERT INTO accesorios (idConsola, descripcion, unidades, preciorenta) 
VALUES ('$Cons', '$Descr', '$uni', $prenta)";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>