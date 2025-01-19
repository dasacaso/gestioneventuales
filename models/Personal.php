<?php

    
    class Personal extends Conectar {

        public function get_persona(){
            $conectar= parent::Conexion();
           // parent::set_names();
           /*  $sql="SELECT empleado, nombres, apellidos, cod_empleado, celular, casa_telef  FROM Empleado WHERE estado='A' and tipo=2 and departamento=107"; */
           $sql="SELECT emp.empleado, emp.nombres, emp.apellidos, emp.cod_empleado, emp.celular, emp.casa_telef, dep.dep_descripcion  FROM Empleado emp
                inner join Departamento dep on emp.departamento = dep.id_departamento WHERE emp.estado='A' and emp.tipo=2 and emp.departamento=107";
            $sql= $conectar->prepare($sql);
            $sql->execute();            
            return $resultado=$sql->fetchAll();
        }

        public function get_persona_x_id($empleado){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM Empleado WHERE empleado= ?";  // 32639
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$empleado);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_persona($empleado){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE Empleado set estado='I' WHERE empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$empleado);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         public function insert_persona($nombres, $apellidos, $telefono, $celular, $cod_empleado, $cedula, $email ){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO Empleado (nombres, apellidos, casa_telef, celular, cod_empleado, cedula, email, fechaingreso, estado, departamento, idarea, id_brigada, idCargo, tipo)
                VALUES  (?, ?, ?, ? , ?, ?, ?, getdate(), 'A', 107, 16, 4, 1063, 2 )";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombres);
            $sql->bindValue(2,$apellidos);
            $sql->bindValue(3,$telefono);
            $sql->bindValue(4,$celular);
            $sql->bindValue(5,$cod_empleado);
            $sql->bindValue(6,$cedula);
            $sql->bindValue(7,$email);            
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         public function update_persona($empleado, $nombres, $apellidos, $telefono, $celular, $cod_empleado, $cedula, $email ){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE Empleado SET nombres=?, apellidos=?, casa_telef=?, celular=?, cod_empleado=?, cedula=?, email=? WHERE empleado= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombres);
            $sql->bindValue(2,$apellidos);
            $sql->bindValue(3,$telefono);
            $sql->bindValue(4,$celular);
            $sql->bindValue(5,$cod_empleado);
            $sql->bindValue(6,$cedula);
            $sql->bindValue(7,$email);            
            $sql->bindValue(8,$empleado);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>