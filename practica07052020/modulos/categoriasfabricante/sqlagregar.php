<?php
include_once "../../conn.php";

$nom = $_POST['nombre'];

$sql = "INSERT INTO categoriafabricantes (nombre) VALUES ('$nom')";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Registro hecho")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>