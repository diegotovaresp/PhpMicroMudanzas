<?php
session_start();
include('../../DAO/easyCRUD/Servicio.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Servicio=new Servicio();
if($_POST['id']>0){
    $Servicio->id=$_POST['id'];
$Servicio->servicio=$_POST['servicio'];
$Servicio->save();
}

$rResult =$Servicio->tabla_Servicio("","", "");
echo json_encode($rResult);
?>