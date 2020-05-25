<?php
    
    class carrera_model{
        private $DB;
        private $carreras;
        
        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM carrera ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->carreras=$fila;
            return  $this->carreras;
        }

        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombre,iduni)VALUES (?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['iduni']));
            Database::disconnect();       

        }
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carrera where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera  set  nombre=?,iduni =? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['iduni']));
            Database::disconnect();

        }

        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>
