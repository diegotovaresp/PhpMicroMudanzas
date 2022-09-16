<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Distrito.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Distrito=new Distrito();

$district =$Distrito->dameDistrito($_POST['id']);
$a = array();
$a["id"]=$district["id"];
$a["distrito"]=$district["distrito"];
$city = $Distrito->dameCiudad($district["ciudad_id"]);
$b = array();
$b["id"]=$city["id"];
$b["ciudad"]=$city["ciudad"];
$provincia = $Distrito->dameProvincia($city["provincia_id"]);
$b["provincia"]=$provincia;
$a["ciudad"]=$b;

echo json_encode($a);
?>
