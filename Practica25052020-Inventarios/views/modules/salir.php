<?php 
	/*Cierra la sesión actual y limpia la sesió actual y limpia la inforancion asociada a la misma*/
	session_destroy();
	ob_end_flush();
?>