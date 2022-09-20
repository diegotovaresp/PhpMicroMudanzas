<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Servicio.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Servicio=new Servicio();

echo json_encode($Servicio->dame($_POST['id']));
?>
