<?php 
	require_once("easyCRUD.class.php");

	class Ciudad  Extends Crud {
		
			# Your Table name 
			protected $table = 'ciudad';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Ciudad($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM ciudad p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}
        
        
        
        public function verificar_email($email)
        {
       $sql="SELECT * FROM ciudad as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }
        public function verificar_emailpersona($email)
        {
       $sql="SELECT * FROM ciudad as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }

        public function Dame_UserxUuid($uuid){
    $sql="SELECT u.*  FROM ciudad as u  WHERE u.fbuuid = '$uuid'";

   return $this->unrow($sql);
}
        
        



        public function ActualizaPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $sql="UPDATE ciudad SET FechaNacimiento='$fechaNac', Telefono='$telefono', idSexo='$idSexo', idPais='$idPais' WHERE DNI = '$dni'";

           return $this->exec($sql);
        }

        public function IngresarPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO ciudad (DNI,Telefono,Fecha,FechaNacimiento,idPais,idSexo) VALUES('$dni','$telefono','$fecha','$fechaNac','$idPais','$idSexo')";

           return $this->exec($sql);
        }



        
        public function encontrados(){

	
	$sql="SELECT FOUND_ROWS() as numeros ";

	

	return $this->solo($sql);

	}
        
        public function cantidad_Ciudad($idcliente){

	$sql="SELECT COUNT(*) as numeros FROM ciudad WHERE idCliente='$idcliente' ";

	return $this->solo($sql);

	}
                        
	}

?>