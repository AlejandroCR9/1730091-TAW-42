<?php
include_once "../../conn.php";

$Num = $_POST['numero'];
$Plat = $_POST['plataforma'];
$Serial = $_POST['serial'];
$phora = $_POST['preciohra'];

$sql = "INSERT INTO consolas (numero, idPlataforma, serial, preciohra) 
VALUES ('$Num', '$Plat', '$Serial', $phora)";
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