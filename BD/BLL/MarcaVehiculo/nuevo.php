<?php
session_start();
include('../../DAO/easyCRUD/MarcaVehiculo.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$MarcaVehiculo=new MarcaVehiculo();
$MarcaVehiculo->marcaVehiculo=$_POST['marcaVehiculo'];
$MarcaVehiculo->create();
$rResult =$MarcaVehiculo->tabla_MarcaVehiculo("","", "");


echo json_encode($rResult);
?>
