<?php

class Equipo extends CI_Model{
    private $_torneo_id;
    private $_nombre;
    private $_raza;
    private $_pagina;
    private $_grupo;
    private $_faseActual;
    private $_estado;
    private $_ganadas;
    private $_perdidas;
    public function __construct($nombre="",$raza="",$pagina="",$grupo="",$faseActual="", $estado="", $ganadas="", $perdidas="") {
        parent::__construct();
        $this->_nombre = $nombre;
        $this->_raza = $raza;
        $this->_pagina = $pagina;
        $this->_grupo = $grupo;
        $this->_faseActual = $faseActual;
        $this->_estado = $estado;
        $this->_ganadas = $ganadas;
        $this->_perdidas = $perdidas;
    }
  
    public function getTorneo_id(){return $this->_torneo_id;}
    public function getNombre(){return $this->_nombre;}
    public function getRaza(){return $this->_raza;}
    public function getPagina(){return $this->_pagina;}
    public function getGrupo(){return $this->_grupo;}
    public function getFaseActual(){return $this->_faseActual;}
    public function getEstado() {return $this->_estado;}
    public function getGanadas() {return $this->_ganadas;}
    public function getPerdidas() {return $this->_perdidas;}
    public function getEquipos(){
        $query = $this->db->get("equipos");
        $lista = $query->result();
        $listaEquipos = array();
        foreach($lista as $equipo){
            $nombre = $equipo->nombre;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $listaEquipos[] = new Equipo($nombre, $raza, $pagina, $grupo, $faseActual, $estado);
        }
        return $listaEquipos;
    }
    public function getEquiposInscritosByTorneoId($id){
        $query = $this->db->query("Select te.torneo_id, e.* from torneoequipos te, equipos e where e.nombre like te.equipo and te.torneo_id = $id ");
        $lista = $query->result();
        $listaEquipos = array();
        foreach($lista as $equipo){
            $nombre = $equipo->nombre;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            $listaEquipos[] = new Equipo($nombre, $raza, $pagina, $grupo, $faseActual, $estado);
        }
        return $listaEquipos;
    }
    public function getEquipoByNombre($nombre){
        $query = $this->db->query("Select * from equipos where nombre like ? ", $nombre);
        $lista = $query->result();
        $listaEquipos = array();
        foreach($lista as $equipo){
            $nombre = $equipo->nombre;
            $raza = $equipo->raza;
            $pagina = $equipo->pagina;
            $grupo = $equipo->grupo;
            $faseActual = $equipo->faseActual;
            $estado = $equipo->estado;
            $ganadas = $equipo->ganadas;
            $perdidas = $equipo->perdidas;
            return new Equipo($nombre, $raza, $pagina, $grupo, $faseActual, $estado, $ganadas, $perdidas);
        }
    }
    public function sumarUnoGanador($nombre){
        $equipo = $this->getEquipoByNombre($nombre);
        $data=array(
            'ganadas'=>$equipo->getGanadas() + 1
        );
        $this->db->where('nombre',$equipo->getNombre());
        $this->db->update('equipos',$data);
    }
    public function sumarUnoPerdedor($nombre){
        $equipo = $this->getEquipoByNombre($nombre);
        $data=array(
            'perdidas'=>$equipo->getPerdidas() + 1
        );
        $this->db->where('nombre',$equipo->getNombre());
        $this->db->update('equipos',$data);
    }
    public function equipoASemifinales(Equipo $equipo){
        $data=array(
            'faseActual'=>'Semifinal'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function equipoATercerLugar(Equipo $equipo){
        $data=array(
            'faseActual'=>'Tercer Lugar'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function equipoAFinal(Equipo $equipo){
        $data=array(
            'faseActual'=>'Final'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function equipo1erPuesto(Equipo $equipo){
        $data=array(
            'faseActual'=>'1er Puesto'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function equipo2doPuesto(Equipo $equipo){
        $data=array(
            'faseActual'=>'2do Puesto'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    public function equipo3erPuesto(Equipo $equipo){
        $data=array(
            'faseActual'=>'3er Puesto'
        );
        $this->db->where("nombre",$equipo->get_nombre());
        $this->db->update("equipos",$data);
    }
    
}

?>