<?php 
	require_once("easyCRUD.class.php");

	class Servicio  Extends Crud {
		
			# Your Table name 
			protected $table = 'servicio';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Servicio($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM servicio p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}


        public function Actualizar($id,$tipoVehiculo){
            $sql="UPDATE servicio SET tipoVehiculo='$tipoVehiculo'  WHERE id = '$id'";

            return $this->exec($sql);
        }

        public function Ingresar($tipoVehiculo){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO servicio (tipoVehiculo) VALUES('$tipoVehiculo')";

            return $this->exec($sql);
        }


    }

?>