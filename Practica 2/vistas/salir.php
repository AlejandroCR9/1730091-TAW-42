<?php
	session_start();
	$_SESSION["entrar"]="";
	session_destroy();
	//header("Location:login.php");
?>