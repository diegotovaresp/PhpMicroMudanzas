<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Provincia.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Provincia=new Provincia();

echo json_encode($Provincia->dame($_POST['id']));
?>
