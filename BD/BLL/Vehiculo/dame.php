<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Vehiculo.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Vehiculo=new Vehiculo();

$city =$Vehiculo->dame($_POST['id']);
$a = array();
$a["id"]=$city["id"];
    $a["placa"]=$city["placa"];
    $modelomarcavehiculo = $Vehiculo->dameModeloMarcaVehiculo($city["modelo_marca_vehiculo_id"]);
    $b["id"]= $modelomarcavehiculo["id"];
    $b["modeloMarcaVehiculo"]=$modelomarcavehiculo["modeloMarcaVehiculo"];
    $b["marcaVehiculo"]=$Vehiculo->dameMarcaVehiculo($modelomarcavehiculo["marca_vehiculo_id"]);
    $a["owner"]=$Vehiculo->dameUsuario($city["owner_id"]);
    $a["chofer"]=$Vehiculo->dameUsuario($city["chofer_id"]);
    $a["tipoVehiculo"]=$Vehiculo->dameTipoVehiculo($city["tipo_vehiculo_id"]);
    $a["modeloMarcaVehiculo"]=$b;

echo json_encode($a);
?>
