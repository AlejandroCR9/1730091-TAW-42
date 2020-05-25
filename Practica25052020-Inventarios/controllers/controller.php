<?php
	class MvcController extends Datos{
		#llamada a la plantilla
		public function pagina(){
			include "views/template.php";
		}

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

		//INgreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController= array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);
				$respuesta= Datos::ingresoUsuarioModel($datosController,"usuarios");
				//validar la repsuesta de modelo
				if($respuesta["usuario"]==$_POST["usuarioIngreso"] && password_verify($_POST["txtPassword"], hash)){
					session_start();
					$_SESSION["validar"]=true;
					$_SESSION["nombre_usuario"]=$respuesta["usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("Location:index.php?action=tablero");
					
				}else{
					header("location:index.php?action=fallo&res=fallo");
				}
			}
		}


		//Vista de usuarios
		public  function vistaUsuariosController(){
			$respuesta=Datos::vistaUsuarioModel("usuarios");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td><a href=index.php?action=editar&idEditar='.$item["id"].'><button>Editar</button></td>

						<td><a href=index.php?action=usuarios&idBorrar='.$item["id"].'><button>Borrar</button></td>
						<td>'.$item["firstname"].'</td>
						<td>'.$item["lastname"].'</td>
						<td>'.$item["user_name"].'</td>
						<td>'.$item["user_email"].'</td>
						<td>'.$item["date_added"].'</td>
						
					</tr>';
			}
		}	}

?>