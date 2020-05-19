<?php
	session_start();
	
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}

?>

<H1>Productos</H1>
	<table border="1">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Precio Compra</th>
				<th>Precio Venta</th>
				<th>Inventario</th>
				<th>¿Editar?</th>
				<th>¿Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$vistaUsuario= new prodController();
				$vistaUsuario-> vistaProdController();
				$vistaUsuario-> borrarProdController();
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