<?php
	require_once  "conexion.php";
	class DatosCat extends Conexion{
		//registo de usuarios
		public static function registroCatModel($datosModel,$tabla){
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES(:nombre)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}
		
		//MOdelo vistaUsuarioModel
		public static function vistaCatModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//Editar usuarios
		public static function editarCatModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();

		}

		public static function actualizarCatModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre WHERE id=:id");
			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();

		}

		public static function borrarCatModel($datosModel,$tabla){
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