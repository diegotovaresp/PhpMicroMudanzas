<?php
session_start();
include('../../DAO/easyCRUD/Servicio.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Servicio=new Servicio();
$Servicio->servicio=$_POST['servicio'];
$Servicio->create();
$rResult =$Servicio->tabla_Servicio("","", "");
echo json_encode($rResult);
?>
