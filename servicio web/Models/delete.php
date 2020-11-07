<?php
include_once 'Config/db.php';

class delete extends db{

    function maestros($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $correo=$item['correo'];
            $sql = "DELETE FROM maestros WHERE correo='$correo'";
            $db->query($sql);
        }   
        $db->close(); 
        echo "true";
    }

    function personal($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $correo=$item['correo'];
            $sql = "DELETE FROM personal WHERE correo='$correo'";
            $db->query($sql);
        }   
        $db->close(); 
        echo "true";
    }

    function banner($body){
        $data=json_decode($body, true);
        $name= $data['name'];
        $url= $data['url'];
        unlink($name);   
        $db=$this->connect();
        $sql = "DELETE FROM banner WHERE url='$url'";
        $db->query($sql);
        $db->close(); 
        echo "true";
    }

    function anuncios($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $mensaje=$item['mensaje'];
            $sql = "DELETE FROM anuncios WHERE mensaje='$mensaje'";
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
            $sql = "DELETE FROM materias WHERE nombre='$nombre'";
            $db->query($sql);
        }   
        $db->close(); 
        echo "true";
    }

    function alumnos($body){
        $data=json_decode($body, true);
        $db=$this->connect();
        foreach ($data as &$item) {
            $telefono=(int) $item['telefono'];
            $sql = "DELETE FROM alumnos WHERE telefono=$telefono";
            $db->query($sql);
        }   
        $db->close();
        echo "true";
    }
}

?>