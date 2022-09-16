<?php 
	require_once("easyCRUD.class.php");

	class Distrito  Extends Crud {
		
			# Your Table name 
			protected $table = 'distrito';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Distrito($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM distrito p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}




        public function dameProvincia($id){

            $sql="SELECT  * FROM provincia p WHERE id = '$id' ";

            return $this->unrow($sql);

        }


        public function dameCiudad($id){

            $sql="SELECT  * FROM ciudad p WHERE id = '$id' ";

            return $this->unrow($sql);

        }

        



        public function Actualizar($id,$distrito,$ciudadId){
            $sql="UPDATE distrito SET distrito='$distrito', ciudad_id='$ciudadId' WHERE id = '$id'";

           return $this->exec($sql);
        }

        public function Ingresar($distrito,$ciudadId){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO distrito (distrito,ciudad_id) VALUES('$distrito','$ciudadId')";

           return $this->exec($sql);
        }



                        
	}

?>