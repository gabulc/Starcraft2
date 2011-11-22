<?php
require_once 'User.php';
class Equipo extends CI_Model{
    
    private $_nombre;
    private $_user;
    private $_raza;
    private $_pagina;
    private $_grupo;
    private $_faseActual;
    private $_estado;
    private $_ganadas;
    private $_perdidas;
    private $_jugadores=array();
    private $_torneos = array();
    
    public function __construct($nombre="",User $user=null,$raza="",$pagina="",$grupo="",$faseActual="", $estado="",$ganadas="", $perdidas="") {
        parent::__construct();
        $this->_nombre = $nombre;
        $this->_user = $user;
        $this->_raza = $raza;
        $this->_pagina = $pagina;
        $this->_grupo = $grupo;
        $this->_faseActual = $faseActual;
        $this->_estado = $estado;
        $this->_ganadas=$ganadas;
        $this->_perdidas = $perdidas;
    }
  
    public function get_nombre() {return $this->_nombre;}
    public function get_user() {return $this->_user;}
    public function get_raza() {return $this->_raza;}
    public function get_pagina() {return $this->_pagina;}
    public function get_grupo() {return $this->_grupo;}
    public function get_faseActual() {return $this->_faseActual;}
    public function get_ganadas() {return $this->_ganadas;}
    public function get_perdidas() {return $this->_perdidas;}
    public function get_estado() {return $this->_estado;}
    public function get_jugadores() {return $this->_jugadores;}
    public function get_torneos() {return $this->_torneos;}
    public function set_nombre($_nombre) {$this->_nombre = $_nombre;}
    public function set_raza($_raza) {$this->_raza = $_raza;}
    public function set_pagina($_pagina) {$this->_pagina = $_pagina;}
    public function set_jugadores($_jugadores) {$this->_jugadores = $_jugadores;}
    
    function getEquipos(){
        $query = $this->db->where("estado",'1');
        $query = $this->db->get("equipos");
        $lista = $query->result();
        $listaEquipos = array();
        foreach($lista as $equipo){
            $nombre = $equipo->nombre;
            $user = $equipo->user;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $listaEquipos[] = new Equipo($nombre, new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
        }
        return $listaEquipos;
    }
    
    function getEquiposByTorneoId($id){
        $equipos = $this->getEquipos();
        $equiposTorneoId = array();
        foreach($equipos as $e){
            if($e->getTorneo()->getId() == $id)
                $equiposTorneoId[] = $e;
        }
        return $equiposTorneoId;
    }
    public function insertEquipo(Equipo $equipo){
        
        $data= array(

            'nombre'=>$equipo->get_nombre(),
            'user'=>$equipo->get_user()->get_user(),
            'raza'=>$equipo->get_raza(),
            'pagina'=>$equipo->get_pagina(),
            'grupo'=>'Ninguno',
            'faseActual'=>'Niguna',
            'estado'=>$equipo->get_estado(),
            'ganadas'=>$equipo->get_ganadas(),
            'perdidas'=>$equipo->get_perdidas()
       );
      $this->db->insert("equipos",$data);
       
    }

    public function getLastId(){
       $query = $this->db->select_max('id');
       $query = $this->db->get('equipos');
       $list = $query->result();
       foreach($list as $d){
           $id = $d->id;
       }
       return $id;
    }
    function getEquiposxName($nombre){
        $query = $this->db->where("nombre",$nombre);
        $query = $this->db->get("equipos");
        $lista = $query->result();
        $equipos=null;
        foreach($lista as $equipo){
            
            $user = $equipo->user;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $equipos = new Equipo($nombre,new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
        }
        return $equipos;
    }


   public function getEquipo($equipo_nombre,$usario){
       $query = $this->db->like("equipo",$equipo_nombre);
       $query = $this->db->get("equipos");
       $lista = $query->result();
       $equipoFinal = null;
       foreach($lista as $equipo){
           $nombre = $equipo->nombre;
           $user = $equipo->user;
           $raza = $equipo->raza;
           $pagina = $equipo->pagina;
           $grupo = $equipo->grupo;
           $faseActual = $equipo->faseActual;
           $estado = $equipo->estado;
           $ganadas = $equipo->ganadas;
           $perdidas = $equipo->perdidas;

           $equipoFinal = new Equipo($nombre, new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
       }

       return $equipoFinal;


   }


    public function getEquipoxUser($user){
       $query = $this->db->where("user",$user);
       $query = $this->db->get("equipos");
       $lista = $query->result();
       $equipoFinal = null;
       foreach($lista as $equipo){
           $nombre = $equipo->nombre;
           $user = $equipo->user;
           $raza = $equipo->raza;
           $pagina = $equipo->pagina;
           $grupo = $equipo->grupo;
           $faseActual = $equipo->faseActual;
           $estado = $equipo->estado;
           $ganadas = $equipo->ganadas;
           $perdidas = $equipo->perdidas;

           $equipoFinal = new Equipo($nombre, new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
       }

       return $equipoFinal;

    }

    public function verificarId($equipo){
        $query=$this->db->where("nombre",$equipo);
        $query = $this->db->get("equipos");
        $lista = $query->result();
        $bool=true;
        if($lista==null){
            $bool=false;
        }
        return $bool;
    }


    public function updateEquipo(Equipo $equipo){
        $data=array(
            'raza'=>$equipo->get_raza(),
            'pagina'=>$equipo->get_pagina()
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function deleteCompleteEquipo($equipo){
        $this->db->where("nombre",$equipo);
        $this->db->delete("equipos");
    }
    public function getEquiposInscritosByTorneoId($id){
        $query = $this->db->query("Select te.torneo_id, e.* from torneoequipos te, equipos e where e.nombre like te.equipo and te.torneo_id = $id ");
        $lista = $query->result();
        $listaEquipos = array();
        foreach($lista as $equipo){
            $nombre = $equipo->nombre;
            $user = $equipo->user;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $listaEquipos[] = new Equipo($nombre, new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
        }
        return $listaEquipos;
    }
    public function getGrupoOrdenado($grupoX){
        $query = $this->db->query("SELECT * FROM equipos WHERE grupo like ? ORDER BY ganadas DESC ",$grupoX);
        $grupo = $query->result();
        foreach($grupo as $equipo){
            $nombre = $equipo->nombre;
            $user = $equipo->user;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $grupoOrdenado[] = new Equipo($nombre, new User($user), $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
        }
        return $grupoOrdenado;
    }
    
    public function equipoACuartos(Equipo $equipo){
        $data=array(
            'faseActual'=>'Cuartos de Final'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
}

?>
