<?php 
session_start();
require("Db.class.php");
class General {

	private $db;

	public $variables;

	public function __construct($data = array()) {
		$this->db =  new DB();	
		$this->variables  = $data;
	}

	public function __set($name,$value){
		if(strtolower($name) === $this->pk) {
			$this->variables[$this->pk] = $value;
		}
		else {
			$this->variables[$name] = $value;
		}
	}

	public function __get($name)
	{	
		if(is_array($this->variables)) {
			if(array_key_exists($name,$this->variables)) {
				return $this->variables[$name];
			}
		}

		return null;
	}


	
        public function DameTabla($tabla){
	return $this->db->query("SELECT * FROM " . $tabla );
	}
        
         public function Paginas(){
	return $this->db->query("SELECT * FROM bg_Pagina");
	}
         public function Categorias(){
	return $this->db->query("SELECT * FROM bg_Categoria" );
	}
        
        public function DameFila($tabla,$nombrekey,$valorkey){
	return $this->db->single("SELECT * FROM " . $tabla . "WHERE ".$nombrekey."='".$valorkey."' ");
	}
        
        public function dame_CartillaB($dni,$idpartida){
        $sql="SELECT c.* FROM bg_Cartilla c LEFT JOIN bg_Player p ON c.idPlayer=p.idPlayer WHERE c.idPartida='$idpartida' AND p.dni='$dni' AND c.Fila='B' ";
        return $this->db->query($sql);
        }
        public function dame_CartillaI($dni,$idpartida){
        $sql="SELECT c.* FROM bg_Cartilla c LEFT JOIN bg_Player p ON c.idPlayer=p.idPlayer WHERE c.idPartida='$idpartida' AND p.dni='$dni' AND c.Fila='I' ";
        return $this->db->query($sql);
        }
        public function dame_CartillaN($dni,$idpartida){
        $sql="SELECT c.* FROM bg_Cartilla c LEFT JOIN bg_Player p ON c.idPlayer=p.idPlayer WHERE c.idPartida='$idpartida' AND p.dni='$dni' AND c.Fila='N' ";
        return $this->db->query($sql);
        }
        public function dame_CartillaG($dni,$idpartida){
        $sql="SELECT c.* FROM bg_Cartilla c LEFT JOIN bg_Player p ON c.idPlayer=p.idPlayer WHERE c.idPartida='$idpartida' AND p.dni='$dni' AND c.Fila='G' ";
        return $this->db->query($sql);
        } 
        public function dame_CartillaO($dni,$idpartida){
        $sql="SELECT c.* FROM bg_Cartilla c LEFT JOIN bg_Player p ON c.idPlayer=p.idPlayer WHERE c.idPartida='$idpartida' AND p.dni='$dni' AND c.Fila='O' ";
        return $this->db->query($sql);
        }
        public function dame_Partidas(){
        $sql="SELECT * FROM bg_Partida ORDER BY created_at DESC ";
        return $this->db->query($sql);
        }
        public function DameUsuario($id){
        $sql="SELECT u.* FROM bg_Usuario u  WHERE u.idUsuario='$id' ";
        return $this->db->row($sql);
        }
        public function dame_eventos(){
         $sql = "SELECT * FROM bg_Evento ORDER BY idEvento DESC LIMIT 3";
           return $this->db->query($sql);
        }
        public function dame_noticias(){
         $sql = "SELECT * FROM bg_Noticia ORDER BY Fecha DESC LIMIT 3";
           return $this->db->query($sql);   
        }

        public function dame_enlaces(){
        $sql = "SELECT * FROM bg_Enlace";
          return $this->db->query($sql);
        }

public function dame_banners(){



   $sql = "SELECT * FROM bg_Banner WHERE Activo=1 ORDER BY Orden";

           return $this->db->query($sql);

}


public function dame_tipocargos(){



   $sql = "SELECT * FROM bg_TipoCargo";

           return $this->db->query($sql);

}

public function dame_puesto($idtipocargo){



   $sql = "SELECT * FROM bg_Puesto WHERE idTipoCargo='$idtipocargo'";

           return $this->db->query($sql);

}

public function dame_profesor($idpuest){

  

   $sql = "SELECT pf.* FROM bg_Puesto p LEFT JOIN bg_Profesor pf ON p.idProfesor= pf.idProfesor WHERE p.idPuesto='$idpuest'";

           return $this->db->row($sql);

}
public function dame_Pagina($idPagina){


   $sql = "SELECT * FROM bg_Pagina WHERE idPagina='$idPagina'";

     return $this->db->row($sql);

}
public function dame_Noticia($idNoticia){


   $sql = "SELECT * FROM bg_Noticia WHERE idNoticia='$idNoticia'";

     return $this->db->row($sql);

}

public function dame_Evento($idEvento){

 

   $sql = "SELECT * FROM bg_Evento WHERE idEvento='$idEvento'";

     return $this->db->row($sql);

}

public function dame_PaginaFotos($idPagina){

 

   $sql = "SELECT * FROM bg_PaginaImagen WHERE idPagina='$idPagina'";

     return $this->db->query($sql);

}
public function dame_EventoFotos($idEvento){



   $sql = "SELECT * FROM bg_EventoImagen WHERE idEvento='$idEvento'";

      return $this->db->query($sql);

}

public function dame_NoticiaFotos($idNoticia){

   

   $sql = "SELECT * FROM bg_NoticiaImagen WHERE idNoticia='$idNoticia'";

    return $this->db->query($sql);

}
public function dame_Configuracion($variable){



   $sql = "SELECT valor FROM bg_Configuracion WHERE variable='$variable'";

    return $this->db->single($sql);

}
        
        
        
	protected function exec($sql, $array = null) {
		
		if($array !== null) {
			// Get result with the DB object
			$result =  $this->db->query($sql, $array);	
		}
		else {
			// Get result with the DB object
			$result =  $this->db->query($sql, $this->variables);	
		}
		
		// Empty bindings
		$this->variables = array();

		return $result;
	}
        
        protected function solo($sql) {
	$result =  $this->db->single($sql);	
	return $result;
	}

}
?>
