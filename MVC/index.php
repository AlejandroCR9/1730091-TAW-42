<?php
//invocacion a los metodos
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/crudProd.php";
require_once "models/crudCatego.php";

//Controlador
//Creacion de objetos, logica del negocio
require_once "controllers/controller.php";
require_once "controllers/catController.php";
require_once "controllers/prodController.php";

$mvc = new MvcController();
//muestra la función o método página que se encuentra en controllers/controller.php
$mvc->pagina();
?>