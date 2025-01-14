<?php

    
    class Personal extends Conectar {

        public function get_persona(){
            $conectar= parent::Conexion();
           // parent::set_names();
            $sql="SELECT nombres, apellidos, cod_empleado FROM Empleado WHERE estado='A' and tipo=2";
            $sql= $conectar->prepare($sql);
            $sql->execute();            
            return $resultado=$sql->fetchAll();
        }

        public function get_persona_x_id($per_id){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM Empleado WHERE cod_empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$per_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_persona($per_id){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE Empleado set estado='I' WHERE cod_empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$per_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         public function insert_persona($per_nombres, $per_apellidos, $per_casa_telef, $per_celular, $per_id, $per_cedula, $per_email, $per_departamento, $per_estado, $per_foto, $per_clase, $per_birthday, $per_cargo, $per_brigada, $per_area){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO Empleado (nombres, apellidos, casa_telef, celular, cod_empleado, cedula, email, departamento, estado, foto, tipo, bithdate, idCargo, id_Brigada, now(), idarea)
                VALUES  (?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$per_nombres);
            $sql->bindValue(2,$per_apellidos);
            $sql->bindValue(3,$per_casa_telef);
            $sql->bindValue(4,$per_celular);
            $sql->bindValue(5,$per_id);
            $sql->bindValue(6,$per_cedula);
            $sql->bindValue(7,$per_email);
            $sql->bindValue(8,$per_departamento);
            $sql->bindValue(9,$per_estado);
            $sql->bindValue(10,$per_foto);
            $sql->bindValue(11,$per_clase);
            $sql->bindValue(12,$per_birthday);
            $sql->bindValue(13,$per_cargo);
            $sql->bindValue(14,$per_brigada);
            $sql->bindValue(15,$per_area);

            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         public function update_persona($per_id, $per_nombres, $per_apellidos, $per_casa_telef, $per_celular, $per_cedula, $per_email, $per_departamento, $per_foto, $per_clase, $per_birthday, $per_cargo, $per_brigada, $per_area){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE Empleado set 
                SET
                nombres=?,
                apellidos=?,
                casa_telef=?,
                celular=?,
                cedula=?,
                email=?,
                departamento=?,
                foto=?,
                tipo=?,
                bithdate=?,
                idCargo=?,
                id_Brigada=?,
                idarea=?  WHERE cod_empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$per_nombres);
            $sql->bindValue(2,$per_apellidos);
            $sql->bindValue(3,$per_casa_telef);
            $sql->bindValue(4,$per_celular);
            $sql->bindValue(5,$per_cedula);
            $sql->bindValue(6,$per_email);
            $sql->bindValue(7,$per_departamento);
            $sql->bindValue(8,$per_foto);
            $sql->bindValue(9,$per_clase);
            $sql->bindValue(10,$per_birthday);
            $sql->bindValue(11,$per_cargo);
            $sql->bindValue(12,$per_brigada);
            $sql->bindValue(13,$per_area);
            $sql->bindValue(14,$per_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>