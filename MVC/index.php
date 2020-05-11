<?php
//invocacion a los metodos
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/crudProd.php";

//Controlador
//Creacion de objetos, logica del negocio
require_once "controllers/controller.php";

//muestra la función o método página que se encuentra en controllers/controller.php
$mvc->pagina();
?>