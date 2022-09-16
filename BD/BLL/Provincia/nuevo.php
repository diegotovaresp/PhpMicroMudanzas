<?php
session_start();
include('../../DAO/easyCRUD/Provincia.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Provincia=new Provincia();
$Provincia->provincia=$_POST['provincia'];

$Provincia->create();

$rResult =$Provincia->tabla_Provincia("","", "");


echo json_encode($rResult);
?>
