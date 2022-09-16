<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Ciudad.class.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Ciudad=new Ciudad();

echo json_encode($Ciudad->dame($_POST['id']));
?>
