<?php 
	require_once("easyCRUD.class.php");

	class Viaje  Extends Crud {
		
			# Your Table name 
			protected $table = 'viaje';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Viaje(){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM viaje p ";

        return $this->exec($sql);

	}

        public function dameProvincia($id){

            $sql="SELECT  p.id as provinciaId, p.provincia FROM provincia p WHERE id = '$id' ";

            return $this->unrow($sql);

        }



        public function dameTipoViaje($id){

            $sql="SELECT  * FROM tipo_viaje p WHERE id = '$id' ";

            return $this->unrow($sql);

        }

        public function dameMarcaViaje($id){

            $sql="SELECT  * FROM marca_viaje p WHERE id = '$id' ";

            return $this->unrow($sql);

        }

        public function dameUsuario($id){

            $sql="SELECT  * FROM usuario p WHERE id = '$id' ";

            return $this->unrow($sql);

        }
        
        


        



        public function Actualizar($id,$viaje,$provinciaId){
            $sql="UPDATE viaje SET viaje='$viaje', provincia_id='$provinciaId' WHERE id = '$id'";

           return $this->exec($sql);
        }

        public function Ingresar($viaje,$provincia_id){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO viaje (viaje,provincia_id) VALUES('$viaje','$provincia_id')";

           return $this->exec($sql);
        }



                        
	}

?>