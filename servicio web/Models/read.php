<?php
include_once 'Config/db.php';


class read extends db {

    function login($user,$body){
        $data=json_decode($body, true);
        $db=$this->connect();
        $correo=$data['correo'];
        $contraseña=$data['contraseña'];
        switch($user){
            case 'maestros':
                $sql="SELECT * FROM maestros WHERE correo='$correo' AND contraseña='$contraseña'";
                $result=$db->query($sql);
                if ($result->num_rows > 0) {
                    $user=$result->fetch_assoc();
                    echo json_encode($user);
                }else {
                    echo "false";
                }

            break;
            case 'personal':
                $sql="SELECT * FROM personal WHERE correo='$correo' AND contraseña='$contraseña'";
                $result=$db->query($sql);
                if ($result->num_rows > 0) {
                    $user=$result->fetch_assoc();
                    echo json_encode($user);
                }else {
                    echo "false";
                }
            break;

            case 'administrador':
                $sql="SELECT * FROM administrador WHERE correo='$correo' AND contraseña='$contraseña'";
                $result=$db->query($sql);
                if ($result->num_rows > 0) {
                    $user=$result->fetch_assoc();
                    echo json_encode($user);
                }else {
                    echo "false";
                }
            break;
        }
    }

    function maestros(){
        $db=$this->connect();
        $sql="SELECT * FROM maestros";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            }
            echo json_encode($json);
        }else {
            echo "0";
        }
    }

    function personal(){
        $db=$this->connect();
        $sql="SELECT * FROM personal";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            }  
            echo json_encode($json);    
        }else {
            echo "0";
        }
    }

    function banner(){
        $db=$this->connect();
        $sql="SELECT * FROM banner";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row['url']);
            }
            echo json_encode($json);
        }else {
            echo "0";
        }
    }

    function anuncios(){
        $db=$this->connect();
        $sql="SELECT * FROM anuncios";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            }
            echo json_encode($json);
        }else {
            echo "0";
        }
    }


    function materias(){
        $db=$this->connect();
        $sql="SELECT * FROM materias";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row); 
            }  
            echo json_encode($json);

        }else {
            echo "0";
        }       
    }

    function materiaspormaestro($body){
        $db=$this->connect();
        $id= (int) $body;
        $sql="SELECT DISTINCT materias.id,materias.nombre,materias.url,materias.bloques,grupo.nombre as grupo FROM materias, grupo WHERE materias.id IN (
        SELECT id_materia FROM grupo WHERE id_maestro=$id) AND grupo.id_maestro=$id";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            }      
            echo json_encode($json);
        }else {
            echo "0";
        }  

    }

    function alumnos(){
        $db=$this->connect();
        $sql="SELECT * FROM alumnos";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            }  
            echo json_encode($json);     
        }else {
            echo "0";
        }     
    }

    function grupos(){
        $db=$this->connect();
        $sql="SELECT DISTINCT grupo FROM alumnos";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row['grupo']);
            }    
            echo json_encode($json);  
        }else {
            echo "0";
        }   
        $db->close();
    }

    function alumnosporgrupo($grupo){
        $db=$this->connect();
        $sql="SELECT * FROM alumnos WHERE grupo='$grupo'";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $alumno = array(
                    "id" => $row['id'],
                    "nombre" => $row['nombre'],
                    "tutor" => $row['tutor'],
                    "telefono" => $row['telefono'],
                    "edad" => $row['edad'],
                    "sexo" => $row['sexo'],
                    "status" => $row['status'],
                    "grupo" => $row['grupo'],
                    "calificacion" => ""
                );

                array_push($json,$alumno);
            }    
            echo json_encode($json);  
        }else {
            echo "0";
        }
        $db->close();
         
    }

    function pagos(){
        $db=$this->connect();
        $sql="SELECT * FROM pagos";
        $result=$db->query($sql);
        $json=array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);   
            }
            echo json_encode($json);
        }else {
            echo "0";
        } 
        $db->close();   
    }

    function calificaciones($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        $json=array();
        $grupo=$data['grupo'];
        $materia=$data['materia'];
        $bloque=$data['bloque'];

        $sql="SELECT calificacion, id_alumno FROM calificaciones WHERE grupo='$grupo' AND materia='$materia' AND bloque=$bloque";
        $result=$db->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) {
                array_push($json,$row);
            } 
            echo json_encode($json);      
        }else {
            echo "0";
        } 
        $db->close(); 
    }



}

?>