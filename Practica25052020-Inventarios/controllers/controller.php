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
		}

		/*--Este controlador se encarga de mostrar el formualrio al usuario para registrase*/
		public function registrarUsuarioController(){
			?>
			<div class="col-md-6 mt-6">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de usuarios </h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=usuarios">
							<div class="form-group">
								<label for="nusuariotxt">Nombre:</label>
								<input  class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" required>
							</div>
							<div class="form-group">
								<label for="ausuariotxt">Apellidos:</label>
								<input  class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" required>
							</div>
							<div class="form-group">
								<label for="usuariotxt">Usuario:</label>
								<input  class="form-control" type="text" name="usuariotxt" id="usuariotxt" required> 
							</div>
							<div class="form-group">
								<label for="ucontratxt">Contraseña:</label>
								<input  class="form-control" type="password" name="ucontratxt" id="ucontratxt" required>
							</div>
							<div class="form-group">
								<label for="uemailtxt">Correo Electornico:</label>
								<input  class="form-control" type="password" name="uemailtxt" id="uemailtxt" required>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		/*Este contorlador sirve para insertar el usuario que se acaba de ingresar y notifica si se rlaizo dicha actividad o si hubo algun error, en el caso de la contsaseña, primero que nada se tendra uqe encriptar mediante el algoritmo hash y la funcion password_hash y se guarda para posteriromente realizar la insercion*/
		public function insertarUsuarioController(){
			if(isset($_POST["nusuariotxt"])){
				//encriptar la contraseña
				$_POST["ucontratxt"]=password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);

				//Almacenar en un array los valores de los text del metodo "registrarUserController"
				$datosController=array("nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["usuariotxt"],"usuario"=>$_POST["usuariotxt"],"ucontra"=>$_POST["ucontratxt"],"nemailtxt"=>$_POST["nemailtxt"]);

				$respuesta=Datos::insertarUsuarioModel($datosController,"users");

				if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario agregado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de agregar.
							</div>
						</div>
					';
				}
			}
		}

		/*Este contorlador se encarga de mostar el formulario para editar sus daos, la contraseña no se carga debido a como esta iencripara, no es optimo */
		public function editarUserController() {
            $datosController = $_GET["idUserEditar"];
            //envío de datos al mododelo
            $respuesta = Datos::editarUserModel($datosController,"users");
            ?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                    </div>
            </div>
            <?php
        }

        /*este controlador sirve para actuaizat el usuario que se acaba de ingresar y notifica si se reliazo dicha actividad o hubo algun error*/
        public function actualizarUsuarioController(){
        	if(isset($_POST["nusuariotxtEditar"])){
        		$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);
        		$datosController=array("id" => $_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["usuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"ucontra"=>$_POST["ucontratxt"],"nemail"=>$_POST["nemailtxtEditar"]);

            	$respuesta = Datos::editarUserModel($datosController,"users");
        		if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario editado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de editar.
							</div>
						</div>
					';
				}
        	}
        }

        /*Este controlador sirve para eliminar el usuario que se acabd de ingresar y notifica si se relaizo dicha actividad o si hubo algun error*/
        public function eliminarUsuarioController(){
        	if(isset($_GET["idBorrar"])){
        		$datosController=$_GET["idBorrar"];
        		//Manda parametros al modelo
        		$respuesta=Datos::eliminarUserModel($datosController,"users");
        		if ($respuesta=="success") {
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									Exito!
								</h5>
								Usuario eliminado con éxito.
							</div>
						</div>
					';
				}else{
					echo ' 
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-miss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									Error!
								</h5>
								Se ha producido un error al momento de eliminar.
							</div>
						</div>
					';
				}
        	}

        }	
	}

?>