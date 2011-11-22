<?php
require_once 'Equipo.php';
class Jugador extends CI_Model {
    private $_id;
    private $_equipo;
    private $_nombre;
    private $_apellido;
    private $_nick;
    private $_DNI;
    private $razaFavorita;
    private $_ranking;
    private $_descripcion;

    public function __construct($id="", $equipo="",$nombre="",$apellido="",$nick="",$DNI="",$razaFavorita="",$ranking="",$descripcion="") {
        parent::__construct();
        $this->_id=$id;
        $this->_equipo = $equipo;
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_nick = $nick;
        $this->_DNI = $DNI;
        $this->razaFavorita = $razaFavorita;
        $this->_descripcion = $descripcion;
        $this->_ranking = $ranking;
     }

     public function get_id() {
         return $this->_id;
     }

     public function get_equipo() {
         return $this->_equipo;
     }

     public function get_nombre() {
         return $this->_nombre;
     }

     public function get_apellido() {
         return $this->_apellido;
     }

     public function get_nick() {
         return $this->_nick;
     }

     public function get_DNI() {
         return $this->_DNI;
     }

     public function getRazaFavorita() {
         return $this->razaFavorita;
     }

     public function get_descripcion() {
         return $this->_descripcion;
     }

     public function get_ranking() {
         return $this->_ranking;
     }

     public function set_equipo($_equipo) {
         $this->_equipo = $_equipo;
     }

     

     public function insertJugadores(Jugador $jugador){
         $data=array(

        'id'=>'null',
        'equipo'=>$jugador->get_equipo()->get_nombre(),
        'nombre'=>$jugador->get_nombre(),
        'apellido'=>$jugador->get_apellido(),
        'nick'=>$jugador->get_nick(),
        'DNI'=>$jugador->get_DNI(),
        'razaFavorita'=>$jugador->getRazaFavorita(),
        'ranking'=>$jugador->get_ranking(),
        'descripcion'=>$jugador->get_descripcion()
        
        );
         $this->db->insert("jugadores",$data);
     }

     public function getJugadoresxEquipo(Equipo $equipo){
         
         $query= $this->db->where("equipo",$equipo->get_nombre());
         $query = $this->db->get("jugadores");
         $lista = $query->result();
         $listaJugadores = array();
         foreach($lista as $jugadore){
             $id=$jugadore->id;

             $nombre= $jugadore->nombre;
             $apellido = $jugadore->apellido;
             $nick = $jugadore->nick;
             $DNI = $jugadore->DNI;
             $raza = $jugadore->razaFavorita;
             $ranking = $jugadore->ranking;
             $descripcion = $jugadore->descripcion;
             $listaJugadores[] = new Jugador($id, $equipo, $nombre, $apellido, $nick, $DNI, $raza,$ranking, $descripcion);
         }
         return $listaJugadores;
     }

     public function updateJugadorXEquipo(Jugador $jugador,$nombreAntiguo){
         

         $data=array(
            'equipo'=>$jugador->get_equipo()->get_nombre()
        );
        $this->db->where("id",$jugador->get_id());
        $this->db->where("equipo",$nombreAntiguo);
        $this->db->update("jugadores",$data);
     }

     public function updateJugador(Jugador $jugador){
         $data=array(
        'nombre'=>$jugador->get_nombre(),
        'apellido'=>$jugador->get_apellido(),
        'nick'=>$jugador->get_nick(),
        'DNI'=>$jugador->get_DNI(),
        'razaFavorita'=>$jugador->getRazaFavorita(),
        'ranking'=>$jugador->get_ranking(),
        'descripcion'=>$jugador->get_descripcion()

        );
        $this->db->where("id",$jugador->get_id());
        $this->db->update("jugadores",$data);
     }
     
     
     function verJugadores(){
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

     public function getJugadorById($jugador){

         $query= $this->db->where("id",$jugador);
         $query = $this->db->get("jugadores");
         $lista = $query->result();
         $jugaf = null;
         foreach($lista as $jugadore){
             $id=$jugadore->id;
             $equipo = $jugadore->equipo;
             $nombre= $jugadore->nombre;
             $apellido = $jugadore->apellido;
             $nick = $jugadore->nick;
             $DNI = $jugadore->DNI;
             $raza = $jugadore->razaFavorita;
             $ranking = $jugadore->ranking;
             $descripcion = $jugadore->descripcion;
             $jugaF = new Jugador($id, new Equipo($nombre), $nombre, $apellido, $nick, $DNI, $raza, $ranking, $descripcion);
         }
         return $jugaF;
     }

     public function deleteJugador($id){
         $this->db->where("id",$id);
         $this->db->delete("jugadores");
     }
     
     
}
?>
