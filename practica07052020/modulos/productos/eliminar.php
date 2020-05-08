<?php
include_once "../../conn.php";

$id = $_POST['id'];

$sql = "DELETE FROM productos WHERE id ='$id'";
if(mysqli_query($conn,$sql)){
    echo '<script>alert("Eliminado")</script>';
    echo "<script>location.href='panel.php'</script>";
}else{
    echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>