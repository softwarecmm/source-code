<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include_once 'Controllers/router.php';


$body = file_get_contents('php://input');
if(isset($_GET['url'])){
    router('/'.$_GET['url'],$body);
}

if(isset($_FILES['file'])){
    $name=$_FILES['file']['name'];
    copy($_FILES['file']['tmp_name'], "img/$name");
    $data=array(
        "url" => "https://apicmm.000webhostapp.com/img/$name",
        "accion" => "null",
    );
    router('/banner/create',$data); 
}



?>