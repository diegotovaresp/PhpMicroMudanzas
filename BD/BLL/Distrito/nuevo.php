<?php
session_start();
include('../../DAO/easyCRUD/Distrito.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Distrito=new Distrito();
$Distrito->distrito=$_POST['ciudad'];
$Distrito->provincia_id=$_POST['provinciaId'];

$Distrito->create();
$rResult =$Distrito->tabla_Distrito("","", "");


echo json_encode($rResult);
?>
