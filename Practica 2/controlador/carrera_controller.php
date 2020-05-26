<?php 
    //se trae el modelo que comunicara con la base de datos
    require_once('modelo/carrera_model.php');

    class carrera_controller{

        private $model_c; //Variable global para hacer uso de los metodos en el modelo

        //constructor que inicializa el modelo
        function __construct(){
            $this->model_c=new carrera_model();
        }

        //Funcion que muestra la vista de las carreras en forma de tabla
        function indexC(){
            $query =$this->model_c->get(); //Manda llamar el metodo get() para traer todos los registros en la bd
            include_once('vistas/header.php');
            include_once('vistas/carrera/indexCarrera.php');
            include_once('vistas/footer.php');
        }

        //Trae todos los registros en la bd mediante el metodo get() que esta en el modelo, si se le pasa un id trae un registro especifico el cual sirve para la editar y muestra la vista del formulario de registro de carrera.
        function carrera(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_c->get_id($_REQUEST['id']);    
            }
            $query=$this->model_c->get();
            include_once('vistas/header.php');
            include_once('vistas/carrera/carrera.php');
            include_once('vistas/footer.php');
        }

        //Obtiene los datos que estan en el formulario carrera.php y verifica si es una edición o si se crea un nunevo registro mediante el id, finalemnte redirecciona a la vista donde esta la tabla de carreras
        function get_datosA(){

            $data['nombreCarrera']=$_REQUEST['txt_nombreC'];
            $data['capacidad']=$_REQUEST['txt_capacidad'];
            $data['uniFK']=$_REQUEST['txt_univ'];

            if ($_REQUEST['id']=="") { //Si no hay id, se crea un nuevo registro.
                $this->model_c->create($data);
            }
            
            if($_REQUEST['id']!=""){ //Si esxiste un id, se edita el registro con ese id.
                $date=$_REQUEST['id'];
                $this->model_c->update($data,$date);
            }
            
            header("Location:index.php?m=indexC");

        }

        //Metodo que trae una vista para confirmar el borrado de un registro, mediante el id hace una busqueda y despues se hace uso del metodo delete() en el modelo
        function confirmarDeleteC(){
            $data=NULL;
            if ($_REQUEST['id']!=0) {
               $data=$this->model_c->get_id($_REQUEST['id']);
            }
            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_idCarrera'];
                $this->model_c->delete($date['id']);
                header("Location:index.php?m=indexC");
            }
            include_once('vistas/header.php');
            include_once('vistas/carrera/confirmCarrera.php');
            include_once('vistas/footer.php');
        }


    }
?>