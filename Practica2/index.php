<?php
    //Controladores y conexion de la base de datos
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');
    require_once('controlador/universidad_controller.php');
    require_once('controlador/carrera_controller.php');
    require_once('controlador/usuarios_controller.php');

    //Inicializmos los objetos
    $controller= new estudiante_controller();
    $controller2= new universidad_controller();
    $controller3= new carrera_controller();
    $controller4= new usuarios_controller();
    //Verificamos que accion estamos haciendo
    if(!empty($_REQUEST['m'])){
            //Si existe una acción comprueba con los controladores si existe un metodo de dicha accion y lo ejecuta
            $metodo=$_REQUEST['m'];
            if (method_exists($controller, $metodo)) {
                $controller->$metodo();
            }else if(method_exists($controller2, $metodo)){
                $controller2->$metodo();
            }else if(method_exists($controller3, $metodo)){
                $controller3->$metodo();
            }else if(method_exists($controller4, $metodo)){
                $controller4->$metodo();
            }
    }else{
        //En caso de que no estemos haciendo una accion o aun no este permitido nos redireccionamos al login
        $controller4->login();
    }

    




?>