<?php 
	require_once("easyCRUD.class.php");

	class TipoVehiculo  Extends Crud {
		
			# Your Table name 
			protected $table = 'tipo_vehiculo';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_TipoVehiculo($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM tipo_vehiculo p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}


        public function Actualizar($id,$tipoVehiculo){
            $sql="UPDATE tipo_vehiculo SET tipoVehiculo='$tipoVehiculo'  WHERE id = '$id'";

            return $this->exec($sql);
        }

        public function Ingresar($tipoVehiculo){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO tipo_vehiculo (tipoVehiculo) VALUES('$tipoVehiculo')";

            return $this->exec($sql);
        }


    }

?>