<?php
include_once "../../conn.php";

$id = $_POST['id'];
$nom = $_POST['nombre'];

$sql = "UPDATE categoriafabricantes SET nombre = '$nom' WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Categoria modificado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    //echo '<script type="text/javascript"> history.back();</script>';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>