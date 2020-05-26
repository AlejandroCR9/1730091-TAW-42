<?php
	require_once  "conexion.php";
	class DatosProd extends Conexion{
		//registo de usuarios
		public static function registroProdModel($datosModel,$tabla){
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,preciocompra, precioventa,inventario,idcategoria) VALUES(:nombre,:descripcion,:preciocompra, :precioventa,:inventario,:idcategoria)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":preciocompra",$datosModel["preciocompra"], PDO::PARAM_STR);
			$stmt->bindParam(":precioventa",$datosModel["precioventa"], PDO::PARAM_STR);
			$stmt->bindParam(":inventario",$datosModel["inventario"], PDO::PARAM_STR);
			$stmt->bindParam(":idcategoria",$datosModel["idcategoria"], PDO::PARAM_INT);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}
		
		//MOdelo vistaUsuarioModel
		public static function vistaProdModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, nombre, descripcion, preciocompra, precioventa, inventario, idcategoria FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//MOdelo vistaUsuarioModel
		public static function vistaCat($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//Editar usuarios
		public static function editarProdModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT id,nombre,descripcion,preciocompra, precioventa,inventario,idcategoria FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();

		}

		public static function actualizarProdModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,descripcion=:descripcion,preciocompra=:preciocompra, precioventa=:precioventa,inventario=:inventario,idcategoria=:idcategoria WHERE id=:id");

			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":preciocompra",$datosModel["preciocompra"], PDO::PARAM_STR);
			$stmt->bindParam(":precioventa",$datosModel["precioventa"], PDO::PARAM_STR);
			$stmt->bindParam(":inventario",$datosModel["inventario"], PDO::PARAM_STR);
			$stmt->bindParam(":idcategoria",$datosModel["idcategoria"], PDO::PARAM_INT);	
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();

		}

		public static function borrarProdModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

	}
?>