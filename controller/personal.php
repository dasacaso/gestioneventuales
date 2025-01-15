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
                $sub_array[] = $row["celular"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["empleado"].');"  id="'.$row["empleado"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["empleado"].');"  id="'.$row["empleado"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);            
                echo json_encode($results);
            break;
        case "guardaryeditar":
            $datos=$persona->get_persona_x_id($_POST["empleado"]);
            if(empty($_POST["empleado"])){
                if(is_array($datos)==true and count($datos)==0){
                    $persona->insert_persona($_POST["nombres"],$_POST["apellidos"],$_POST["telefono"],$_POST["celular"],$_POST["id"],$_POST["cedula"],$_POST["email"],$_POST["dpto"],$_POST["estado"],$_POST["foto"],$_POST["clase"],$_POST["birthday"],$_POST["cargo"],$_POST["brigada"],$_POST["area"]);
                }
            }else{
                $persona->update_persona($_POST["empleado"],$_POST["nombres"],$_POST["apellidos"],$_POST["telefono"],$_POST["celular"],$_POST["id"],$_POST["cedula"],$_POST["email"],$_POST["dpto"],$_POST["estado"],$_POST["foto"],$_POST["clase"],$_POST["birthday"],$_POST["cargo"],$_POST["brigada"],$_POST["area"]);
            }
            break;
        case "mostrar":
            $datos=$persona->get_persona_x_id($_POST["empleado"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["empleado"] = $row["empleado"];
                    $output["nombres"] = $row["nombres"];
                    $output["apellidos"] = $row["apellidos"];
                    $output["telefono"] = $row["casa_telef"];
                    $output["celular"] = $row["celular"];
                    $output["cod_empleado"] = $row["cod_empleado"];
                    $output["cedula"] = $row["cedula"];
                    $output["email"] = $row["email"];
                    $output["departamento"] = $row["departamento"];
                    $output["estado"] = $row["estado"];
                }
            }
            break;
        case "eliminar":
            $personal->delete_persona($_POST["empleado"]);
            break;

    }

    
?>