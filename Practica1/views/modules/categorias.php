<?php
	session_start();
	
	if(isset($_SESSION["validar"])){
		if(!$_SESSION["validar"]){
			header("location:index.php?action=ingresar");
			exit();
		}
	}else{
		header("location:index.php?action=ingresar");
		exit();
	}

?>

<H1>Categorias</H1>
	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>¿Editar?</th>
				<th>¿Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$vistaUsuario= new catController();
				$vistaUsuario-> vistaCatController();
				$vistaUsuario-> borrarCatController();
			?>

		</tbody>
	</table>	
	<?php 
		if(isset($_GET["action"])){
			if($_GET["action"]=="cambio"){
				echo "Cambio exitoso";
			}
		}
	?>