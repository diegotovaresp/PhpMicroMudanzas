<?php
session_start();
include('../../DAO/easyCRUD/Partida.class.php');
$Partida=new Partida();
$Partida->Partida=$_POST['add_partida'];
$Partida->create();
?>
