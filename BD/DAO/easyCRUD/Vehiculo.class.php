<?php 
	require_once("easyCRUD.class.php");

	class Vehiculo  Extends Crud {
		
			# Your Table name 
			protected $table = 'vehiculo';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Vehiculo(){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM vehiculo p ";

        return $this->exec($sql);

	}

        public function dameProvincia($id){

            $sql="SELECT  p.id as provinciaId, p.provincia FROM provincia p WHERE id = '$id' ";

            return $this->unrow($sql);

        }


        public function dameModeloMarcaVehiculo($id){

            $sql="SELECT  * FROM modelo_marca_vehiculo p WHERE id = '$id' ";

            return $this->unrow($sql);

        }
        public function dameTipoVehiculo($id){

            $sql="SELECT  * FROM tipo_vehiculo p WHERE id = '$id' ";

            return $this->unrow($sql);

        }

        public function dameMarcaVehiculo($id){

            $sql="SELECT  * FROM marca_vehiculo p WHERE id = '$id' ";

            return $this->unrow($sql);

        }

        public function dameUsuario($id){

            $sql="SELECT  * FROM usuario p WHERE id = '$id' ";

            return $this->unrow($sql);

        }
        
        


        



        public function Actualizar($id,$vehiculo,$provinciaId){
            $sql="UPDATE vehiculo SET vehiculo='$vehiculo', provincia_id='$provinciaId' WHERE id = '$id'";

           return $this->exec($sql);
        }

        public function Ingresar($vehiculo,$provincia_id){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO vehiculo (vehiculo,provincia_id) VALUES('$vehiculo','$provincia_id')";

           return $this->exec($sql);
        }



                        
	}

?>