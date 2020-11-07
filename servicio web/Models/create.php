<?php
include_once 'Config/db.php';

class create extends db{

    function maestros($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $nombre=$item['nombre'];
            $carrera=$item['carrera'];
            $telefono=(int) $item['telefono'];
            $correo=$item['correo'];
            $contraseña=$item['contraseña'];
            $sql = "INSERT INTO maestros (nombre, carrera, telefono, correo, contraseña)
            VALUES ('$nombre','$carrera',$telefono,'$correo','$contraseña')";
            $db->query($sql);
        }
        $db->close(); 
        echo json_encode($body);
    }

    function personal($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        
        foreach ($data as &$item) {
            $nombre=$item['nombre'];
            $cargo=$item['cargo'];
            $telefono=$item['telefono'];
            $correo=$item['correo'];
            $contraseña=$item['contraseña'];
            $sql = "INSERT INTO personal (nombre, cargo, correo, contraseña, telefono)
            VALUES ('$nombre','$cargo','$correo','$contraseña', $telefono)";
            $db->query($sql);
        }   
        $db->close(); 
        echo "true";

    }


    function banner($data){
        $db=$this->connect();
        $url=$data['url'];
        $accion=$data['accion'];
        $sql = "INSERT INTO banner (url,accion) VALUES ('$url','$accion')";
        $db->query($sql);
        $db->close(); 
        echo "true";
    }

    function anuncios($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        
        foreach ($data as &$item) {
            $mensaje=$item['mensaje'];
            $fecha=$item['fecha'];
            $expira=$item['expira'];
            $destinatario=$item['destinatario'];
            $sql = "INSERT INTO anuncios (mensaje,fecha,expira,destinatario)
            VALUES ('$mensaje','$fecha','$expira','$destinatario')";
            $db->query($sql);
        }   
        $db->close();
        echo "true";
        
    }

    function materias($body){

        $data=json_decode($body, true);
        $db=$this->connect();
        
        foreach ($data as &$item) {
            $nombre=$item['nombre'];
            $bloques=$item['bloques'];
            $url=$item['url'];
            $maestro=$item['maestro'];
            $grupo=$item['grupo'];

            $sql = "INSERT INTO materias (nombre,url,bloques) VALUES ('$nombre','$url',$bloques)";
            $db->query($sql);

            $response=$db->query("SELECT id FROM materias WHERE nombre='$nombre'");
            $id_materia=$response->fetch_assoc()['id'];
    
            $response=$db->query("SELECT id FROM maestros WHERE nombre='$maestro'");
            $id_maestro=$response->fetch_assoc()['id'];
    
            $sql = "INSERT INTO grupo (nombre,id_maestro,id_materia) VALUES ('$grupo',$id_maestro,$id_materia)";
            $db->query($sql);
        }
            
        
        $db->close();
        echo "true";

    }

    function alumnos($body){
        $db=$this->connect();
        $data=json_decode($body, true);
        $alumnos=$data['alumnos'];
        $grupo=$data['grupo'];
        foreach ($alumnos as &$item) {
            $nombre=$item['nombre'];
            $tutor=$item['tutor'];
            $telefono=$item['telefono'];
            $edad=$item['edad'];
            $sexo=$item['sexo'];
            $status=null;
            $sql = "INSERT INTO alumnos (nombre,tutor,telefono,edad,sexo,status,grupo)
            VALUES ('$nombre','$tutor',$telefono,$edad,'$sexo','$status', '$grupo')";
            $db->query($sql);
        }   
        $db->close();
        echo "true";
    }

    function pagos($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        
        foreach ($data as &$item) {
            
            $cantidad=$item['cantidad'];
            $inicio=$item['inicio'];
            $fin=$item['fin'];
            $alumno=$item['alumno'];

            $response=$db->query("SELECT id FROM alumnos WHERE nombre='$alumno'");
            $id_alumno=$response->fetch_assoc()['id'];

            $sql = "INSERT INTO pagos (cantidad,inicio,fin,id_alumno) VALUES ($cantidad,'$inicio','$fin',$id_alumno)";
            $db->query($sql);

        }   
        $db->close();   
        echo "true"; 
    }

    function calificaciones($body){
        $data=json_decode($body, true);
        $db=$this->connect();

        foreach ($data as &$item) {
            $calificacion=(int) $item['calificacion'];
            $grupo= $item['grupo'];
            $bloque=(int) $item['bloque'];
            $materia= $item['materia'];
            $id_alumno=(int) $item['id_alumno'];

            $result=$db->query("SELECT * FROM calificaciones WHERE bloque=$bloque AND materia='$materia' AND id_alumno=$id_alumno");
            if ($result->num_rows > 0){
                $db->query("UPDATE calificaciones SET calificacion=$calificacion WHERE bloque=$bloque AND materia='$materia' AND id_alumno=$id_alumno");

            }else{
                $db->query("INSERT INTO calificaciones (calificacion,grupo,bloque,materia,id_alumno) 
                VALUES ($calificacion,'$grupo',$bloque,'$materia',$id_alumno)");
            }

        }
        $db->close();
        echo "true";

    }




}

?>