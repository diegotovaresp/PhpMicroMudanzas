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
        
        
        
        public function verificar_email($email)
        {
       $sql="SELECT * FROM marca_vehiculo as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }
        public function verificar_emailpersona($email)
        {
       $sql="SELECT * FROM marca_vehiculo as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }

        public function Dame_UserxUuid($uuid){
    $sql="SELECT u.*  FROM marca_vehiculo as u  WHERE u.fbuuid = '$uuid'";

   return $this->unrow($sql);
}
        
        



        public function ActualizaPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $sql="UPDATE marca_vehiculo SET FechaNacimiento='$fechaNac', Telefono='$telefono', idSexo='$idSexo', idPais='$idPais' WHERE DNI = '$dni'";

           return $this->exec($sql);
        }

        public function IngresarPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO marca_vehiculo (DNI,Telefono,Fecha,FechaNacimiento,idPais,idSexo) VALUES('$dni','$telefono','$fecha','$fechaNac','$idPais','$idSexo')";

           return $this->exec($sql);
        }



        
        public function encontrados(){

	
	$sql="SELECT FOUND_ROWS() as numeros ";

	

	return $this->solo($sql);

	}
        
        public function cantidad_MarcaVehiculo($idcliente){

	$sql="SELECT COUNT(*) as numeros FROM marca_vehiculo WHERE idCliente='$idcliente' ";

	return $this->solo($sql);

	}
                        
	}

?>