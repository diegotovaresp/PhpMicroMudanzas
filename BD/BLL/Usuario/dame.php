<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Usuario.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Usuario=new Usuario();

echo json_encode($Usuario->verificar_email($_POST['email']));
?>
