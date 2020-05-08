<?php
include_once "conn.php";
 date_default_timezone_set('America/Mexico_City');
        $Correo = $_POST['correo'];
        $Contra = $_POST['pass'];
		$sql="SELECT idUsuario,nombre,apellidos,idTipo, contrasena, monedas FROM usuarios WHERE correo='$Correo'"; 
		$result = mysqli_query($conn, $sql);

		if ($valores = mysqli_fetch_array($result)) {
			$idUsuario = $valores['idUsuario'];
			$nombre = $valores['nombre'];
			$apellidos = $valores['apellidos'];
			$monedas= $valores['monedas'];
			$rolAux = $valores['idTipo'];
			
			if($Contra == $valores['contrasena']){
				if($rolAux==1){
					session_start();
					$_SESSION["idUsuario"] = $idUsuario;
					$_SESSION["nombre"] = $nombre." ".$apellidos;
					$_SESSION["solquicoins"] = $monedas;
					echo'<script>location.href="admin.php"</script>';
				}else{
					session_start();
					$_SESSION["idUsuario"] = $idUsuario;
					$_SESSION["nombre"] = $nombre." ".$apellidos;
					$fecha=date("Y").'/'.date("m").'/'.date("d");
					$hora=(date("h").':'.date("i"));
					$sql="INSERT INTO historial (fecha,hora, descripcion, idUsuario) VALUES('$fecha','$hora','Iniciaste Sesión','$idUsuario');";
					if(mysqli_query($conn, $sql))
						echo'<script>location.href="gamer.php"</script>';
					else{
						 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				
			}else{
				echo"<script>alert('Contraseña incorrecta')</script>";
				echo '<script type="text/javascript"> history.back();</script>';
			}
		}else{
			echo"<script>alert('Usuario no encontrado')</script>";
			echo '<script type="text/javascript"> history.back();</script>';
		}

?>