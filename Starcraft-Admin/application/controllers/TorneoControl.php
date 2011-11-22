<?php

class TorneoControl extends CI_Controller{
    public function TorneoControl(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('http://localhost/Starcraft-Admin/index.php/LoginControl/logout','refresh');
        }
    }
    //Se cargan todos los datos comunes a la página: inicio
    //Todos los getAll para la navegación
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
        $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        
        $datos['torneos'] = $torneos;
        $datos['torneosLlenosC'] = $torneosLlenosC;
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
    /*Parte: Noticia
     * -crear noticia
     * -ver noticias:
     * eliminación y modificación
     */
    public function tokenizer($ruta){
        $nombre="";
        $word = strtok($ruta, "/\/");
        while(false!==$word){
            $word = strtok("/\/");
            if(false!==$word){
                $nombre = $word;
            }
        }
        return $nombre;
    }
    public function crearNoticia(){
        $this->load->model('Noticia','',true);
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
        $titulo = $this->input->post('titulo');
        $descripcion = $this->input->post('descripcion');
        $imagen = $this->input->post('rutaNoticia');
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,'Chrome')){
            $imagen = $this->tokenizer($imagen);
        }
        if(strpos($agent,'MSIE')){
            $imagen = $this->tokenizer($imagen);
        }
        if($titulo!=null&&$descripcion!=null&&$imagen!=null){
           $noticia = new Noticia(null, $titulo, $descripcion, $imagen);
           $this->Noticia->crearNoticia($noticia);

           $id = $this->Noticia->getMaxNoticia();
            copy("uploads/$imagen","uploads/noticia/$id.png");
            unlink("uploads/$imagen");
        }
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function verDetallesNoticia(){
        $this->load->model('Noticia','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Partida','',true);

        $id = $this->input->post('idVerDetalles');
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');

        $noticia = $this->Noticia->getNoticiaById($id);
        $noticias = $this->Noticia->verNoticias();

        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['noticia']=$noticia;
        $datos['noticias']=$noticias;
        
        
        $this->load->view('inicio',$datos);
    }
    public function getNoticiaById(){
        $this->load->model('Noticia','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Partida','',true);

        $id =  $this->input->post('idModificarNoticia');
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');

        $noticia = $this->Noticia->getNoticiaById($id);

        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
             
            
            $torneos = $this->Torneo->verTorneos();
            $torneosLlenos=$this->Torneo->getTorneosLlenos();
            $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
            $datos['torneosLlenosC'] = $torneosLlenosC;
           
            $datos['torneo']=null;
            $datos['equipos']=null;
            $datos['torneos'] = $torneos;
            $datos['torneosLlenos'] = $torneosLlenos;
        //Noticia
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=$noticia;
        
        //Partidas
        
         $partidas = $this->Partida->verPartidas();
            $datos['partidas'] = $partidas;
        $datos['partidas'] = $partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
        $this->load->view('inicio',$datos);
    }
    public function modificarNoticia(){
        $this->load->model('Noticia','',true);

        $id =  $this->input->post('idNoticiaMod');
        $titulo = $this->input->post('tituloNoticiaMod');
        $descripcion = $this->input->post('descripcionNoticiaMod');
        $imagen = $this->input->post('rutaNoticia');
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,'Chrome')){
            $imagen = $this->tokenizer($imagen);
        }
        if(strpos($agent,'MSIE')){
            $imagen = $this->tokenizer($imagen);
        }
        if($titulo!=null&&$descripcion!=null){
            if($imagen!=null){
                $noticia = new Noticia($id, $titulo, $descripcion, $imagen);
                $this->Noticia->modificarNoticia($noticia);   

                copy("uploads/$imagen","uploads/noticia/$id.png");
                unlink("uploads/$imagen");
            }else{
                $n = $this->Noticia->getNoticiaById($id);
                $noticia = new Noticia($id, $titulo, $descripcion, $n->getImagen());
                $this->Noticia->modificarNoticia($noticia);
            }
        }
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function destacarNoticia(){
        $this->load->model('Noticia','',true);
        $noticias = $this->Noticia->verNoticias();
        foreach ($noticias as $n){
            $post = 'noticiasDestacadas'.$n->getId();
            $data[] = $this->input->post($post);
        }
        if(!empty ($data)){
            $this->Noticia->removerNoticias();
            for ($i = 0; $i < count($data); $i++) {
                $this->Noticia->destacarNoticia($data[$i]);
            }
        }
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function eliminarNoticia(){
        $this->load->model('Noticia','',true);

        $id =  $this->input->post('idEliminarNoticia');
        $this->Noticia->eliminarNoticia($id);

        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    /*Parte: Torneo
     * -empezar torneo, estar activo
     * -crear torneo
     * -ver torneos: 
     * detalle con equipos que lo integran, 
     * modificación y eliminación de torneo
     */
    public function empezarTorneo(){
        $this->load->model('Torneo','',true);
        $torneosLlenosC = $this->Torneo->getTorneosLlenosParaEmpezar();
        foreach ($torneosLlenosC as $tl){
            $post = 't'.$tl->getId();
            $data[] = $this->input->post($post);
        }
        if(!empty ($data)){
            for ($i = 0; $i < count($data); $i++) {
                $this->Torneo->empezarTorneo($data[$i]);
            }
        }
        $datos = $this->index();
        $datos['torneosLlenosC'] = $torneosLlenosC; 
        $this->load->view('inicio',$datos);
    }
    public function crearTorneo(){
        $this->load->model('Administrador','',true);
        $this->load->model('Torneo','',true);
        
        $adm_username = $this->input->post('username');
        $nombre = $this->input->post('nombreTorneo');
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');
        $estado = $this->input->post('estado');
        $lugar = $this->input->post('lugar');
        $premioPrimero = $this->input->post('premioPrimero');
        $premioSegundo = $this->input->post('premioSegundo');
        $premioTercero = $this->input->post('premioTercero');
        
        if($adm_username!=null&&$nombre!=null&&$fechaInicio!=null&&$fechaFin!=null&&
           $estado!=null&&$lugar!=null&&$premioPrimero!=null&&$premioSegundo!=null&&$premioTercero!=null){
           $torneo = new Torneo(null, $adm_username, $nombre, $fechaInicio, $fechaFin, $estado, $lugar, $premioPrimero, $premioSegundo, $premioTercero);
           $this->Torneo->crearTorneo($torneo);
        }
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function verDetalles(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Noticia','',true);
        
        $id = $this->input->post('idVerDetalles');
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
        $torneo = $this->Torneo->getTorneoById($id);
        $equipos = $this->Equipo->getEquiposInscritosByTorneoId($id);
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneosLlenosC'] = $torneosLlenosC;
        
        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['torneo']=$torneo;
        $datos['equipos']=$equipos;
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['partidas'] = $partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        $this->load->view('inicio',$datos);
    }
    public function getTorneoById(){
            $this->load->model('Torneo','',true);
            $this->load->model('Equipo','',true);
            $this->load->model('Partida','',true);
            $this->load->model('Noticia','',true);

            $id =  $this->input->post('idModificarTorneo');
            $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
            $datos['username'] = $this->input->post('username');

            $torneo = $this->Torneo->getTorneoById($id);
            $equipos = $this->Equipo->getEquiposInscritosByTorneoId($id);
            $torneos = $this->Torneo->verTorneos();
            $torneosLlenos=$this->Torneo->getTorneosLlenos();
             $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneosLlenosC'] = $torneosLlenosC;

            $datos['title']='Starcraft II Torneos - Administrador';
            $datos['torneo']=$torneo;
            $datos['equipos']=$equipos;
            $datos['torneos'] = $torneos;
            $datos['torneosLlenos'] = $torneosLlenos;

            $partidas = $this->Partida->verPartidas();
            $datos['partidas'] = $partidas;
            $datos['partida']=null;
            $datos['partidasReplay'] = null;
            $noticias = $this->Noticia->verNoticias();
            $datos['noticias'] = $noticias;
            $datos['noticia']=null;
            $this->load->view('inicio',$datos);
        }
    public function modificarTorneo(){
        $this->load->model('Torneo','',true);
        
        $id =  $this->input->post('idTorneoMod');
        $adm_username=$this->input->post('username');
        $nombre = $this->input->post('nombreTorneoMod');
        $fechaInicio = $this->input->post('fechaInicioMod');
        $fechaFin = $this->input->post('fechaFinMod');
        $estado = $this->input->post('estadoMod');
        $lugar = $this->input->post('lugarMod');
        $premioPrimero = $this->input->post('premioPrimeroMod');
        $premioSegundo = $this->input->post('premioSegundoMod');
        $premioTercero = $this->input->post('premioTerceroMod');
        
        if($adm_username!=null&&$nombre!=null&&$fechaInicio!=null&&$fechaFin!=null&&
           $estado!=null&&$lugar!=null&&$premioPrimero!=null&&$premioSegundo!=null&&$premioTercero!=null){
           
            $torneo = new Torneo($id, $adm_username, $nombre, $fechaInicio, $fechaFin, $estado, $lugar, $premioPrimero, $premioSegundo, $premioTercero);
            $this->Torneo->modificarTorneo($torneo);
        }
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function eliminarTorneo(){
        $this->load->model('Torneo','',true);
        
        $id =  $this->input->post('idEliminarTorneo');
        $this->Torneo->eliminarTorneo($id);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    /*Parte: Partida
     * ver partidas:
     * detalle de las partidas. 
     * modificación del replay
     */
    public function listarPartidaPorTorneoFase(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Noticia','',true);
        
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
        $idTorneo = $this->input->post('torneosReplay');
        $fase = $this->input->post('faseReplay');
        
        if($idTorneo!=null && $fase!=null){
            $partidasReplay = $this->Partida->listarPartidaPorTorneoFase($idTorneo,$fase);
            $fit = $this->Torneo->getTorneoById($idTorneo)->getFechaInicio();
            $fft = $this->Torneo->getTorneoById($idTorneo)->getFechaFin();
        }else{
            $partidasReplay = null;
            $fit = null;
            $fft = null;
        }
            
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
         $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneosLlenosC'] = $torneosLlenosC;
        
        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['partida']=null;
        $datos['partidas']=$partidas;
        $datos['partidasReplay'] = $partidasReplay;
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        $datos['fit']=$fit;
        $datos['fft']=$fft;
        $this->load->view('inicio',$datos);
    }
    public function crearPartida(){
        $this->load->model('Administrador','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Equipo','',true);

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
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $ruta=$this->input->post('rutaResultado');
        if(strpos($agent,'Chrome')){
            $ruta = $this->tokenizer($ruta);
        }
        if(strpos($agent,'MSIE')){
            $ruta = $this->tokenizer($ruta);
        }
        
        if($torneo!=null&&$equipo1!=null&&$equipo2!=null&&$equipoGanador!=null&&
           $equipoPerdedor!=null&&$jugador1!=null&&$jugador2!=null&&$tiempo!=null&&$fase!=null
           &&$raza1!=null&&$unidades1!=null&&$recursos1!=null&&$minerales1!=null&&$total1!=null
           &&$raza2!=null&&$unidades2!=null&&$recursos2!=null&&$minerales2!=null&&$total2!=null){
            
            $equipoCompleto1 = $this->Equipo->getEquipoByNombre($equipo1);
            $equipoCompleto2 = $this->Equipo->getEquipoByNombre($equipo2);
            
            if($equipoCompleto1->getFaseActual()=='Grupos' && $equipoCompleto2->getFaseActual()=='Grupos' && $fase=='Grupos'){
                $partidasjugadasEquipo1 = $equipoCompleto1->getGanadas() + $equipoCompleto1->getPerdidas();
                $partidasjugadasEquipo2 = $equipoCompleto2->getGanadas() + $equipoCompleto2->getPerdidas();
                if($partidasjugadasEquipo1 < 3 && $partidasjugadasEquipo2 < 3){
                    if($equipoCompleto1->getGrupo()==$equipoCompleto2->getGrupo()){
                        $this->Equipo->sumarUnoGanador($equipo1);
                        $this->Equipo->sumarUnoPerdedor($equipo2);
                        $partida = new Partida(null, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, '');
                        $this->Partida->crearPartida($partida);
                        $id = $this->Partida->getMaxPartida();
                        copy("uploads/$ruta","uploads/partida/$id.png");
                        unlink("uploads/$ruta");
                    }
                }
            }
            if($equipoCompleto1->getFaseActual()=='Cuartos de Final' && $equipoCompleto2->getFaseActual()=='Cuartos de Final' && $fase=='Cuartos de Final'){
                $this->Equipos->equipoASemifinales($equipoCompleto1);
                
                $partida = new Partida(null, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, '');
                $this->Partida->crearPartida($partida);
                $id = $this->Partida->getMaxPartida();
                copy("uploads/$ruta","uploads/partida/$id.png");
                unlink("uploads/$ruta");
            }
            if($equipoCompleto1->getFaseActual()=='Semifinal' && $equipoCompleto2->getFaseActual()=='Semifinal' && $fase=='Semifinal'){
                $this->Equipos->equipoAFinal($equipoCompleto1);
                $this->Equipos->equipoATercerLugar($equipoCompleto2);
                
                $partida = new Partida(null, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, '');
                $this->Partida->crearPartida($partida);
                $id = $this->Partida->getMaxPartida();
                copy("uploads/$ruta","uploads/partida/$id.png");
                unlink("uploads/$ruta");
            }
            if($equipoCompleto1->getFaseActual()=='Tercer Lugar' && $equipoCompleto2->getFaseActual()=='Tercer Lugar' && $fase=='Final'){
                $this->Equipos->equipo3erPuesto($equipoCompleto1);
                
                $partida = new Partida(null, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, '');
                $this->Partida->crearPartida($partida);
                $id = $this->Partida->getMaxPartida();
                copy("uploads/$ruta","uploads/partida/$id.png");
                unlink("uploads/$ruta");
            }
            if($equipoCompleto1->getFaseActual()=='Final' && $equipoCompleto2->getFaseActual()=='Final' && $fase=='Final'){
                $this->Equipos->equipo1erPuesto($equipoCompleto1);
                $this->Equipos->equipo2doPuesto($equipoCompleto2);
                
                $partida = new Partida(null, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, '', $fase, $raza1, $unidades1, $recursos1, $minerales1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, '');
                $this->Partida->crearPartida($partida);
                $id = $this->Partida->getMaxPartida();
                copy("uploads/$ruta","uploads/partida/$id.png");
                unlink("uploads/$ruta");
            }
        }
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    
    public function modificarPartida(){
        $this->load->model('Administrador','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Equipo','',true);
        
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
        $ruta=$this->input->post('rutaResultado');
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,'Chrome')){
            $ruta = $this->tokenizer($ruta);
        }
        if(strpos($agent,'MSIE')){
            $ruta = $this->tokenizer($ruta);
        }
        if($torneo!=null&&$equipo1!=null&&$equipo2!=null&&$equipoGanador!=null&&
           $equipoPerdedor!=null&&$jugador1!=null&&$jugador2!=null&&$tiempo!=null&&$fase!=null
           &&$raza1!=null&&$unidades1!=null&&$recursos1!=null&&$minerales1!=null&&$total1!=null
           &&$raza2!=null&&$unidades2!=null&&$recursos2!=null&&$minerales2!=null&&$total2!=null){
            $equipoCompleto1 = $this->Equipo->getEquipoByNombre($equipo1);
            $equipoCompleto2 = $this->Equipo->getEquipoByNombre($equipo2);
            
            if($equipoCompleto1->getFaseActual()=='Grupos' && $equipoCompleto2->getFaseActual()=='Grupos' && $fase=='Grupos'){
                $partidasjugadasEquipo1 = $equipoCompleto1->getGanadas() + $equipoCompleto1->getPerdidas();
                $partidasjugadasEquipo2 = $equipoCompleto2->getGanadas() + $equipoCompleto2->getPerdidas();
                if($partidasjugadasEquipo1 <= 3 && $partidasjugadasEquipo2 <= 3){
                    if($equipoCompleto1->getGrupo()==$equipoCompleto2->getGrupo()){
                        $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
                        $this->Partida->modificarPartida($partida);
                        if($ruta!=null){
                            copy("uploads/$ruta","uploads/partida/$id.png");
                            unlink("uploads/$ruta");
                        }
                    }
                }
            }
            if($equipoCompleto1->getFaseActual()=='Cuartos de Final' && $equipoCompleto2->getFaseActual()=='Cuartos de Final' && $fase=='Cuartos de Final'){
                $this->Equipos->equipoASemifinales($equipoCompleto1);
                
                $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
                $this->Partida->modificarPartida($partida);
                if($ruta!=null){
                    copy("uploads/$ruta","uploads/partida/$id.png");
                    unlink("uploads/$ruta");
                }
            }
            if($equipoCompleto1->getFaseActual()=='Semifinal' && $equipoCompleto2->getFaseActual()=='Semifinal' && $fase=='Semifinal'){
                $this->Equipos->equipoAFinal($equipoCompleto1);
                $this->Equipos->equipoATercerLugar($equipoCompleto2);
                
                $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
                $this->Partida->modificarPartida($partida);
                if($ruta!=null){
                    copy("uploads/$ruta","uploads/partida/$id.png");
                    unlink("uploads/$ruta");
                }
            }
            if($equipoCompleto1->getFaseActual()=='Tercer Lugar' && $equipoCompleto2->getFaseActual()=='Tercer Lugar' && $fase=='Tercer Lugar'){
                $this->Equipos->equipo3erPuesto($equipoCompleto1);
                
                $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
                $this->Partida->modificarPartida($partida);
                if($ruta!=null){
                    copy("uploads/$ruta","uploads/partida/$id.png");
                    unlink("uploads/$ruta");
                }
            }
            if($equipoCompleto1->getFaseActual()=='Final' && $equipoCompleto2->getFaseActual()=='Final' && $fase=='Final'){
                $this->Equipos->equipo1erPuesto($equipoCompleto1);
                $this->Equipos->equipo2doPuesto($equipoCompleto2);
                
                $partida = new Partida($id, $torneo, $equipo1, $equipo2, $equipoGanador, $equipoPerdedor, $jugador1, $jugador2, $tiempo, $fechaHoraInicio, $fase, $raza1, $unidades1, $minerales1, $recursos1, $total1, $raza2, $unidades2, $recursos2, $minerales2, $total2, $replay);
                $this->Partida->modificarPartida($partida);
                if($ruta!=null){
                    copy("uploads/$ruta","uploads/partida/$id.png");
                    unlink("uploads/$ruta");
                }
            }
        }
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    
    public function verDetallesPartida(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Noticia','',true);
        
        $id = $this->input->post('idVerDetallesResultado');
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
        
       
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
		$partida = $this->Partida->getPartidaById($id);
                 $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneosLlenosC'] = $torneosLlenosC;
        
        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['partidas'] = $partidas;
        $datos['partida']=$partida;
        $datos['partidasReplay'] = null;
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        $this->load->view('inicio',$datos);
    }
    
    public function getPartidaById(){
       
         $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Noticia','',true);
        
        
        $id =  $this->input->post('idModificarPartida');
        $datos['nombreCompleto'] = $this->input->post('nombreCompleto');
        $datos['username'] = $this->input->post('username');
        
        $partida = $this->Partida->getPartidaById($id);
        
        $partida = $this->Partida->getPartidaById($id);
        $equipos = $this->Equipo->getEquiposInscritosByTorneoId($id);
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        
        $datos['title']='Starcraft II Torneos - Administrador';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
         $torneosLlenosC=$this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneosLlenosC'] = $torneosLlenosC;
        
        
        
        $partidas = $this->Partida->verPartidas();
        $datos['partidas'] = $partidas;
        $datos['partida']=$partida;
        $datos['partidasReplay'] = null;
        
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        $this->load->view('inicio',$datos);
    }
    
    public function eliminarPartida(){
        $this->load->model('Partida','',true);
        
        $id =  $this->input->post('idEliminarPartida');
        $this->Partida->eliminarPartida($id);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    
    
    public function modificarPartidaReplay(){
        $this->load->model('Partida','',true);
        
        $id =  $this->input->post('idPartidaReplay');
        $replay = $this->input->post('linkReplay');
        
        $this->Partida->modificarPartidaReplay($id, $replay);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
    public function modificarPartidaHorario(){
        $this->load->model('Partida','',true);
        
        $id =  $this->input->post('idPartidaHorario');
        $fecha = date_create($this->input->post('fechaHoraInicioHorario'));
        $hora = date_format($fecha, 'Y-m-d H:i:s');
        
        $this->Partida->modificarPartidaHorario($id, $hora);
        
        $datos = $this->index();
        $this->load->view('inicio',$datos);
    }
}

?>
