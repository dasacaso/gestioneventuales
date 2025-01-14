<?php
    require_once("../config/conexion.php");
    require_once("../models/Personal.php");
    $personal = new Personal();

    switch($_GET["op"]){
        case "listar":
            $datos=$personal->get_persona();                        
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombres"]." ".$row["apellidos"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["cod_empleado"].');"  id="'.$row["cod_empleado"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["cod_empleado"].');"  id="'.$row["cod_empleado"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);            
                echo json_encode($results);
            break;
    }
?>