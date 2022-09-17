<?php
session_start();
include('../../DAO/easyCRUD/Usuario.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Usuario=new Usuario();

$rResult =$Usuario->tabla_Chofer();


echo json_encode($rResult);
?>