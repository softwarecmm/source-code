<?php
include_once 'Config/db.php';

class update extends db{

    function maestros($body) {
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=(int) $item['id'];
            $nombre=$item['nombre'];
            $carrera=$item['carrera'];
            $telefono=(int) $item['telefono'];
            $correo=$item['correo'];
            $contraseña=$item['contraseña'];
            $sql = "UPDATE maestros SET nombre='$nombre', carrera='$carrera',telefono=$telefono,correo='$correo', contraseña='$contraseña' WHERE id=$id";
            $db->query($sql);
        }   
        $db->close();
        echo "true";
    }

    function personal($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=(int) $item['id'];
            $nombre=$item['nombre'];
            $cargo=$item['cargo'];
            $telefono=(int) $item['telefono'];
            $correo=$item['correo'];
            $contraseña=$item['contraseña'];
            $sql = "UPDATE personal set nombre='$nombre', cargo='$cargo',
            telefono=$telefono, correo='$correo', contraseña='$contraseña' WHERE id=$id";
            $db->query($sql);
     
        }   
        $db->close();
        echo "true";
    }

    function banner($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=$item['id'];
            $url=$item['url'];
            $accion=$item['accion'];
            $sql = "UPDATE banner set url='$url', accion='$accion' WHERE id=$id";
            $db->query($sql);
        }   
        $db->close();
        echo "true";  
    }

    function anuncios($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=$item['id'];
            $mensaje=$item['mensaje'];
            $fecha=$item['fecha'];
            $duracion=$item['duracion'];
            $destinatario=$item['destinatario'];
            $sql = "UPDATE anuncios set mensaje='$mensaje', fecha=$fecha, duracion=$duracion,
            destinatario='$destinatario'  WHERE id=$id";
            $db->query($sql);
     
        }   
        $db->close();
        echo "true";        
    }

    function materias($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=$item['id'];
            $nombre=$item['nombre'];
            $url=$item['url'];
            $sql = "UPDATE materias set nombre='$nombre', url='$url' WHERE id=$id";
            $db->query($sql);
     
        }   
        $db->close();
        echo "true";
    }

    function alumnos($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=$item['id'];
            $nombre=$item['nombre'];
            $tutor=$item['tutor'];
            $telefono=$item['telefono'];
            $status=$item['status'];
            $id_grupo=$item['id_grupo'];
            $sql = "UPDATE alumnos set nombre='$nombre', tutor='$tutor',
            telefono=$telefono, status='$status', id_grupo=$id_grupo WHERE id=$id";
            $db->query($sql);
        }   
        $db->close();  
        echo "true";   
    }

    function pagos($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $id=$item['id'];
            $cantidad=$item['cantidad'];
            $fecha=$item['fecha'];
            $periodo=$item['periodo'];
            $id_alumno=$item['id_alumno'];
            $sql = "UPDATE pagos set cantidad=$cantidad, fecha=$fecha,
            periodo=$periodo, id_alumno='$id_alumno' WHERE id=$id";
            $db->query($sql);
        }   
        $db->close(); 
        echo "true"; 
    }

}
?>