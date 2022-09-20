<?php
session_start();
include('../../DAO/easyCRUD/Usuario.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Usuario=new Usuario();
$Usuario->id = $_POST["id"];
$Usuario->nombre = $_POST["nombre"];
$Usuario->nroDocumento=$_POST["nroDocumento"];
$Usuario->celular=$_POST["celular"];
$Usuario->cliente = $_POST["cliente"];
$Usuario->empresa = $_POST["empresa"];
$Usuario->fbid = $_POST["fbid"];
$Usuario->administrador = $_POST["administrador"];
$Usuario->chofer = $_POST["chofer"];
$Usuario->save();
$rResult =$Usuario->tabla_Usuario("","", "");
echo json_encode($rResult);
?>
