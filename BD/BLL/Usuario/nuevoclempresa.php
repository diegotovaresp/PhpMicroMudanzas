<?php
session_start();
include('../../DAO/easyCRUD/Usuario.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Usuario=new Usuario();

$Usuario->nombre = $_POST["nombre"];
$Usuario->nroDocumento=$_POST["nroDocumento"];
$Usuario->celular=$_POST["celular"];
$Usuario->cliente = 0;
$Usuario->empresa = 1;
$Usuario->email = $_POST["email"];
$Usuario->fbid = $_POST["fbid"];
$Usuario->administrador = 0;
$Usuario->chofer = 0;
$Usuario->create();
$rResult =$Usuario->tabla_Usuario("","", "");
echo json_encode($rResult);
?>
