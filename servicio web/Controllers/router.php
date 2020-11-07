<?php
include_once 'Models/create.php';
include_once 'Models/read.php';
include_once 'Models/update.php';
include_once 'Models/delete.php';

$create= new create();
$read= new read();
$update= new update();
$delete= new delete();

function router($url, $body){
    global $create;
    global $read;
    global $update;
    global $delete;

    switch($url){
        case '/':
            echo 'API CMM';
        break;

        case '/administrador/login':
            $read->login('administrador',$body);
        break;

        case '/maestros':
            $read->maestros();
        break;

        case '/maestros/login':
            $read->login('maestros',$body);
        break;

        case '/maestros/create':
            $create->maestros($body);
        break;

        case '/maestros/update':
            $update->maestros($body);
        
        break;

        case '/maestros/delete':
            $delete->maestros($body);
        break;

        case '/personal':
            $read->personal();
        break;

        case '/personal/login':
            $read->login('personal',$body);
        break;

        case '/personal/create':
            $create->personal($body);
        break;

        case '/personal/update':
            $update->personal($body);
        break;

        case '/personal/delete':
            $delete->personal($body);
        break;
    
        case '/banner':
            $read->banner();
        break;

        case '/banner/create':
            $create->banner($body);
        break;

        case '/banner/update':
            $update->banner($body);
        break;

        case '/banner/delete':
            $delete->banner($body);
        break;

        case '/anuncios':
            $read->anuncios();
        break;

        case '/anuncios/create':
            $create->anuncios($body);
        break;

        case '/anuncios/update':
            $update->anuncios($body);
        break;

        case '/anuncios/delete':
            $delete->anuncios($body);
        break;

        case '/materias':
            $read->materias();
        break;

        case '/materias/maestro':
            $read->materiaspormaestro($body);
        break;

        case '/materias/create':
            $create->materias($body);
        break;

        case '/materias/update':
            $update->materias($body);
        break;

        case '/materias/delete':
            $delete->materias($delete);
        break;

        case '/alumnos':
            $read->alumnos();
        break;

        case '/alumnos/create':
            $create->alumnos($body);
        break;

        case '/alumnos/update':
            $update->alumnos($body);
        break;

        case '/alumnos/delete':
            $delete->alumnos($body);
        break;

        case '/pagos':
            $read->pagos();
        break;

        case '/pagos/create':
            $create->pagos($body);
        break;
        
        case '/pagos/update':
            $update->pagos($body);
        break;

        case '/grupos':
            $read->grupos();
        break;

        case '/grupo/alumnos':
            $read->alumnosporgrupo($body);
        break;

        case '/calificaciones':
            $read->calificaciones($body);

        break;

        case '/calificaciones/create':
            $create->calificaciones($body);
        break;
    }
}


?>