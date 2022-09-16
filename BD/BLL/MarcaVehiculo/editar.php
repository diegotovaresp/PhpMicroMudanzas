<?php
session_start();
include('../../DAO/easyCRUD/Partida.class.php');
$Partida=new Partida();
if($_POST['edit_partida_id']>0){
    $Partida->idPartida=$_POST['edit_partida_id'];
$Partida->Partida=$_POST['edit_partida'];
$Partida->save();
}

?>