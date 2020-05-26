<?php
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<H1>EDITAR USUARIO</H1>
	<form method="post">
		<?php 
			$editarUsuario= new catController();
			$editarUsuario->editarCatController();
			$editarUsuario->actualizarCatController();
		?>
	</form>