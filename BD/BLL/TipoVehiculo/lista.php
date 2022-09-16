<?php
session_start();
include('../../DAO/easyCRUD/MarcaVehiculo.class.php');

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
header("Content-type: text/x-json");
header("Access-Control-Allow-Origin: *");
$MarcaVehiculo=new MarcaVehiculo();
/* Paging */
	$sLimit = "";
	if ( isset( $_GET['start'] ) )
	{
		$sLimit = "LIMIT ".$_GET['start'].", ".$_GET['length'];
	}
/* Ordering */
$sOrder = "";
	$order=$_GET['order'];        
	if ( isset( $order ) )
	{
		$sOrder = "ORDER BY  ";
		foreach ($order as $ord){
                 $sOrder .= fnColumnToField($ord['column'])." ".$ord['dir'].", "; 
              }
              $sOrder = substr_replace( $sOrder, "", -2 );
	}
$buscar=$_GET['search'];
	if ( $buscar['value'] != "" )
	{
		$sWhere = " WHERE   marcaVehiculo LIKE '%".$buscar['value']."%' ";
              
                
	}
        
$rResult =$MarcaVehiculo->tabla_MarcaVehiculo($sWhere,$sLimit, $sOrder);


echo json_encode($rResult);
?>