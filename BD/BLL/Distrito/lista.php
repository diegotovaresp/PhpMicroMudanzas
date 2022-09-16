<?php
session_start();
include('../../DAO/easyCRUD/Distrito.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Distrito=new Distrito();
/* Paging */
$rResult =$Distrito->tabla_Distrito();
$a = array();
foreach ($rResult as $Clien){
    $a["id"]=$Clien["id"];
    $a["distrito"]=$Clien["distrito"];
    $city = $Distrito->dameCiudad($Clien["ciudad_id"]);
    $rr["id"] = $city["id"];
    $rr["ciudad"] = $city["ciudad"];
    $prov = $Distrito->dameProvincia($city["provincia_id"]);
    $rr["provincia"] = $prov;
    $a["ciudad"]=$rr;
    $b[]=$a;
}

echo json_encode($b);

?>