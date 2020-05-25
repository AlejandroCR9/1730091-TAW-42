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

		//registro
		public function registroUsiaroController(){
			if(isset($_POST["usuarioRegistro"])){
				//recibe a traves del metoddo post el name de usuario, passwoer y email se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
				$datosController= array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"]);
				//se le dice al modelo model/crud.php (Datos:registroUsuarioModel), en que modelo Datos el metodo registroUsuarioMOdel reciba en sus parmatros los valores $datoaController y el nombre de la tabla a ala cual debe conectarse

				$respuesta = Datos::registroUsuariosModel($datosController,"usuarios");
				//se imprime la respuesta en la vista
				if($respuesta == "success"){
					echo '<script> window.location.replace("index.php?action=ok"); </script>';
					
				}else{
					echo '<script> window.location.replace("index.php"); </script>';
				}
			}
		}
		//INgreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController= array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);
				$respuesta= Datos::ingresoUsuarioModel($datosController,"usuarios");
				//validar la repsuesta de modelo
				if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]== $_POST["passwordIngreso"]){
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
	}

?>