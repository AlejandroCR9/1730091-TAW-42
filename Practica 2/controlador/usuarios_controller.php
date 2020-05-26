<?php 
	class usuarios_controller{
		//Metodo que incluye la vista del login en el index
        function login(){
            include_once('vistas/login.php');
            include_once('vistas/footer.php');      
        }

        //Metodo usado para destruir la sesión 
        function salir(){
            session_start();
            session_destroy();
            header("Location:index.php");
        }
        //Metodo que valida el usuario ingresado en el formulario login.php, si es correcto ingresa e inicia la sesión, caso contrario manda un error avisando que sea ingresado mal el usuario y/o contraseña
        function ingreso(){
            $data['user']=$_REQUEST['txt_usuario'];
            $data['contra']=$_REQUEST['txt_contra'];
            //echo($_REQUEST['txt_usuario']);
            //foreach($_POST as $campo => $valor){
              //echo "- ". $campo ." = ". $valor;
            //}
            if($data['user']=="admin" && $data['contra']=="admin"){
                session_start();
                $_SESSION["user"]="admin";
                header("Location:index.php?m=indexE");
            }else{
                header("Location:index.php?error=1");
                
            }
        }
	}
?>