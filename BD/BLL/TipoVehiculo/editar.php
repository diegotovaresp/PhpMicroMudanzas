<?php
session_start();
include('../../DAO/easyCRUD/TipoVehiculo.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$TipoVehiculo=new TipoVehiculo();
if($_POST['id']>0){
    $TipoVehiculo->id=$_POST['id'];
$TipoVehiculo->tipoVehiculo=$_POST['tipoVehiculo'];
$TipoVehiculo->save();
}

$rResult =$TipoVehiculo->tabla_TipoVehiculo("","", "");
echo json_encode($rResult);
?>