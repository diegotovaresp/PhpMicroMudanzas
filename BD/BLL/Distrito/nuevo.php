<?php
session_start();
include('../../DAO/easyCRUD/Ciudad.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Ciudad=new Ciudad();
$Ciudad->ciudad=$_POST['ciudad'];
$Ciudad->provincia_id=$_POST['provinciaId'];

$Ciudad->create();
?>
