<?php
session_start();
include('../../DAO/easyCRUD/Provincia.class.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$Provincia=new Provincia();
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
        
$rResult =$Provincia->tabla_Provincia($sWhere,$sLimit, $sOrder);


echo json_encode($rResult);
?>