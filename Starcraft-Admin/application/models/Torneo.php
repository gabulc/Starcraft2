<?php

class Torneo extends CI_Model{
    private $_id;
    private $_nombre;
    private $_fechaInicio;
    private $_fechaFin;
    //const numeroEquipos= 16;
    private $_estado;
    private $_lugar;
    private $_premioPrimero;
    private $_premioSegundo;
    private $_premioTercero;
    private $_adm_username;
    
    
    public function __construct($id="", $adm_username="", $nombre="", $fechaInicio="", $fechaFin="", $estado="", $lugar="", 
            $premioPrimero="", $premioSegundo="", $premioTercero="") {
        parent::__construct();
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_fechaInicio = $fechaInicio;
        $this->_fechaFin = $fechaFin;
        $this->_estado = $estado;
        $this->_lugar = $lugar;
        $this->_premioPrimero = $premioPrimero;
        $this->_premioSegundo = $premioSegundo;
        $this->_premioTercero = $premioTercero;
        $this->_adm_username = $adm_username;
    }
    
    public function getId(){return $this->_id;}
    public function getNombre(){return $this->_nombre;}
    public function getFechaInicio(){return $this->_fechaInicio;}
    public function getFechaFin(){return $this->_fechaFin;}
    //public function getNumeroEquipos(){return $this->_numeroEquipos;}
    public function getEstado(){return $this->_estado;}
    public function getLugar(){return $this->_lugar;}
    public function getPremioPrimero(){return $this->_premioPrimero;}
    public function getPremioSegundo(){return $this->_premioSegundo;}
    public function getPremioTercero(){return $this->_premioTercero;}
    public function getAdm_username(){return $this->_adm_username;}
    
    public function crearTorneo(Torneo $torneo){
        $data=array(
            'id'=>$torneo->getId(),
            'adm_username'=>$torneo->getAdm_username(),
            'nombre'=>$torneo->getNombre(),
            'fechaInicio'=>$torneo->getFechaInicio(),
            'fechaFin'=>$torneo->getFechaFin(),
            'estado'=>$torneo->getEstado(),
            'lugar'=>$torneo->getLugar(),
            'primerPremio'=>$torneo->getPremioPrimero(),
            'segundoPremio'=>$torneo->getPremioSegundo(),
            'tercerPremio'=>$torneo->getPremioTercero()
        );
        
        if($this->db->_error_number()==1062){
             $msj='Duplicado';
        }
                $this->db->insert('torneos',$data);
    }
    public function verTorneos(){
        $query = $this->db->get("torneos");
        $lista = $query->result();
        $listaTorneos = array();
        foreach($lista as $torneo){
            $id= $torneo->id;
            $adm_username=$torneo->adm_username;
            $nombre = $torneo->nombre;
            $fechaInicio = $torneo->fechaInicio;
            $fechaFin = $torneo->fechaFin;
            $estado = $torneo->estado;
            $lugar = $torneo->lugar;
            $premioPrimero=$torneo->primerPremio;
            $premioSegundo=$torneo->segundoPremio;
            $premioTercero=$torneo->tercerPremio;
            $listaTorneos[] = new Torneo($id, $adm_username, $nombre, $fechaInicio, $fechaFin, $estado, $lugar, $premioPrimero, $premioSegundo, $premioTercero);
        }
        return $listaTorneos;
    }
    public function modificarTorneo(Torneo $torneo){
        $data=array(
            'adm_username'=>$torneo->getAdm_username(),
            'nombre'=>$torneo->getNombre(),
            'fechaInicio'=>$torneo->getFechaInicio(),
            'fechaFin'=>$torneo->getFechaFin(),
            'estado'=>$torneo->getEstado(),
            'lugar'=>$torneo->getLugar(),
            'primerPremio'=>$torneo->getPremioPrimero(),
            'segundoPremio'=>$torneo->getPremioSegundo(),
            'tercerPremio'=>$torneo->getPremioTercero()
        );
        $this->db->where('id',$torneo->getId());
        $this->db->update('torneos',$data);
    }
    public function eliminarTorneo($id){
        $this->db->where('id',$id);
        $this->db->delete("torneos");
    }
    public function getTorneoById($id){
        $torneos = $this->verTorneos();
        foreach($torneos as $t){
            if($t->getId() == $id)
                return $t;
        }
        return false;
    }
    public function getTorneosLlenos(){
        $listaTorneos = $this->verTorneos();
        $listaTorneosLlenos=array();
        foreach($listaTorneos as $torneo){
            if($torneo->getEstado()=='Activo'){
                $query = $this->db->query('SELECT * FROM torneoequipos WHERE torneo_id = ?',$torneo->getId());
                if($query->num_rows()==16){
                    $listaTorneosLlenos[]=$torneo;
                }
            }
        }
        return $listaTorneosLlenos;
    }
    
    public function getTorneosLlenosParaEmpezar(){
        $listaTorneos = $this->verTorneos();
        $listaTorneosLlenos=array();
        foreach($listaTorneos as $torneo){
            if($torneo->getEstado()=='En espera'){
                $query = $this->db->query('SELECT * FROM torneoequipos WHERE torneo_id = ?',$torneo->getId());
                if($query->num_rows()==16){
                    $listaTorneosLlenos[]=$torneo;
                }
            }
        }
        return $listaTorneosLlenos;
    }
    
    public function empezarTorneo($id){
        //Cambiar el torneo a estado activo
        $data=array(
            'estado'=>'Activo'
        );
        $this->db->where('id',$id);
        $this->db->update('torneos',$data);
        
        
        //Crear los grupos, seleccionando los 16 equipos en 4 grupos
        $this->load->model('Equipo','',true);
        $listaEquipos16 = $this->Equipo->getEquiposInscritosByTorneoId($id);
        shuffle($listaEquipos16);
        for ($i = 0; $i < count($listaEquipos16); $i=$i+4) {
            $grupoA[] = $listaEquipos16[$i];
            $grupoB[] = $listaEquipos16[$i+1];
            $grupoC[] = $listaEquipos16[$i+2];
            $grupoD[] = $listaEquipos16[$i+3];
        }
        foreach ($grupoA as $equipo){
            $data=array(
                'grupo'=>'A',
                'faseActual'=>'Grupos'
                
            );
            $this->db->where('nombre',$equipo->getNombre());
            $this->db->update('equipos',$data);
        }
        foreach ($grupoB as $equipo){
            $data=array(
                'grupo'=>'B',
                'faseActual'=>'Grupos'
                
            );
            $this->db->where('nombre',$equipo->getNombre());
            $this->db->update('equipos',$data);
        }
        foreach ($grupoC as $equipo){
            $data=array(
                'grupo'=>'C',
                'faseActual'=>'Grupos'
                
            );
            $this->db->where('nombre',$equipo->getNombre());
            $this->db->update('equipos',$data);
        }
        foreach ($grupoD as $equipo){
            $data=array(
                'grupo'=>'D',
                'faseActual'=>'Grupos'
            );
            $this->db->where('nombre',$equipo->getNombre());
            $this->db->update('equipos',$data);
        }
        
    }
    
     
}
?>