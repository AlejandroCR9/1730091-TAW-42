<?php
	require_once "conexion.php";


	//heredar la calse conexion.php para poder acccesar y ttilizar la conexion a la base de dats, s extiende cuando se quiere manipular una funcion o méotod, en este caso manipularemos la funcion "conectar" de models/conexion.php
	class Datos extends Conexion{

		//modelo ingresoUsuarioModel
		public static function ingresoUsuarioModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT CONCAT(firstname, ' ', lastname) AS 'nombre_usuario', user_name AS 'usuario', user_password AS 'contrasena', user_id AS 'id' FROM $tabla WHERE user_name=:usuario");
			$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
			$stmt->execute();
			//fetch() Obtiene una fila de un conjunto de resultados 
			return $stmt->fetch();

			$stmt->close();
		}

		//MOdelo vistaUsuarioModel
		public static function vistaUsuarioModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT user_id, firstname,lastname,user_name, user_password,user_email,date_added FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//registo de usuarios
		public static function insertarUsuarioModel($datosModel,$tabla){
			date_default_timezone_set('America/Mexico_City');
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$fecha=date("Y").'/'.date("m").'/'.date("d");
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (firstname,lastname,user_name, user_password,user_email, date_added) VALUES(:nusuario,:ausuario,:usuario,:contra,:email,:added)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":nusuario",$datosModel["nusuario"], PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":added",$fecha, PDO::PARAM_STR);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				//echo();
				return $datosModel["nusuario"]." ".$datosModel["ausuario"]." ".$datosModel["usuario"]." ".$datosModel["contra"]." ".$datosModel["email"]." ".$fecha;
			}
			$stmt->close();
		}
		
		
		//Editar usuarios
		public static function editarUsuarioModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT user_id AS 'id', firstname AS 'nusuario', lastname AS 'ausuario', user_name AS 'usuario', user_password AS 'contra', user_email AS 'email' FROM $tabla WHERE user_id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		}

		public static function actualizarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET firstname=:nusuario, lastname=:ausuario, user_name=:usuario, user_password=:contra, user_email=:email WHERE user_id=:id");

			$stmt->bindParam(":nusuario",$datosModel["nusuario"], PDO::PARAM_STR);
			$stmt->bindParam(":ausuario",$datosModel["ausuario"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":contra",$datosModel["contra"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return $datosModel["nusuario"]." ".$datosModel["ausuario"]." ".$datosModel["usuario"]." ".$datosModel["contra"]." ".$datosModel["email"]." ".$datosModel["id"];
			}
			$stmt->close();

		}

		public static function eliminarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id=:id");
			$stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		// MODELO PARA EL TABLERO //
        /*-- Este modelo permite conocer el numero de filas en determinada tabla, se utiliza para mostrar información en el tablero --*/
        public function contarFilasModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) AS 'filas' FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /////PRODUCTOSSS
        public static function vistaProductsModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT p.id_product AS 'id', p.code_producto AS 'codigo', p.name_product AS 'producto', p.date_added AS 'fecha', p.price_product AS 'precio', p.stock AS 'stock', c.name_category AS 'cateogria' FROM $tabla p INNER JOIN categories c ON p.id_cateogry=c.id_cateogry");
			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->close();

		}

		public static function insertarProductoModel($datosModel,$tabla){
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (code_producto,name_product, price_product, stock, id_cateogry) VALUES(:codigo,:nombre,:precio, :stock,:cateogria)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":codigo",$datosModel["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":precio",$datosModel["precio"], PDO::PARAM_STR);
			$stmt->bindParam(":stock",$datosModel["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":categoria",$datosModel["categoria"], PDO::PARAM_STR);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				//echo();
				return "error";
			}
			$stmt->close();
		}

		public static function editarProductoModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT id_product AS 'id',code_producto AS 'codigo', name_product AS 'nombre', price_product AS 'precio', stock FROM $tabla WHERE id_product=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		}

		public static function pushProductoModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("UPDATE $tabla SET stock=stock+:stock WHERE id_product=:id");
			$stmt->bindParam(":stock",$datosModel["stock"],PDO::PARAM_INT);
			$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

        /*MODELOS CATEGORIAS*/
        //Este modelo se usa para obtener informacion de cada caeogria
		public static function vistaCategoriesModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id_cateogry AS 'idc', name_category as 'ncategoria', description_category AS 'dcategoria', date_added AS 'fcategoria' FROM $tabla");
			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->close();

		}

		//registo de usuarios
		public static function insertarUsuarioModel($datosModel,$tabla){
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name_category, description_category) VALUES(:ncategoria,:dcategoria)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":dcategoria",$datosModel["nombre_categoria"], PDO::PARAM_STR);
			$stmt->bindParam(":ncategoria",$datosModel["descripcion_cateogria"], PDO::PARAM_STR);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				//echo();
				return "error";
			}
			$stmt->close();
		}

		public static function editarCategoryModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT id_cateogry AS 'id', name_category AS 'nombre_categoria', description_category AS 'descripcion_cateogria' FROM $tabla WHERE id_cateogry=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();
		}

		public static function actualizarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET name_category=:nombre_categoria, description_category=:descripcion_cateogria WHERE id_cateogry=:id");

			$stmt->bindParam(":descripcion_cateogria",$datosModel["nombre_categoria"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre_categoria",$datosModel["nombre_categoria"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);


			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();

		}

		public static function eliminarCategoryModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cateogry=:id");
			$stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		//MODELOS PARA LOS SELECT
		/*Permite crear un select y mostrar lo apartir de un select en php dando als cateogrias y nombres en el formulario prdiucto*/
		public function obtenerCategoryModel($tabla){
			$stmt=Conexion::conectar()->prepare("SELECT id_cateogry AS 'id',  name_category AS 'cateogria' FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}

	}
?>