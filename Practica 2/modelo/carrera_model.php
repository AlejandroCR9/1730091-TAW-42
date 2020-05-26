<?php
    
    class carrera_model{
        private $DB; //Variable que guardara la conexion con la bd
        private $carrera; //Guardara los registros recuperados de la bd

        //Se inicializa la conexion con la bd
        function __construct(){
            $this->DB=Database::connect();
        }

        //FUncion que ejecuta un a funcion select para recuperar los registros de la tabla carrera.
        function get(){
            //Se prepara la sentencia
            $sql= 'SELECT * FROM carrera ORDER BY idCarrera DESC';
            $fila=$this->DB->query($sql); 
            $this->carrera=$fila;
            return  $this->carrera;
        }
        //Registro de carreras
        function create($data){
            //Se prepara la sentencia insert
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombreCarrera,capacidad,uniFK)VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            //Asignamos valores a los signos ? que pusimos anteriomente en la setnencia y se ejecuta
            $query->execute(array($data['nombreCarrera'],$data['capacidad'],$data['uniFK']));
            Database::disconnect();       

        }

        //Obtener un registro por id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carrera where idCarrera = ?"; //Se prepara la setnencia
            $q = $this->DB->prepare($sql);
            $q->execute(array($id)); //Se sustituyen los valore reservaod y se ejecuta.
            $data = $q->fetch(PDO::FETCH_ASSOC); 
            return $data;
        }
        //Actualizar carreras
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Se prepara la sentencia y se reservan los espacios de los valores a modificar con un ?
            $sql = "UPDATE carrera  set  nombreCarrera =?, capacidad=?, uniFK=? WHERE idCarrera = ? ";
            $q = $this->DB->prepare($sql); 
            //Se ejectua y se cambian los signos de ? por los valores a modificar.
            $q->execute(array($data['nombreCarrera'],$data['capacidad'],$data['uniFK'], $date));
            Database::disconnect();

        }

        //borrar carrera
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where idCarrera=?"; //Preparamos la sentencia dejando el id  con un ? para sustituirlo despues
            $q=$this->DB->prepare($sql);
            $q->execute(array($date)); //Se ejcuta y se sustituye el ? por el valor correspoendiente.
            Database::disconnect();
        }
    }
?>

