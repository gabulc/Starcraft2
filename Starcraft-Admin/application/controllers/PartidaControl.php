<?php

class PartidaControl extends CI_Controller{
    public function PartidaControl(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('http://localhost/Starcraft-Admin/index.php/LoginControl/logout','location');
        }
    }
    public function index(){ 
        $this->load->model('Noticia','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Partida','',true);

        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        //Noticia
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        //Torneo
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['torneo']=null;
        $datos['equipos']=null;
        //Partidas
        $partidas = $this->Partida->verPartidas();
        $datos['partidas'] = $partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
        
        return $datos;
    }
    
    public function crearPartida(){
            $this->load->model('Administrador','',true);
            $this->load->model('Partida','',true);
            $torneo= $this->input->post('torneo');
            $equipo1=$this->input->post('equipo1');
            $equipo2=$this->input->post('equipo2');
            $equipoGanador=$this->input->post('equipo1');
            $equipoPerdedor=$this->input->post('equipo2');
            $jugador1=$this->input->post('jugador1');
            $jugador2=$this->input->post('jugador2');
            $tiempo=$this->input->post('tiempo');
            
            $fase=$this->input->post('fase');
            $raza1=$this->input->post('raza1');
            $unidades1=$this->input->post('unidades1');
            $recursos1=$this->input->post('recursos1');
            $minerales1=$this->input->post('minerales1');
            $total1= $unidades1 + $recursos1 +$minerales1;
            $raza2=$this->input->post('raza2');
            $unidades2=$this->input->post('unidades2');
            $recursos2=$this->input->post('recursos2');
            $minerales2=$this->input->post('minerales2');
            $total2=$unidades2 + $recursos2 +$minerales2;
       
           $partida = new Partida(null, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '00:00:00', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, null);
           $this->Partida->crearPartida($partida);
        
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function modificarPartida(){
        $this->load->model('Partida','',true);
        
            $id =  $this->input->post('idPartidaMod');
            $torneo= $this->input->post('mtorneo');
            $equipo1=$this->input->post('mequipo1');
            $equipo2=$this->input->post('mequipo2');
            $equipoGanador=$this->input->post('mequipo1');
            $equipoPerdedor=$this->input->post('mequipo2');
            $jugador1=$this->input->post('mjugador1');
            $jugador2=$this->input->post('mjugador2');
            $tiempo=$this->input->post('mtiempo');
            $fechaHoraInicio=$this->input->post('mfechaHoraInicio');
            $fase=$this->input->post('mfase');
            $raza1=$this->input->post('mraza1');
            $unidades1=$this->input->post('munidades1');
            $recursos1=$this->input->post('mrecursos1');
            $minerales1=$this->input->post('mminerales1');
            $total1= $unidades1 + $recursos1 +$minerales1;
            $raza2=$this->input->post('mraza2');
            $unidades2=$this->input->post('munidades2');
            $recursos2=$this->input->post('mrecursos2');
            $minerales2=$this->input->post('mminerales2');
            $total2=$total2=$unidades2 + $recursos2 +$minerales2;
            $replay=$this->input->post('mreplay');
        
        $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
        $this->Partida->modificarPartida($partida);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    
    public function eliminarPartida(){
        $this->load->model('Partida','',true);
        
        $id =  $this->input->post('idEliminarPartida');
        $this->Torneo->eliminarTorneo($id);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function listarComboEquipos(){
        $this->load->model('Partida');
        $id = $this->input->post('elegido');
        echo $comboEquipo= $this->Partida->llenar_combo_equipo($id);
        
        
    }
    
    public function listarComboJugadores(){
        $this->load->model('Partida');
        $equipo = $this->input->post('elegido');
        echo $comboEquipo= $this->Partida->llenar_combo_jugadores($equipo);
        
        
    }
    
    
}

?>
