<?php
session_start();
include('../../DAO/easyCRUD/TipoVehiculo.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$TipoVehiculo=new TipoVehiculo();
$TipoVehiculo->tipoVehiculo=$_POST['tipoVehiculo'];
$TipoVehiculo->create();
$rResult =$TipoVehiculo->tabla_TipoVehiculo("","", "");
echo json_encode($rResult);
?>
