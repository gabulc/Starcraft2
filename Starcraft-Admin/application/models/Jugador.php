<?php

class Jugador extends CI_Model {
    private $_id;
    private $_equipo;
    private $_nombre;
    private $_apellido;
    private $_nick;
    private $_DNI;
    private $_razaFavorita;
    private $_ranking;
    private $_descripcion;

    public function get_id() { return $this->_id;}
    public function get_equipo() {return $this->_equipo;}
    public function get_nombre() {return $this->_nombre;}
    public function get_apellido() {return $this->_apellido;}
    public function get_nick() { return $this->_nick;}
    public function get_DNI() {return $this->_DNI;}
    public function get_razaFavorita() {return $this->_razaFavorita;}
    public function get_ranking() {return $this->_ranking;}
    public function get_descripcion() {return $this->_descripcion;}

        public function __construct($id="",$equipo="",$nombre="",$apellido="",$nick="",$DNI="",$razaFavorita="",$ranking="", $desc="") {
        parent::__construct();
        $this->_id=$id;
        $this->_equipo = $equipo;
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_nick = $nick;
        $this->_DNI = $DNI;
        $this->_razaFavorita = $razaFavorita;
        $this->_ranking= $ranking ;
        $this->_descripcion = $desc;
     }

    public function verJugadores(){
        $query = $this->db->get("jugadores");
        $lista = $query->result();
        $listaJug = array();
        foreach($lista as $jug){
            $id= $jug->id;
            $equipo=$jug->equipo;
            $nombre = $jug->nombre;
            $apellido = $jug->apellido;
            $nick = $jug->nick;
            $DNI= $jug->DNI;
            $razaFavorita = $jug->razaFavorita;
            $ranking=$jug->ranking;
            $desc=$jug->descripcion;
            
            $listaJug[] = new Jugador($id, $equipo, $nombre, $apellido, $nick, $DNI, $razaFavorita, $ranking, $desc);
        }
        return $listaJug;
    }
    
    public function getNickById($id){
       
        $jugadores = $this->verJugadores();
        foreach($jugadores as $j){
            if($j->get_id() == $id)
                return $j->get_nick();
        }
        return false;
    
    }
    public function getNombreById($id){
         $jugadores = $this->verJugadores();
        foreach($jugadores as $j){
            if($j->get_id() == $id)
                return $j->get_nombre();
        }
        return false;
    }
    public function getApellidoById($id){
        $jugadores = $this->verJugadores();
        foreach($jugadores as $j){
            if($j->getId() == $id)
                return $j->get_apellido ();
        }
        return false;
    }

}
?>
