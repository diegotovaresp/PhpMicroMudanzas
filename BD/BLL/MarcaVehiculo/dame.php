<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/MarcaVehiculo.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$MarcaVehiculo=new MarcaVehiculo();

echo json_encode($MarcaVehiculo->dame($_POST['id']));
?>
