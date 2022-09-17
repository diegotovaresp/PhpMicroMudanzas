<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Usuario.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Usuario=new Usuario();

$city =$Usuario->dame($_POST['id']);
$a = array();
$a["id"]=$city["id"];
    $a["email"]=$city["email"];
$a["email"]=$city["email"];
$a["nombre"]=$city["nombre"];
$a["celular"]=$city["celular"];
$a["nroDocumento"]=$city["nroDocumento"];

echo json_encode($a);
?>
