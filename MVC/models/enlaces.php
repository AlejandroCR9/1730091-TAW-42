<?php
	//modelo de enlaces web
	class Paginas{
		public function enlacesPaginasModel($enlaces){
			if(($enlaces)== "ingresar" || ($enlaces)== "usuarios" || ($enlaces)== "productos" || ($enlaces)== "registroProducto" || ($enlaces)== "editar" || ($enlaces)== "editarProduto" || ($enlaces)== "salir"){
				$module="views/modules/".$enlaces.".php";
			}else if ($enalces=="index"){
				$module="views/modules/registro.php";
			}else if ($enalces=="ok"){
				$module="views/modules/registro.php";
			}else if ($enalces=="fallo"){
				$module="views/modules/ingresar.php";
			}else if ($enalces=="cambio"){
				$module="views/modules/usuarios.php";
			}else {
				$module="views/modules/registro.php";
			}

			return $module;

		}
	}
?>