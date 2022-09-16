<?php
session_start();
include('../../DAO/easyCRUD/Ciudad.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Ciudad=new Ciudad();
if($_POST['id']>0){
    $Ciudad->id=$_POST['id'];
$Ciudad->ciudad=$_POST['ciudad'];
$Ciudad->provincia_id=$_POST['provinciaId'];
$Ciudad->save();
}

?>