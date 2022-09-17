<?php 
	require_once("easyCRUD.class.php");

	class Usuario  Extends Crud {
		
			# Your Table name 
			protected $table = 'usuario';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
                        
       public function tabla_Usuario(){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM usuario p ";


        return $this->exec($sql);

	}

        public function tabla_Chofer(){

            $sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM usuario p WHERE chofer=1 ";
            return $this->exec($sql);

        }

        public function tabla_Administrador(){

            $sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM usuario p WHERE administrador=1 ";
            return $this->exec($sql);

        }
        public function tabla_ClientesEmpresa(){

            $sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM usuario p WHERE empresa=1 ";
            return $this->exec($sql);

        }

        public function tabla_Clientes(){

            $sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM usuario p WHERE cliente=1 ";


            return $this->exec($sql);

        }
        
        
        
        public function verificar_email($email)
        {
       $sql="SELECT * FROM usuario as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }
        public function verificar_emailpersona($email)
        {
       $sql="SELECT * FROM usuario as u WHERE u.email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }

        public function Dame_UserxUuid($uuid){
    $sql="SELECT u.*  FROM usuario as u  WHERE u.fbuuid = '$uuid'";

   return $this->unrow($sql);
}
        
        



        public function ActualizaPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $sql="UPDATE usuario SET FechaNacimiento='$fechaNac', Telefono='$telefono', idSexo='$idSexo', idPais='$idPais' WHERE DNI = '$dni'";

           return $this->exec($sql);
        }

        public function IngresarPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT INTO usuario (DNI,Telefono,Fecha,FechaNacimiento,idPais,idSexo) VALUES('$dni','$telefono','$fecha','$fechaNac','$idPais','$idSexo')";

           return $this->exec($sql);
        }



        
        public function encontrados(){

	
	$sql="SELECT FOUND_ROWS() as numeros ";

	

	return $this->solo($sql);

	}
        
        public function cantidad_Usuario($idcliente){

	$sql="SELECT COUNT(*) as numeros FROM usuario WHERE idCliente='$idcliente' ";

	return $this->solo($sql);

	}
                        
	}

?>