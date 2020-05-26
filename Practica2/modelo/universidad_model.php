<?php
    
    class universidad_model{
        private $DB;//Variable que guardara la conexion con la bd
        private $universidad; //Guardara los registros recuperados de la bd
        //Se inicializa la conexion con la bd
        function __construct(){
            $this->DB=Database::connect();
        }
        //FUncion que ejecuta un a funcion select para recuperar los registros de la tabla universidad.
        function get(){
            //Se prepara la sentencia
            $sql= 'SELECT * FROM universidad ORDER BY idUni DESC';
            $fila=$this->DB->query($sql);
            $this->universidad=$fila;
            return  $this->universidad;
        }
        //Registro de univeridades
        function create($data){
            //Se prepara la sentencia insert
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidad(nombreUni,ubicacion)VALUES (?,?)";
            //Asignamos valores a los signos ? que pusimos anteriomente en la setnencia y se ejecuta
            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombreUni'],$data['ubicacion']));
            Database::disconnect();       

        }
        //Obtener un registro por id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidad where idUni = ?"; //Se prepara la setnencia
            $q = $this->DB->prepare($sql);
            $q->execute(array($id)); //Se sustituyen los valore reservaod y se ejecuta.
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        //Actualizar universidades
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Se prepara la sentencia y se reservan los espacios de los valores a modificar con un ?
            $sql = "UPDATE universidad  set  nombreUni =?, ubicacion=? WHERE idUni = ? ";
            $q = $this->DB->prepare($sql);
            //Se ejectua y se cambian los signos de ? por los valores a modificar.
            $q->execute(array($data['nombreUni'],$data['ubicacion'], $date));
            Database::disconnect();

        }
        //borrar universidad
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidad where idUni=?"; //Preparamos la sentencia dejando el id  con un ? para sustituirlo despues
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));//Se ejcuta y se sustituye el ? por el valor correspoendiente.
            Database::disconnect();
        }
    }
?>

