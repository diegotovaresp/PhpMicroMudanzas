<?php
session_start();
include('../../DAO/easyCRUD/Usuario.class.php');
date_default_timezone_set("America/Lima");
        header("Access-Control-Allow-Origin: *");

function getRealIpAddr()

{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  //check ip from share internet
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  //to check ip is pass from proxy
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$uuid=$_POST['uuid'];

    

$usuario=new  Usuario();
$rw=$usuario->Dame_UserxUuid($uuid);
$ip=getRealIpAddr();
$diahora=date("y-m-d H:i:s");
if ($rw["idUsuario"]>0)
{
    
  $_SESSION['userid']=$rw["idUsuario"];
 $_SESSION['user']=$user;
    $_SESSION['username']=$rw["Usuario"];
     $_SESSION["uid"]=$rw["idUsuario"];
    $_SESSION['Name']=$rw["Usuario"];
    $_SESSION['Fono']=$rw["Telefono"];
    $_SESSION['Email']=$rw["Email"];
 echo '1';
 


}
else
{
echo '2';
}

?>