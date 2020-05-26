<?php
    
    class estudiante_model{
        private $DB; //Variable que guardara la conexion con la bd
        private $estudiantes; //Guardara los registros recuperados de la bd
        //Se inicializa la conexion con la bd
        function __construct(){
            $this->DB=Database::connect();
        }
        //FUncion que ejecuta un a funcion select para recuperar los registros de la tabla universidad.
        function get(){
            //Se prepara la sentencia
            $sql= 'SELECT id,cedula,nombre,apellidos,promedio,edad,fecha,nombreUni,nombreCarrera FROM estudiante INNER JOIN carrera on Fk_Carrera = idCarrera INNER JOIN universidad on Fk_Universidad = idUni ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return $this->estudiantes;
        }
        //Registro de univeridades
        function create($data){
            //Se prepara la sentencia insert
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,fecha,Fk_Carrera,Fk_Universidad)VALUES (?,?,?,?,?,?,?,?)";
            $query = $this->DB->prepare($sql);
            //Asignamos valores a los signos ? que pusimos anteriomente en la setnencia y se ejecuta
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['universidad'],$data['carrera']));
            Database::disconnect();       
        }
        //Obtener un registro por id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?"; //Se prepara la setnencia
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));//Se sustituyen los valore reservaod y se ejecuta.
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        //Actualizar estudiantes
        function update($data,$date){
            //Se prepara la sentencia y se reservan los espacios de los valores a modificar con un ?
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            //Se ejectua y se cambian los signos de ? por los valores a modificar.
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'], $date));
            Database::disconnect();

        }
        //borrar estudiante
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Preparamos la sentencia dejando el id  con un ? para sustituirlo despues
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            //Se ejcuta y se sustituye el ? por el valor correspoendiente.
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

