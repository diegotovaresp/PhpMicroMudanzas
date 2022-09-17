<?php
session_start();
include('../../DAO/easyCRUD/Vehiculo.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Vehiculo=new Vehiculo();
/* Paging */
$rResult =$Vehiculo->tabla_Vehiculo();
$a = array();
foreach ($rResult as $city){
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
    $c[]=$a;
}

echo json_encode($c);

?>