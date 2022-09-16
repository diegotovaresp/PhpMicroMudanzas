<?php 
	require_once("easyCRUD.class.php");

	class Ciudad  Extends Crud {
		
			# Your Table name 
			protected $table = 'ciudad';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Ciudad(){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM ciudad p ";

        return $this->exec($sql);

	}

        public function dameProvincia($id){

            $sql="SELECT  p.id as provinciaId, p.provincia FROM provincia p WHERE id = '$id' ";

            return $this->unrow($sql);

        }


        public function dameCiudad($id){

            $sql="SELECT  p.id as id, p.ciudad, p.provincia_id FROM ciudad p WHERE id = '$id' ";

            return $this->unrow($sql);

        }
        
        


        



        public function Actualizar($id,$ciudad,$provinciaId){
            $sql="UPDATE ciudad SET ciudad='$ciudad', provincia_id='$provinciaId' WHERE id = '$id'";

           return $this->exec($sql);
        }

        public function Ingresar($ciudad,$provincia_id){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO ciudad (ciudad,provincia_id) VALUES('$ciudad','$provincia_id')";

           return $this->exec($sql);
        }



                        
	}

?>