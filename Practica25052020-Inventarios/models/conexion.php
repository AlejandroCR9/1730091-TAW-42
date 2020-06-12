<?php
	class Conexion{
		public static function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=inventarios","admin","770056391dda2ccecf16b57f70a278120f81e8f74c571e94");
			return $link;
		}
	}
?>
