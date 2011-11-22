<?php

class TorneoEquipo extends CI_Model {

    private $_torneoId;
    private $_equipo;

    public function __construct($torneoId="",$equipo="") {
        $this->_torneoId = $torneoId;
        $this->_equipo = $equipo;
    }

   public function get_torneoId() {
        return $this->_torneoId;
    }

    public function get_equipo() {
        return $this->_equipo;
    }

    public function set_equipo($_equipo) {
        $this->_equipo = $_equipo;
    }


    public function getTorneoEquipoByEquipo($equipo){
        
        $query = $this->db->where("equipo",$equipo);
        $query = $this->db->get("torneoequipos");
        $lista = $query->result();
        $listaEquipoTorneo=array();
        foreach($lista as $torneoEquipos){
            $torneoId = $torneoEquipos->torneo_id;
            $equipo = $torneoEquipos->equipo;
            $listaEquipoTorneo[]= new TorneoEquipo($torneoId, $equipo);
        }
        return $listaEquipoTorneo;
    }

    public function getTorneoEquipoByTorneo($torneo_id){
        $query = $this->db->where("torneo_id",$torneo_id);
        $query = $this->db->get("torneoequipos");
        $lista = $query->result();
        $listaEquipoTorneo=array();
        foreach($lista as $torneoEquipos){
            $torneoId = $torneoEquipos->torneo_id;
            $equipo = $torneoEquipos->equipo;
            $listaEquipoTorneo[]= new TorneoEquipo($torneoId, $equipo);
        }
        return $listaEquipoTorneo;
    }

    public function countEquiposxTorneo($listaTorneo){
    $listaFinal= array();
    foreach($listaTorneo as $torneo){
        
        
        $query=$this->db->where("torneo_id",$torneo->getId());
        
        $query=$this->db->get("torneoequipos");
        
        $lista = $query->result();
        
        if(count($lista)!=16){
            $listaFinal[]=$torneo;
        }
        
    }

    return $listaFinal;

        
        
        
    }

    public function insertarEquipoTorneo(TorneoEquipo $torneoEquipo){
        $data=array(
        'torneo_id'=>$torneoEquipo->get_torneoId(),
        'equipo'=>$torneoEquipo->get_equipo()
        );
        $this->db->insert("torneoequipos",$data);
    }

    public function updateEquipoTorneo(TorneoEquipo $torneoEquipoNuevo,$equipoViejo){
       

        $data=array(
        'equipo'=>$torneoEquipoNuevo->get_equipo()
        );
        $this->db->where("torneo_id",$torneoEquipoNuevo->get_torneoId());
       $this->db->where("equipo",$equipoViejo);
        
       $query= $this->db->update("torneoequipos",$data);
       
    }

   public function eliminarTorneoEquipo($torneo,$equipo){
       $this->db->where("equipo",$equipo);
       $this->db->where("torneo_id",$torneo);
       $this->db->delete("torneoequipos");

   }


}
?>
