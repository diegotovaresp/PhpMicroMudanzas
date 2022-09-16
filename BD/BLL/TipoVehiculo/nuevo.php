<?php
session_start();
include('../../DAO/easyCRUD/MarcaVehiculo.class.php');
header("Access-Control-Allow-Origin: *");
$MarcaVehiculo=new MarcaVehiculo();
$MarcaVehiculo->marcaVehiculo=$_POST['marcaVehiculo'];
$MarcaVehiculo->create();
?>
