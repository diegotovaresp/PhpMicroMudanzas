<?php 
	require_once("easyCRUD.class.php");

	class ModeloMarcaVehiculo  Extends Crud {
		
			# Your Table name 
			protected $table = 'marca_vehiculo';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_ModeloMarcaVehiculo($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM marca_vehiculo p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}



        public function Actualizar($id,$modeloMarcaVehiculo,$marcaVehiculoId){
            $sql="UPDATE marca_vehiculo SET modeloMarcaVehiculo='$modeloMarcaVehiculo', marca_vehiculo_id = '$marcaVehiculoId'  WHERE id = '$id'";

            return $this->exec($sql);
        }

        public function Ingresar($modeloMarcaVehiculo,$marcaVehiculoId){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO marca_vehiculo (modeloMarcaVehiculo,marca_vehiculo_id) VALUES('$modeloMarcaVehiculo','$marcaVehiculoId')";

            return $this->exec($sql);
        }
                        
	}

?>