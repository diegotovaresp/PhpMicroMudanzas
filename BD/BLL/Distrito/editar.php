<?php
session_start();
include('../../DAO/easyCRUD/Distrito.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Distrito=new Distrito();
if($_POST['id']>0){
    $Distrito->id=$_POST['id'];
$Distrito->distrito=$_POST['distrito'];
$Distrito->ciudad_id=$_POST['ciudadId'];
$Distrito->save();
}
$rResult =$Distrito->tabla_Distrito("","", "");


echo json_encode($rResult);
?>