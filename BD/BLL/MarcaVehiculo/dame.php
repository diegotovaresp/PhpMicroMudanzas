<?php
session_start();
date_default_timezone_set("America/Lima");
include('../../DAO/easyCRUD/Partida.class.php');
$Partida=new Partida();

echo json_encode($Partida->dame($_POST['idPartida']));
?>
