<?php
	class prodController extends DatosProd{
		
		//enlaces
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca el modelo enalcesPaginaModel para que muestre el listaaod de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//registro
		public function registroProdController(){
			if(isset($_POST["nombreRegistro"])){
				//recibe a traves del metoddo post el name de usuario, passwoer y email se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
				$datosController= array("nombre"=>$_POST["nombreRegistro"],"descripcion"=>$_POST["descripcionRegistro"],"preciocompra"=>$_POST["preciocompraRegistro"],"precioventa"=>$_POST["precioventaRegistro"],"inventario"=>$_POST["inventarioRegistro"], "idcategoria"=>$_POST["idcategoriaRegistro"]);
				//se le dice al modelo model/crud.php (Datos:registroUsuarioModel), en que modelo Datos el metodo registroUsuarioMOdel reciba en sus parmatros los valores $datoaController y el nombre de la tabla a ala cual debe conectarse

				$respuesta = DatosProd::registroProdModel($datosController,"productos");
				//se imprime la respuesta en la vista
				if($respuesta == "success"){
					header("location:index.php?action=okP");
				}else{
					header("location:index.php");
				}
			}
		}
		


		//Vista de usuarios
		public  function vistaProdController(){
			$respuesta = DatosProd::vistaProdModel("productos");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["descripcion"].'</td>
						<td>'.$item["preciocompra"].'</td>
						<td>'.$item["precioventa"].'</td>
						<td>'.$item["inventario"].'</td>
						<td><a href=index.php?action=editarProducto&idEditar='.$item["id"].'><button>Editar</button></td>

						<td><a href=index.php?action=productos&idBorrar='.$item["id"].'><button>Borrar</button></td>
						</tr>';
			}
		}

		//Editar usuario
		public function editarProdController(){
			$datosController=$_GET["idEditar"];
			$respuesta=DatosCat::editarCatModel($datosController,"categorias");

			//Diseñar la estructura de un formulario para que se muestre los datos de la consulta generada en el modelo.
			echo ('<form method="post"><input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			<input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			<input type="submit" value="Enviar"></form>');
		}

		public function actualizarProdController(){
			if(isset($_POST["nombreEditar"])){
				$datosController=array("id"=>$_POST["idEditar"], "nombre"=>$_POST["nombreEditar"]);
				$respuesta=DatosCat::actualizarCatModel($datosController,"categorias");
				if($respuesta=="success"){
					header("location:index.php?action=cambioC");
				}else{
					echo("error");
				}
			}
		}
		public function borrarProdController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=DatosCat::borrarCatModel($datosController,"categorias");
				if($respuesta=="success"){
					header("location:index.php?action=categorias");
				}
			}
		}


	}
?>