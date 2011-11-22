<?php

class Torneo extends CI_Model{
    private $_id;
    private $_nombre;
    private $_fechaInicio;
    private $_fechaFin;
    
    private $_estado;
    private $_lugar;
    private $_premioPrimero;
    private $_premioSegundo;
    private $_premioTercero;
    private $_adm_username;
    private $_equipos=array();
	
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
    //function getNumeroEquipos(){return $this->_numeroEquipos;}
    public function getEstado(){return $this->_estado;}
    public function getLugar(){return $this->_lugar;}
    public function getPremioPrimero(){return $this->_premioPrimero;}
    public function getPremioSegundo(){return $this->_premioSegundo;}
    public function getPremioTercero(){return $this->_premioTercero;}
    public function getAdm_username(){return $this->_adm_username;}
    public function get_equipos() {
        return $this->_equipos;
    }

    public function set_equipos($_equipos) {
        $this->_equipos = $_equipos;
    }

    
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
        $this->db->insert('torneos',$data);
    }
    public function verTorneos(){
        $query = $this->db->where("estado","activo");
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
     public function verTorneosEnEspera(){
        $query = $this->db->where("estado","En espera");
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
    
    public function getTorneos(){

        $listaTorneos = $this->verTorneos();
        $listaTorneosLlenos=array();
        foreach($listaTorneos as $torneo){


            $query = $this->db->query('SELECT * FROM torneoequipos WHERE torneo_id =   ?',$torneo->getId());
            if($query->num_rows()<16){
                $listaTorneosLlenos[]=$torneo;
            }
        }
        return $listaTorneosLlenos;
    }

    public function getTorneoDiffer($listaEquipoTorneo){
        foreach($listaEquipoTorneo as $torneoEquipo){
            $query = $this->db->or_where("id !=",$torneoEquipo->get_torneoId());
        }
         $query = $this->db->where("estado","En espera");
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
    public function getListaTorneo($listaEquipoTorneo){
        foreach($listaEquipoTorneo as $torneoEquipo){
            $query = $this->db->or_where("id",$torneoEquipo->get_torneoId());
        }
        $query = $this->db->where("estado","En Espera");
         
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
    
    
   public  function daysDifference($endDate, $beginDate)
    {

   
   $date_parts1=explode("-", $beginDate);
   $date_parts2=explode("-", $endDate);
   //gregoriantojd() Converts a Gregorian date to Julian Day Count
   $start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
   $end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
   return $end_date - $start_date;
    }

    public function getTorneosDesmatricula($listaTorneos){
         $listaFinal=array();
         date_default_timezone_set('America/Lima');
         $fecha =  Date("Y-m-d");
         foreach($listaTorneos as $torneo){
             
             
             if( $this->daysDifference($torneo->getFechaInicio(), $fecha) >= 10){

                 $listaFinal[]=$torneo;
             }

        }
        return $listaFinal;
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
    
}
?>
