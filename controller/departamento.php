<?php
    require_once("../config/conexion.php");
    require_once("../models/Departamento.php");
    $departamental = new Departamento();

    /* obtiene todos los registros de la tabla Departamento */
    switch($_GET["op"]){
        case "combo":
            $datos=$departamental->get_departamento();                        
            if (is_array($datos)==true and count($datos)>0){
                $html = "<option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["id_departamento"]."'>".$row["dep_descripcion"]."</option>";
                }
                echo $html;
            }          
            break;     
    }    
?>