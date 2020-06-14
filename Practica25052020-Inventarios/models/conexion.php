<?php
	class Conexion{
		public static function conectar(){
			//$link = new PDO("mysql:host=localhost;dbname=inventariosr","admin","770056391dda2ccecf16b57f70a278120f81e8f74c571e94");
			$link = new PDO("mysql:host=localhost;dbname=inventarios","root","");
			return $link;
		}
	}
?>
