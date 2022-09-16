<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/TipoVehiculo.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$TipoVehiculo=new TipoVehiculo();

echo json_encode($TipoVehiculo->dame($_POST['id']));
?>
