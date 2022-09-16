<?php
session_start();
include('../../DAO/easyCRUD/MarcaVehiculo.class.php');

header("Access-Control-Allow-Origin: *");
$MarcaVehiculo=new MarcaVehiculo();
if($_POST['id']>0){
    $MarcaVehiculo->id=$_POST['id'];
$MarcaVehiculo->marcaVehiculo=$_POST['marcaVehiculo'];
$MarcaVehiculo->save();
}

?>