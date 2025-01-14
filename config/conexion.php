<?php
    class Conectar{
        protected $dbh;

        public function Conexion(){

            $host='localhost\SQLEXPRESS';
            $dbname='ControlCDP';
            $username='sa';
            $password='SuperWynd12';
            $puerto=1433;

            try{
                $conectar = $this->dbh = new PDO ("sqlsrv:Server=$host;Database=$dbname",$username,$password);
                $conectar -> setAttribute (PDO:: ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);                
            }
            catch(PDOException $exp){
                echo ("No se logro conectar correctamente con la base de datos $dbname, error: $exp");
                die();

            }
            return $conectar;
        }
        
        public function set_names(){
           // return $this->dbh->query("SET NAMES 'utf8'");
        }
    }

?>