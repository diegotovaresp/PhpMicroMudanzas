<?php 
	require_once("easyCRUD.class.php");

	class Usuario  Extends Crud {
		
			# Your Table name 
			protected $table = 'bg_Usuario';
			
			# Primary Key of the Table
			protected $pk	 = 'idUsuario';
                        
       public function tabla_Usuario($where="",$limit="", $order=""){

	$sql="SELECT SQL_CALC_FOUND_ROWS p.* FROM bg_Usuario p ";

        $sql.=$where;

	$sql.=" ";

	$sql.=$order;

	$sql.=" ";

	$sql.=$limit; 
        
        return $this->exec($sql);

	}
        
           public function verificar_facebook($fbid)
        {
       $sql="SELECT * FROM bg_UsuarioProvider as u WHERE u.oauth_uid = '$fbid' AND  u.oauth_provider='facebook'";
        $row=$this->unrow($sql);
        
        if ( $row["idUsuario"]>0){
            return true;
            }
            else {
                return false;

            }
        }
        
         public function damefacebook($fbid)
        {
       $sql="SELECT up.idUsuario, u.Nombre, u.Telefono, u.DNI, u.Usuario, u.email as EmailU, u.idGrupo, u.picture, u.isprofile, u.isfoto, u.isverified, p.idPais FROM bg_Usuario u LEFT JOIN bg_UsuarioProvider up ON u.idUsuario=up.idUsuario LEFT JOIN bg_Persona p ON u.DNI=p.DNI WHERE up.oauth_uid = '$fbid' AND  up.oauth_provider='facebook'";
        $row=$this->unrow($sql);
        
       return $row;
        }
        
        public function verificar_email($email)
        {
       $sql="SELECT * FROM bg_Usuario as u WHERE u.Email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }
        public function verificar_emailpersona($email)
        {
       $sql="SELECT * FROM bg_Persona as u WHERE u.Email = '$email'";
        $row=$this->unrow($sql);
        
        return $row;
        }
        public function Dame_UserxUuid($uuid){
    $sql="SELECT u.*  FROM bg_Usuario as u  WHERE u.fbuuid = '$uuid'";

   return $this->unrow($sql);
}
        
        
        public function verificar_password($usuario,$password)
        {
       $sql="SELECT * FROM bg_Usuario as u WHERE u.Usuario = '$usuario'";
        $row=$this->unrow($sql);
        
        if ( $row["Password"]==$password){
            return true;
            }
            else {
                return false;

            }
        }
        
         public function verificar_passwordemail($email,$password)
        {
       $sql="SELECT * FROM bg_Usuario as u WHERE u.Email = '$email'";
        $row=$this->unrow($sql);
        
        if ( $row["Password"]==$password){
            return true;
            }
            else {
                return false;

            }
        }

public function Dame_Usuarioxid($usuario){
    $sql="SELECT * FROM bg_Usuario as u WHERE u.idUsuario = '$usuario'";

   return $this->unrow($sql);
}        

  public function Dame_Cliente($idCliente){
    $sql="SELECT * FROM bg_Cliente as u WHERE u.idCliente = '$idCliente'";

   return $this->unrow($sql);
}  

public function Dame_Usuario($usuario){
    $sql="SELECT u.*, c.Deuda FROM bg_Usuario as u LEFT JOIN bg_Cliente c ON u.idCliente=c.idCliente WHERE u.Usuario = '$usuario'";

   return $this->unrow($sql);
}



public function Dame_UsuarioXEmail($email){
    $sql="SELECT u.*, p.idPais FROM bg_Usuario as u LEFT JOIN bg_Persona p ON u.DNI=p.DNI WHERE u.Email = '$email'";

   return $this->unrow($sql);
}

public function Dame_Entradas($iduser){
    $sql="
select ld.idListaDetalle as id , f.Fecha,f.Fiesta as Nombre, c.Club as Sitio, tl.TipoLista as Zona, 1 as Tipo FROM bg_ListaDetalle ld LEFT JOIN bg_Lista l ON ld.idLista=l.idLista LEFT JOIN bg_Fiesta f ON l.idFiesta=f.idFiesta LEFT JOIN bg_Club c ON f.idClub=c.idClub LEFT JOIN bg_TipoLista tl ON l.idTipoLista=tl.idTipoLista WHERE ld.idUsuario = '$iduser' UNION SELECT he.idHistoriaEvento as id, e.fechaInicio as Fecha, e.Evento as Nombre , c.Cliente as Sitio ,ez.EventoZona as Zona, 2 as Tipo FROM bg_HistoriaEvento he LEFT JOIN bg_Evento e ON he.idEvento= e.idEvento LEFT JOIN bg_EventoEntrada ee ON he.idEventoEntrada=ee.idEventoEntrada LEFT JOIN bg_EventoZona ez ON ee.idEntradaZona=ez.idEventoZona LEFT JOIN bg_Cliente c ON e.idCliente = c.idCliente WHERE he.idUsuario='$iduser' AND he.idEstadoEvento in (2,4) ";

   return $this->exec($sql);
}

public function Dame_PersonaXDNI($dni){
    $sql="SELECT u.*, pp.Pais, s.Sexo, pr.Provincia, cd.Ciudad, dt.Distrito  FROM bg_Persona as u LEFT JOIN bg_Pais pp ON u.idPais=pp.idPais LEFT JOIN bg_Sexo s ON u.idSexo=s.idSexo LEFT JOIN bg_Provincia pr ON u.idProvincia=pr.idProvincia LEFT JOIN bg_Ciudad cd ON u.idCiudad=cd.idCiudad LEFT JOIN bg_Distrito dt ON u.idDistrito=dt.idDistrito WHERE u.DNI = '$dni'";

   return $this->unrow($sql);
}

public function ActualizaPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
    $sql="UPDATE bg_Persona SET FechaNacimiento='$fechaNac', Telefono='$telefono', idSexo='$idSexo', idPais='$idPais' WHERE DNI = '$dni'";

   return $this->exec($sql);
}

public function IngresarPersona($dni,$telefono,$idSexo,$idPais,$fechaNac){
    $fecha=date('Y-m-d H:i:s');
    $sql="INSERT INTO bg_Persona (DNI,Telefono,Fecha,FechaNacimiento,idPais,idSexo) VALUES('$dni','$telefono','$fecha','$fechaNac','$idPais','$idSexo')";

   return $this->exec($sql);
}



public function InsertarUsuarioClub($idusuario,$idclub,$idcliente){
$sql="INSERT INTO bg_UsuarioClub (idUsuario , idClub,  idCliente) VALUES ('$idusuario', '$idclub' ,'$idcliente')";
return $this->exec($sql);
}

public function ActualizaIngresoEventoPago($id,$fecha){
    $sql="UPDATE bg_HistoriaEvento SET fechaIngreso='$fecha' WHERE idHistoriaEvento = '$id'";

   return $this->exec($sql);
}

public function ActualizaFotoPerfil($ruta,$dni){
    $sql="UPDATE bg_Persona SET Foto='$ruta' WHERE DNI = '$dni'";

   return $this->exec($sql);
}

public function ActualizaFotoDNI($ruta,$dni){
    $sql="UPDATE bg_Persona SET fotoDNI='$ruta' WHERE DNI = '$dni'";

   return $this->exec($sql);
}

public function set_AsistenciaCliente($Idfiesta,$Idpersona){

        $fecha= date('Y-m-d H:i:s');
    
        $sql="UPDATE  bg_ClienteAsistencia SET FechaIngreso='$fecha' WHERE idFiesta ='$Idfiesta' AND idPersona='$Idpersona'";
        return $this->exec($sql);

}

public function ActualizaIngresoEventoLista($id,$fecha){
    $sql="UPDATE bg_HistoriaEventoLista SET fechaIngreso='$fecha' WHERE idHistoriaEventoLista = '$id'";

   return $this->exec($sql);
}

public function DameTemporadaActivaxClub($idClub){
	$sql="SELECT t.* FROM bg_Temporada t   WHERE t.idClub='$idClub' AND t.Activa=1 ";
	return $this->unrow($sql);
	}

public function dameFiesta($idFiesta){
    $sql="SELECT f.*  FROM bg_Fiesta f  WHERE f.idFiesta = '$idFiesta'   ";

   return $this->unrow($sql);
}

public function EsCliente($dni,$idclub,$idtemporada){
    $sql="SELECT ca.* , p.Nombre, p.ApPaterno, p.ApMaterno FROM bg_HistoriaSocio ca LEFT JOIN bg_Persona p ON ca.idPersona=p.idPersona  WHERE p.DNI = '$dni' AND ca.idClub='$idclub' AND ca.idTemporada='$idtemporada' AND ca.idEstadoCarnet in (3,4) ";

   return $this->unrow($sql);
}


public function DameFiestaPersona($dni,$idfiesta){
    $sql="SELECT ca.*  FROM bg_ClienteAsistencia ca LEFT JOIN bg_Persona p ON ca.idPersona=p.idPersona WHERE p.DNI = '$dni' AND ca.idFiesta='$idfiesta' ";

   return $this->unrow($sql);
}


public function DameEventoUsuario($dni,$idevento){
    $sql="SELECT he.idHistoriaEvento, p.Nombre,p.ApPaterno,p.DNI,he.fechaIngreso FROM bg_HistoriaEvento he LEFT JOIN bg_Persona p ON he.idPersona=p.idPersona WHERE p.DNI = '$dni' AND he.idEvento='$idevento' AND he.idEstadoEvento=2 AND he.idEventoEntrada!=0  ";

   return $this->unrow($sql);
}

public function DameEventoLista($dni,$idevento){
    $sql="SELECT he.idHistoriaEventoLista, he.Nombre,he.fechaIngreso FROM bg_HistoriaEventoLista he  WHERE CONCAT('F',he.idEvento,'H',he.idHistoriaEventoLista) = '$dni' AND he.idEvento='$idevento'   ";

   return $this->unrow($sql);
}

public function Dame_UsuarioEmail($usuario){
    $sql="SELECT * FROM bg_Usuario as u WHERE u.Email = '$usuario'";

   return $this->unrow($sql);
}
public function Cuenta_Usuario($usuario){
    $sql="SELECT COUNT(*) FROM bg_Usuario as u WHERE u.Usuario LIKE '$usuario%'";

   return $this->solo($sql);
}

 public function set_pictureU($picture,$idusuario)
        {
       $sql="UPDATE bg_Usuario  SET picture='$picture'  WHERE idUsuario = '$idusuario'";
        
        return $this->exec($sql);
        }

public function LogIngreso($idlogin,$diahora,$ip){
$sql="INSERT INTO bg_LogIP (idUsuario , Fecha, IP) VALUES ('$idlogin', '$diahora','$ip')";
return $this->exec($sql);
}
        
        public function encontrados(){

	
	$sql="SELECT FOUND_ROWS() as numeros ";

	

	return $this->solo($sql);

	}
        
        public function cantidad_Usuario($idcliente){

	$sql="SELECT COUNT(*) as numeros FROM bg_Usuario WHERE idCliente='$idcliente' ";

	return $this->solo($sql);

	}
                        
	}

?>