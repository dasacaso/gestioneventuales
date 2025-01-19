<?php  
    class Departamento extends Conectar {

        public function get_departamento(){
            $conectar= parent::Conexion();
           // parent::set_names();
            $sql="SELECT id_departamento, dep_descripcion, estado  FROM Departamento WHERE estado='A' ";
            $sql= $conectar->prepare($sql);
            $sql->execute();            
            return $resultado=$sql->fetchAll();
        }

  
    }
?>