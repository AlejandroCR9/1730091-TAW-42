<?php 
    //se trae el modelo que comunicara con la base de datos
    require_once('modelo/universidad_model.php');

    class universidad_controller{

        private $model_u;//Variable global para hacer uso de los metodos en el modelo

        //constructor que inicializa el modelo
        function __construct(){
            $this->model_u=new universidad_model();
        }
        //Funcion que muestra la vista de los estudiantes en forma de tabla
        function indexU(){
            $query =$this->model_u->get();//Manda llamar el metodo get() para traer todos los registros en la bd
            include_once('vistas/header.php');
            include_once('vistas/universidad/indexUni.php');
            include_once('vistas/footer.php');
        }

        //Trae todos los registros en la bd mediante el metodo get() que esta en el modelo, si se le pasa un id trae un registro especifico el cual sirve para la editar y muestra la vista del formulario de registro de estudiante.
        function universidad(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_u->get_id($_REQUEST['id']);    
            }
            $query=$this->model_u->get();
            include_once('vistas/header.php');
            include_once('vistas/universidad/universidad.php');
            include_once('vistas/footer.php');
        }

        //Obtiene los datos que estan en el formulario carrera.php y verifica si es una edición o si se crea un nunevo registro mediante el id, finalemnte redirecciona a la vista donde esta la tabla de estudiantes
        function get_datosC(){

            $data['nombreUni']=$_REQUEST['txt_nombreU'];
            $data['ubicacion']=$_REQUEST['txt_ubicacion'];
            if ($_REQUEST['id']=="") {//Si no hay id, se crea un nuevo registro.
                $this->model_u->create($data);
            }    
            if($_REQUEST['id']!=""){//Si esxiste un id, se edita el registro con ese id.
                $date=$_REQUEST['id'];
                $this->model_u->update($data,$date);
            }
            header("Location:index.php?m=indexU");
        }
        //Metodo que trae una vista para confirmar el borrado de un registro, mediante el id hace una busqueda y despues se hace uso del metodo delete() en el modelo
        function confirmarDeleteU(){
            $data=NULL;
            if ($_REQUEST['id']!=0) {
               $data=$this->model_u->get_id($_REQUEST['id']);
            }
            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_idUni'];
                $this->model_u->delete($date['id']);
                header("Location:index.php?m=indexU");
            }
            include_once('vistas/header.php');
            include_once('vistas/universidad/confirmUni.php');
            include_once('vistas/footer.php');
            


        }


    }
?>