<?php
	class catController extends DatosProd{
		
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
		public function registroCatController(){
			if(isset($_POST["nombreRegistro"])){
				//recibe a traves del metoddo post el name de usuario, passwoer y email se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
				$datosController= array("nombre"=>$_POST["nombreRegistro"]);
				//se le dice al modelo model/crud.php (Datos:registroUsuarioModel), en que modelo Datos el metodo registroUsuarioMOdel reciba en sus parmatros los valores $datoaController y el nombre de la tabla a ala cual debe conectarse

				$respuesta = DatosCat::registroCatModel($datosController,"categorias");
				//se imprime la respuesta en la vista
				if($respuesta == "success"){
					header("location:index.php?action=okC");
				}else{
					header("location:index.php");
				}
			}
		}
		


		//Vista de usuarios
		public  function vistaCatController(){
			$respuesta = DatosCat::vistaCatModel("categorias");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td>'.$item["id"].'</td>
						<td>'.$item["nombre"].'</td>
						<td><a href=index.php?action=editarCategoria&idEditar='.$item["id"].'><button>Editar</button></td>

						<td><a href=index.php?action=categorias&idBorrar='.$item["id"].'><button>Borrar</button></td>';
			}
		}

		//Editar usuario
		public function editarCatController(){
			$datosController=$_GET["idEditar"];
			$respuesta=DatosCat::editarCatModel($datosController,"categorias");

			//Diseñar la estructura de un formulario para que se muestre los datos de la consulta generada en el modelo.
			echo ('<form method="post"><input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			<input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			<input type="submit" value="Enviar"></form>');
		}

		public function actualizarCatController(){
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
		public function borrarCatController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=DatosCat::borrarCatModel($datosController,"categorias");
				if($respuesta=="success"){
					header("location:index.php?action=categorias");
				}
			}
		}

		//LISTA DE MODELOS POR DESARROLLAR:
		/*
		* 1. registroUsuariosModel--ok
		* 2. ingresoUsuariosModel --ok
		* 3. vistaUsuarioModel --ok
		* 4. editarUsuarioModel--ok
		* 5. actualizarUsuarioModel--ok
		* 6. borrarUsuarioModel --ok
		*/
	}
?>