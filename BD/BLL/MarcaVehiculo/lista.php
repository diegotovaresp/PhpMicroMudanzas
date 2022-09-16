<?php
session_start();
include('../../DAO/easyCRUD/Partida.class.php');
$Partida=new Partida();
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
		$sWhere = " WHERE   Partida LIKE '%".$buscar['value']."%' ";
              
                
	}
        
$rResult =$Partida->tabla_Partida($sWhere,$sLimit, $sOrder);
$iFilteredTotal =$Partida->encontrados();
$iTotal=$Partida->cantidad_Partida();

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-type: text/x-json");

         $response["draw"] = intval($_GET['draw']);
      $response["recordsTotal"] = $iTotal;

                $response["recordsFiltered"] = $iFilteredTotal;
foreach($rResult as $aRow){
        	      $respns["idPartida"] = $aRow["idPartida"];

          $respns["editar"]  = '<button  onclick="editar_partida('. $aRow['idPartida'] .')" type="button" class="btn btn-success" title="Editar"><i class="fa fa-edit"></i></button>';
 
                        	      $respns["Partida"] = $aRow["Partida"];

                        	      $respns["Link"] = '<a href="https://tunay.app/inscripcion/'.addslashes($aRow["tag"]).'" >https://tunay.app/inscripcion/'.addslashes($aRow["tag"]).'</a>';              
 $response["data"][]=$respns;

	}
if (count($rResult)==0){
     $data=array();
     $response['data']=$data;
 }
echo json_encode($response);
function fnColumnToField( $i )
	{
		if ( $i == 0 )
			return "idPartida";

		else if ( $i == 2 )
			return "Partida";

        }
?>