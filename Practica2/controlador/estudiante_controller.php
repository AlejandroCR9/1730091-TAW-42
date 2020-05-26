<?php 
    //se trae el modelo que comunicara con la base de datos
    require_once('modelo/estudiante_model.php');

    class estudiante_controller{

        private $model_e; //Variable global para hacer uso de los metodos en el modelo
        //constructor que inicializa el modelo
        function __construct(){
            $this->model_e=new estudiante_model();
        }
        //Funcion que muestra la vista de los estudiantes en forma de tabla
        function indexE(){
            $query=$this->model_e->get();//Manda llamar el metodo get() para traer todos los registros en la bd
            include_once('vistas/header.php');
            include_once('vistas/indexEstudiante.php');
            include_once('vistas/footer.php');
        }

        //Trae todos los registros en la bd mediante el metodo get() que esta en el modelo, si se le pasa un id trae un registro especifico el cual sirve para la editar y muestra la vista del formulario de registro de estudiante.
        function estudiante(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }
        //Obtiene los datos que estan en el formulario carrera.php y verifica si es una edición o si se crea un nunevo registro mediante el id, finalemnte redirecciona a la vista donde esta la tabla de estudiantes
        function get_datosE(){
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];
            $data['universidad']=$_REQUEST['txt_universidad'];
            $data['carrera']=$_REQUEST['txt_carrera'];

            if ($_REQUEST['id']=="") {//Si no hay id, se crea un nuevo registro.
                $this->model_e->create($data);
            }
            if($_REQUEST['id']!=""){//Si esxiste un id, se edita el registro con ese id.
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            header("Location:index.php?m=indexE");
        }
        //Metodo que trae una vista para confirmar el borrado de un registro, mediante el id hace una busqueda y despues se hace uso del metodo delete() en el modelo
        function confirmarDeleteE(){
            $data=NULL;
            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }
            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php?m=indexE");
            }
            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }

    }
?>