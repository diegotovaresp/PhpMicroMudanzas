<?php
session_start();
include('../../DAO/easyCRUD/Provincia.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Provincia=new Provincia();
if($_POST['id']>0){
    $Provincia->id=$_POST['id'];
$Provincia->provincia=$_POST['provincia'];
$Provincia->save();
}
$rResult =$Provincia->tabla_Provincia("","", "");


echo json_encode($rResult);
?>