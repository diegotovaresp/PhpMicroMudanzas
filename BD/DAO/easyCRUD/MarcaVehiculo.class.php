<?php 
	require_once("easyCRUD.class.php");

	class MarcaVehiculo  Extends Crud {
		
			# Your Table name 
			protected $table = 'marca_vehiculo';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_MarcaVehiculo($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM marca_vehiculo p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}



        public function Actualizar($id,$marcaVehiculo){
            $sql="UPDATE marca_vehiculo SET marcaVehiculo='$marcaVehiculo'  WHERE id = '$id'";

            return $this->exec($sql);
        }

        public function Ingresar($marcaVehiculo){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO marca_vehiculo (marcaVehiculo) VALUES('$marcaVehiculo')";

            return $this->exec($sql);
        }
                        
	}

?>