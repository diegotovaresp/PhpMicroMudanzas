<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Ciudad.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Ciudad=new Ciudad();

$city =$Ciudad->dameCiudad($_POST['id']);
$a = array();
$a["id"]=$city["id"];
    $a["ciudad"]=$city["ciudad"];
    $provincia = $Ciudad->dameProvincia($city["id"]);
    $a["provincia"]=$provincia;

echo json_encode($a);
?>
