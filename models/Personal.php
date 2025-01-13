<?php
    class Personal extends Conectar{
        public function get_persona(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Empleado WHERE estado='A' and tipo=2";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_persona_x_id($per_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Empleado WHERE cod_empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$per_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>