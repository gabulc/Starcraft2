<?php
require_once 'includes/config.inc.php';
require_once 'includes/mysql.class.php';

class Partida extends CI_Model{
    private $_id;
    private $_torneo;
    private $_equipo1;
    private $_equipo2;
    private $_equipoGanador;
    private $_equipoPerdedor;
    private $_jugador1;
    private $_jugador2;
    private $_tiempo;
    private $_fechaHoraInicio;
    private $_fase;
    private $_raza1;
    private $_unidades1;
    private $_recursos1;
    private $_minerales1;
    private $_total1;
    private $_raza2;
    private $_unidades2;
    private $_recursos2;
    private $_minerales2;
    private $_total2;
    private $_replay;
    public function __construct($id="", $torneo="", $equipo1="", $equipo2="", $equipoGanador="", $equipoPerdedor="", $jugador1="", $jugador2="", $tiempo="",
            $fechaHoraInicio="", $fase="", $raza1="", $unidades1="", $minerales1="", $recursos1="", $total1="", $raza2="", $unidades2="", $recursos2="", $minerales2="",$total2="", $replay="") {
        parent::__construct();
        $this->_id=$id;
        $this->_torneo=$torneo;
        $this->_equipo1=$equipo1;
        $this->_equipo2=$equipo2;
        $this->_equipoGanador=$equipoGanador;
        $this->_equipoPerdedor=$equipoPerdedor;
        $this->_fase=$fase;
        $this->_fechaHoraInicio=$fechaHoraInicio;
        $this->_tiempo=$tiempo;
        $this->_jugador1=$jugador1;
        $this->_jugador2=$jugador2;
        $this->_raza1=$raza1;
        $this->_unidades1=$unidades1;
        $this->_recursos1=$recursos1;
        $this->_minerales1=$minerales1;
        $this->_total1=$total1;
        $this->_raza2=$raza2;
        $this->_unidades2=$unidades2;
        $this->_recursos2=$recursos2;
        $this->_minerales2=$minerales2;
        $this->_total2=$total2;
        $this->_replay=$replay;
    }
    public function get_id() {return $this->_id;}
    public function get_torneo() {return $this->_torneo;}
    public function get_equipo1() {return $this->_equipo1;}
    public function get_equipo2() {return $this->_equipo2;}
    public function get_equipoGanador() {return $this->_equipoGanador;}
    public function get_equipoPerdedor() {return $this->_equipoPerdedor;}
    public function get_jugador1() {return $this->_jugador1;}
    public function get_jugador2() {return $this->_jugador2;}
    public function get_tiempo() {return $this->_tiempo;}
    public function get_fechaHoraInicio() {return $this->_fechaHoraInicio;}
    public function get_fase() {return $this->_fase;}
    public function get_raza1() {return $this->_raza1;}
    public function get_unidades1() {return $this->_unidades1;}
    public function get_recursos1() {return $this->_recursos1;}
    public function get_minerales1() {return $this->_minerales1;}
    public function get_total1() {return $this->_total1;}
    public function get_raza2() {return $this->_raza2;}
    public function get_unidades2() {return $this->_unidades2;}
    public function get_recursos2() {return $this->_recursos2;}
    public function get_minerales2() {return $this->_minerales2;}
    public function get_total2() {return $this->_total2;}
    public function get_replay() {return $this->_replay;}

    public function verPartidas(){
        $query = $this->db->get("partidas");
        $lista = $query->result();
        $listaPartidas = array();
        foreach($lista as $partida){
            $id= $partida->id;
            $torneo=$partida->torneo;
            $equipo1=$partida->equipo1;
            $equipo2=$partida->equipo2;
            $equipoGanador=$partida->equipoGanador;
            $equipoPerdedor=$partida->equipoPerdedor;
            $jugador1=$partida->jugador1;
            $jugador2=$partida->jugador2;
            $tiempo=$partida->tiempo;
            $fechaHoraInicio=$partida->fechaHoraInicio;
            $fase=$partida->fase;
            $raza1=$partida->raza1;
            $unidades1=$partida->unidades1;
            $recursos1=$partida->recursos1;
            $minerales1=$partida->minerales1;
            $total1=$partida->total1;
            $raza2=$partida->raza2;
            $unidades2=$partida->unidades2;
            $recursos2=$partida->recursos2;
            $minerales2=$partida->minerales2;
            $total2=$partida->total2;
            $replay=$partida->replay;
            $listaPartidas[]= new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
            }
        return $listaPartidas;
    }
    
    public function crearPartida(Partida $partida){
        $data=array(
            'id'=>$partida->get_id(),
            'torneo'=>$partida->get_torneo(),
            'equipo1'=>$partida->get_equipo1(),
            'equipo2'=>$partida->get_equipo2(),
            'equipoGanador'=>$partida->get_equipoGanador(),
            'equipoPerdedor'=>$partida->get_equipoPerdedor(),
            'jugador1'=>$partida->get_jugador1(),
            'jugador2'=>$partida->get_jugador2(),
            'tiempo'=>$partida->get_tiempo(),
            'fechaHoraInicio'=>$partida->get_fechaHoraInicio(),
            'fase'=>$partida->get_fase(),
            'raza1'=>$partida->get_raza1(),
            'unidades1'=>$partida->get_unidades1(),
            'recursos1'=>$partida->get_recursos1(),
            'minerales1'=>$partida->get_minerales1(),
            'total1'=>$partida->get_total1(),
            'raza2'=>$partida->get_raza2(),
            'unidades2'=>$partida->get_unidades2(),
            'recursos2'=>$partida->get_recursos2(),
            'minerales2'=>$partida->get_minerales2(),
            'total2'=>$partida->get_total2(),
            'replay'=>$partida->get_replay()
        );
        $this->db->insert('partidas',$data);
    }
    
    public function modificarPartida(Partida $partida){
        $data=array(
            
            'torneo'=>$partida->get_torneo(),
            'equipo1'=>$partida->get_equipo1(),
            'equipo2'=>$partida->get_equipo2(),
            'equipoGanador'=>$partida->get_equipoGanador(),
            'equipoPerdedor'=>$partida->get_equipoPerdedor(),
            'jugador1'=>$partida->get_jugador1(),
            'jugador2'=>$partida->get_jugador2(),
            'tiempo'=>$partida->get_tiempo(),
            'fechaHoraInicio'=>$partida->get_fechaHoraInicio(),
            'fase'=>$partida->get_fase(),
            'raza1'=>$partida->get_raza1(),
            'unidades1'=>$partida->get_unidades1(),
            'recursos1'=>$partida->get_recursos1(),
            'minerales1'=>$partida->get_minerales1(),
            'total1'=>$partida->get_total1(),
            'raza2'=>$partida->get_raza2(),
            'unidades2'=>$partida->get_unidades2(),
            'recursos2'=>$partida->get_recursos2(),
            'minerales2'=>$partida->get_minerales2(),
            'total2'=>$partida->get_total2(),
            'replay'=>$partida->get_replay()
        );
        $this->db->where('id',$partida->get_id());
        $this->db->update('partidas',$data);
    }
    
    public function getPartidaById($id){
        $partidas = $this->verPartidas();
        foreach($partidas as $p){
            if($p->get_id() == $id)
                return $p;
        }
        return false;   
    }
    
    
    public function eliminarPartida($id){
        $this->db->where('id',$id);
        $this->db->delete("partidas");
    }
    
    public function getNombreEquipoById($nombre){
        $this->load->model('Equipo');
        $equipos = $this->Equipo->getEquipos();
        foreach($equipos as $e){
            if($e->getNombre() == $nombre)
                return $e->getNombre();
        }
        return false;
    }
    
    public function getNombreTorneoById($id){
         $this->load->model('Torneo');
         $torneos = $this->Torneo->verTorneos();
        foreach($torneos as $t){
            if($t->getId() == $id)
                return $t->getNombre();
        }
        return false;
    }
    
    public function getJugadorById($id){
        $this->load->model('Jugador');
        $jugadores = $this->Jugador->verJugadores();
        foreach($jugadores as $j){
            if($j->get_id() == $id)
                return $j->get_nombre()." ".$j->get_apellido();
        }
        return false;
    }
    
    public function getNickById($id){
        $this->load->model('Jugador');
        $jugadores = $this->Jugador->verJugadores();
        foreach($jugadores as $j){
            if($j->get_id() == $id)
                return $j->get_nick();
        }
        return false;
    }
    
    
    public function listarPartidaPorTorneoFase($idTorneo, $fase){
        $query = $this->db->query('SELECT * FROM partidas WHERE torneo = ? AND fase LIKE ?',array($idTorneo,$fase));
        $partidas = $query->result();
        $partidasReplay=null;
        if($partidas!=NULL){
            foreach($partidas as $partida){
                $id= $partida->id;
                $torneo=$partida->torneo;
                $nombre1 = $this->getNombreEquipoById($partida->equipo1);
                $equipo1=$nombre1;
                $nombre2 = $this->getNombreEquipoById($partida->equipo2);
                $equipo2=$nombre2;
                $equipoGanador=$partida->equipoGanador;
                $equipoPerdedor=$partida->equipoPerdedor;
                $jugador1=$partida->jugador1;
                $jugador2=$partida->jugador2;
                $tiempo=$partida->tiempo;
                $fechaHoraInicio=$partida->fechaHoraInicio;
                $fase=$partida->fase;
                $raza1=$partida->raza1;
                $unidades1=$partida->unidades1;
                $recursos1=$partida->recursos1;
                $minerales1=$partida->minerales1;
                $total1=$partida->total1;
                $raza2=$partida->raza2;
                $unidades2=$partida->unidades2;
                $recursos2=$partida->recursos2;
                $minerales2=$partida->minerales2;
                $total2=$partida->total2;
                $replay=$partida->replay;
                $partidasReplay[] = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
            }
        }
        return $partidasReplay;
    }
    
    
    
    public function modificarPartidaReplay($id, $replay){
        $data=array(
            'replay'=>$replay
        );
        $this->db->where('id',$id);
        $this->db->update('partidas',$data);
    }
    public function modificarPartidaHorario($id, $hora){
        $data=array(
            'fechaHoraInicio'=>$hora
        );
        $this->db->where('id',$id);
        $this->db->update('partidas',$data);
    }
    public function getMaxPartida(){
        $query = $this->db->select_max('id');
       $query = $this->db->get('partidas');
       $list = $query->result();
       foreach($list as $d){
           $id = $d->id;
       }
       return $id;
    }
    
    public function llenar_combo_equipo($torneoId){
        
        $db = new MySQL();  
       $db->open();
       $consulta = $db->consulta("SELECT te.equipo FROM torneos t, torneoequipos te, equipos e WHERE t.id=te.torneo_id AND torneo_id LIKE $torneoId");
if ($row = $db->fetch_array($consulta)) {
	do {
		echo
               
		'<option value="'.$row['equipo'].'">'.$row['equipo'].'</option>';
	}while($row = $db->fetch_array($consulta));

    }
}
   
 
     
 public function llenar_combo_jugadores($equipo){
     
        $db = new MySQL();  
       $db->open();
       $consulta = $db->consulta("SELECT * FROM jugadores WHERE equipo = '$equipo'");
if ($row = $db->fetch_array($consulta)) {
	do {
		echo 
		'<option value="'.$row['id'].'">'.$row['nick'].'</option>';
	}while($row = $db->fetch_array($consulta));

   
 }
 
}
}
?>