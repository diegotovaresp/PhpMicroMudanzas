<?php
session_start();
include('../../DAO/easyCRUD/Ciudad.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Ciudad=new Ciudad();
$Ciudad->ciudad=$_POST['ciudad'];
$Ciudad->provincia_id=$_POST['provinciaId'];

$Ciudad->create();

$rResult =$Ciudad->tabla_Ciudad();
$a = array();
foreach ($rResult as $Clien){
    $a["id"]=$Clien["id"];
    $a["ciudad"]=$Clien["ciudad"];
    $provincia = $Ciudad->dameProvincia($Clien["id"]);
    $a["provincia"]=$provincia;
    $b[]=$a;
}

echo json_encode($b);
?>
