<?php

class TorneoControl extends CI_Controller{
    public function TorneoControl(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Torneo');
        $this->load->model('Equipo');
        $this->load->model('User');
        $this->load->model('Jugador');
        $this->load->model('TorneoEquipo');
        $this->load->model('Partida');
		$this->load->model('Noticia');
    }
    public function index(){
        $data['grupoA'] = null;
        $data['grupoB'] = null;
        $data['grupoC'] = null;
        $data['grupoD'] = null;
        $data['equiposEnGrupos'] = NULL;
        $torneosLlenos = $this->Torneo->getTorneosLlenos();
        $data['torneosLlenos'] = $torneosLlenos;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
		//Noticias
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $data['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $data['torneos']=$listaTorneos;
        $data['idTorneo']=null;
        $data['partidaDetalle']=null;
        $data['primeroA'] = null;
        $data['segundoA'] = null;
        $data['primeroB'] = null;
        $data['segundoB'] = null;
        $data['primeroC'] = null;
        $data['segundoC'] = null;
        $data['primeroD'] = null;
        $data['segundoD'] = null;
        $data['primerCuarto'] = null;
        $data['segundoCuarto'] = null;
        $data['tercerCuarto'] = null;
        $data['cuartoCuarto'] = null;

        $data['perdedor1'] = null;
        $data['perdedor2'] = null;

        $data['finalista1'] = null;
        $data['finalista2'] = null;

        $data['campeon'] = null;
        $data['segundoPuesto'] = null;
        $data['tercerPuesto'] = null;
        
        $data['torneoEnGrupos'] = null;
            
        $data['partidasReplay']=null;
        $data['partidasHorario']=null;
        $data['partida']=null;
        $data['partidasHorario2'] = null;
        $data['partidasHorario3'] =null;
        $data['partidasHorario4'] =null;
        $data['partidasHorario5']=null;
        $data['partidasHorario6']=null;
        $data['replay_partida']=null;
		$data['torneoPremios']=null;
        $this->load->view('cliente',$data);
    }
    public function irALogin(){
        $data['mensajeEmail']= ' ';
        $data['mensajeLogin'] = ' ';
        $data['mensajeRegistro'] = ' ';
        $this->load->view('login',$data);
    }
    public function verGrupos(){
        $id = $this->input->post('torneosLlenosResultados');
        $torneosLlenos = $this->Torneo->getTorneosLlenos();
        $datos['torneosLlenos'] = $torneosLlenos;
        if($id!=null){
            $datos['idTorneo']=$id;
            $equiposEnGrupos = $this->Equipo->getEquiposInscritosByTorneoId($id);
            $datos['equiposEnGrupos'] = $equiposEnGrupos;
            $grupoA=$this->Equipo->getGrupoOrdenado('A');
            $grupoB=$this->Equipo->getGrupoOrdenado('B');
            $grupoC=$this->Equipo->getGrupoOrdenado('C');
            $grupoD=$this->Equipo->getGrupoOrdenado('D');
            $datos['grupoA'] = $grupoA;
            $datos['grupoB'] = $grupoB;
            $datos['grupoC'] = $grupoC;
            $datos['grupoD'] = $grupoD;
        }else{
            $datos['idTorneo']=null;
            $datos['equiposEnGrupos'] = null;
            $datos['grupoA'] = null;
            $datos['grupoB'] = null;
            $datos['grupoC'] = null;
            $datos['grupoD'] = null;
        }
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;

        $datos['perdedor1'] = null;
        $datos['perdedor2'] = null;

        $datos['finalista1'] = null;
        $datos['finalista2'] = null;

        $datos['campeon'] = null;
        $datos['segundoPuesto'] = null;
        $datos['tercerPuesto'] = null;

        $datos['torneoEnGrupos'] = null;
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        foreach($listaTorneos as $torneo){
                $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
                foreach($listaTorneoEquipo as $torneoEquipo){
                        if($torneoEquipo!=null){
                            $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                            $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                            $equipo->set_jugadores($listajugadores);

                            $listaEquipos[]=$equipo;
                        }
                }
                $torneo->set_equipos($listaEquipos);
                $listaEquipos=null;
        }
		//Noticias
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $datos['torneos']=$listaTorneos;
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;
        $datos['partida']=null;
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['replay_partida']=null;
        $datos['torneoPremios']=null;
        $this->load->view('cliente',$datos);
    }
    public function verMapa(){
        $id = $this->input->post('torneosLlenosResultados');
        if($id!=null){
            $equiposEnGrupos = $this->Equipo->getEquiposInscritosByTorneoId($id);
            $datos['equiposEnGrupos'] = $equiposEnGrupos;
            $datos['idTorneo']=$id;
            $grupoA=$this->Equipo->getGrupoOrdenado('A');
            $grupoB=$this->Equipo->getGrupoOrdenado('B');
            $grupoC=$this->Equipo->getGrupoOrdenado('C');
            $grupoD=$this->Equipo->getGrupoOrdenado('D');

            $grupoCompletoA = false;
            $a=0;
            $grupoCompletoB = false;
            $b=0;
            $grupoCompletoC = false;
            $c=0;
            $grupoCompletoD = false;
            $d=0;
            //----A----
            foreach($grupoA as $e){
                $partidasjugadas = $e->get_ganadas()+$e->get_perdidas();
                if($partidasjugadas==3)
                    $a++;
            }if($a==4){$grupoCompletoA=true;}
            //----B----
            foreach($grupoB as $e){
                $partidasjugadas = $e->get_ganadas()+$e->get_perdidas();
                if($partidasjugadas==3)
                    $b++;
            }if($b==4){$grupoCompletoB=true;}
            //----C----
            foreach($grupoC as $e){
                $partidasjugadas = $e->get_ganadas()+$e->get_perdidas();
                if($partidasjugadas==3)
                    $c++;
            }if($c==4){$grupoCompletoC=true;}
            //----D----
            foreach($grupoD as $e){
                $partidasjugadas = $e->get_ganadas()+$e->get_perdidas();
                if($partidasjugadas==3)
                    $d++;
            }if($d==4){$grupoCompletoD=true;}
            
            //Tenemos los grupos con sus patidas completas de 3 fechas... vemos si es así, entonces obtenemos los 2 primeros
            $primerCuarto=null;
            $segundoCuarto=null;
            $tercerCuarto=null;
            $cuartoCuarto=null;
            $perdedor1=null;
            $perdedor2=null;
            $finalista1=null;
            $finalista2=null;
            $primerPuesto=null;
            $segundoPuesto=null;
            $tercerPuesto=null;
            
            $primeroA=null;
            $segundoA=null;
            if($grupoCompletoA==true){
                $primeroA=$grupoA[0];
                $segundoA=$grupoA[1];
                if($primeroA->get_faseActual()=='Grupos' && $segundoA->get_faseActual()=='Grupos'){
                    $this->Equipo->equipoACuartos($primeroA);
                    $this->Equipo->equipoACuartos($segundoA);
                }
                if($primeroA->get_faseActual()=='Semifinal'){
                    $primerCuarto=$primeroA;
                }
                if($primeroA->get_faseActual()=='TercerLugar'){
                    $perdedor1=$primeroA;
                    $primerCuarto=$primeroA;
                }
                if($primeroA->get_faseActual()=='Final'){
                    $finalista1=$primeroA;
                    $primerCuarto=$primeroA;
                }
                if($primeroA->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$primeroA;
                    $perdedor1=$primeroA;
                    $primerCuarto=$primeroA;
                }
                if($primeroA->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $primeroA;
                    $finalista1=$primeroA;
                    $primerCuarto=$primeroA;
                }
                if($primeroA->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $primeroA;
                    $finalista1=$primeroA;
                    $primerCuarto=$primeroA;
                }
                if($segundoA->get_faseActual()=='Semifinal'){
                    $segundoCuarto=$segundoA;
                }
                if($segundoA->get_faseActual()=='TercerLugar'){
                    $perdedor1=$segundoA;
                    $segundoCuarto=$segundoA;
                }
                if($segundoA->get_faseActual()=='Final'){
                    $finalista1=$segundoA;
                    $segundoCuarto=$segundoA;
                }
                if($segundoA->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$segundoA;
                    $perdedor1=$segundoA;
                    $segundoCuarto=$segundoA;
                }
                if($segundoA->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $segundoA;
                    $finalista1=$segundoA;
                    $segundoCuarto=$segundoA;
                }
                if($segundoA->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $segundoA;
                    $finalista1=$segundoA;
                    $segundoCuarto=$segundoA;
                }
            }
            $primeroB=null;
            $segundoB=null;
            if($grupoCompletoB==true){
                $primeroB=$grupoB[0];
                $segundoB=$grupoB[1];
                if($primeroB->get_faseActual()=='Grupos' && $segundoB->get_faseActual()=='Grupos'){
                    $this->Equipo->equipoACuartos($primeroB);
                    $this->Equipo->equipoACuartos($segundoB);
                }
                if($segundoB->get_faseActual()=='Semifinal'){
                    $primerCuarto=$segundoB;
                }
                if($segundoB->get_faseActual()=='TercerLugar'){
                    $perdedor1=$segundoB;
                    $primerCuarto=$segundoB;
                }
                if($segundoB->get_faseActual()=='Final'){
                    $finalista1=$segundoB;
                    $primerCuarto=$segundoB;
                }
                if($segundoB->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$segundoB;
                    $perdedor1=$segundoB;
                    $primerCuarto=$segundoB;
                }
                if($segundoB->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $segundoB;
                    $finalista1=$segundoB;
                    $primerCuarto=$segundoB;
                }
                if($segundoB->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $segundoB;
                    $finalista1=$segundoB;
                    $primerCuarto=$segundoB;
                }
                if($primeroB->get_faseActual()=='Semifinal'){
                    $segundoCuarto=$primeroB;
                }
                if($primeroB->get_faseActual()=='TercerLugar'){
                    $perdedor1=$primeroB;
                    $segundoCuarto=$primeroB;
                }
                if($primeroB->get_faseActual()=='Final'){
                    $finalista1=$primeroB;
                    $segundoCuarto=$primeroB;
                }
                if($primeroB->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$primeroB;
                    $perdedor1=$primeroB;
                    $segundoCuarto=$primeroB;
                }
                if($primeroB->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $primeroB;
                    $finalista1=$primeroB;
                    $segundoCuarto=$primeroB;
                }
                if($primeroB->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $primeroB;
                    $finalista1=$primeroB;
                    $segundoCuarto=$primeroB;
                }
            }
            $primeroC=null;
            $segundoC=null;
            if($grupoCompletoC==true){
                $primeroC=$grupoC[0];
                $segundoC=$grupoC[1];
                if($primeroC->get_faseActual()=='Grupos' && $segundoC->get_faseActual()=='Grupos'){
                    $this->Equipo->equipoACuartos($primeroC);
                    $this->Equipo->equipoACuartos($segundoC);
                }
                if($primeroC->get_faseActual()=='Semifinal'){
                    $tercerCuarto=$primeroC;
                }
                if($primeroC->get_faseActual()=='TercerLugar'){
                    $perdedor2=$primeroC;
                    $tercerCuarto=$primeroC;
                }
                if($primeroC->get_faseActual()=='Final'){
                    $finalista2=$primeroC;
                    $tercerCuarto=$primeroC;
                }
                if($primeroC->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$primeroC;
                    $perdedor2=$primeroC;
                    $tercerCuarto=$primeroC;
                }
                if($primeroC->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $primeroC;
                    $finalista2=$primeroC;
                    $tercerCuarto=$primeroC;
                }
                if($primeroC->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $primeroC;
                    $finalista2=$primeroC;
                    $tercerCuarto=$primeroC;
                }
                if($segundoC->get_faseActual()=='Semifinal'){
                    $cuartoCuarto=$segundoC;
                }
                if($segundoC->get_faseActual()=='TercerLugar'){
                    $perdedor2=$segundoC;
                    $cuartoCuarto=$segundoC;
                }
                if($segundoC->get_faseActual()=='Final'){
                    $finalista2=$segundoC;
                    $cuartoCuarto=$segundoC;
                }
                if($segundoC->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$segundoC;
                    $perdedor2=$segundoC;
                    $cuartoCuarto=$segundoC;
                }
                if($segundoC->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $segundoC;
                    $finalista2=$segundoC;
                    $cuartoCuarto=$segundoC;
                }
                if($segundoC->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $segundoC;
                    $finalista2=$segundoC;
                    $cuartoCuarto=$segundoC;
                }
            }
            $primeroD=null;
            $segundoD=null;
            if($grupoCompletoD==true){
                $primeroD=$grupoD[0];
                $segundoD=$grupoD[1];
                if($primeroD->get_faseActual()=='Grupos' && $segundoD->get_faseActual()=='Grupos'){
                    $this->Equipo->equipoACuartos($primeroD);
                    $this->Equipo->equipoACuartos($segundoD);
                }
                if($segundoD->get_faseActual()=='Semifinal'){
                    $tercerCuarto=$segundoD;
                }
                if($segundoD->get_faseActual()=='TercerLugar'){
                    $perdedor2=$segundoD;
                    $tercerCuarto=$segundoD;
                }
                if($segundoD->get_faseActual()=='Final'){
                    $finalista2=$segundoD;
                    $tercerCuarto=$segundoD;
                }
                if($segundoD->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$segundoD;
                    $perdedor2=$segundoD;
                    $tercerCuarto=$segundoD;
                }
                if($segundoD->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $segundoD;
                    $finalista2=$segundoD;
                    $tercerCuarto=$segundoD;
                }
                if($segundoD->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $segundoD;
                    $finalista2=$segundoD;
                    $tercerCuarto=$segundoD;
                }
                if($primeroD->get_faseActual()=='Semifinal'){
                    $cuartoCuarto=$primeroD;
                }
                if($primeroD->get_faseActual()=='TercerLugar'){
                    $perdedor2=$primeroD;
                    $cuartoCuarto=$primeroD;
                }
                if($primeroD->get_faseActual()=='Final'){
                    $finalista2=$primeroD;
                    $cuartoCuarto=$primeroD;
                }
                if($primeroD->get_faseActual()=='3er Puesto'){
                    $tercerPuesto=$primeroD;
                    $perdedor2=$primeroD;
                    $cuartoCuarto=$primeroD;
                }
                if($primeroD->get_faseActual()=='2do Puesto'){
                    $segundoPuesto = $primeroD;
                    $finalista2=$primeroD;
                    $cuartoCuarto=$primeroD;
                }
                if($primeroD->get_faseActual()=='1er Puesto'){
                    $primerPuesto = $primeroD;
                    $finalista2=$primeroD;
                    $cuartoCuarto=$primeroD;
                }
            }
            $datos['grupoA'] = $grupoA;
            $datos['grupoB'] = $grupoB;
            $datos['grupoC'] = $grupoC;
            $datos['grupoD'] = $grupoD;
            $datos['primeroA'] = $primeroA;
            $datos['segundoA'] = $segundoA;
            $datos['primeroB'] = $primeroB;
            $datos['segundoB'] = $segundoB;
            $datos['primeroC'] = $primeroC;
            $datos['segundoC'] = $segundoC;
            $datos['primeroD'] = $primeroD;
            $datos['segundoD'] = $segundoD;
            
            $datos['primerCuarto'] = $primerCuarto;
            $datos['segundoCuarto'] = $segundoCuarto;
            $datos['tercerCuarto'] = $tercerCuarto;
            $datos['cuartoCuarto'] = $cuartoCuarto;
            
            $datos['perdedor1'] = $perdedor1;
            $datos['perdedor2'] = $perdedor2;
            
            $datos['finalista1'] = $finalista1;
            $datos['finalista2'] = $finalista2;
            
            $datos['campeon'] = $primerPuesto;
            $datos['segundoPuesto'] = $segundoPuesto;
            $datos['tercerPuesto'] = $tercerPuesto;
        }else{
            $datos['equiposEnGrupos'] = null;
            $datos['grupoA'] = null;
            $datos['grupoB'] = null;
            $datos['grupoC'] = null;
            $datos['grupoD'] = null;  
            $datos['primeroA'] = null;
            $datos['segundoA'] = null;
            $datos['primeroB'] = null;
            $datos['segundoB'] = null;
            $datos['primeroC'] = null;
            $datos['segundoC'] = null;
            $datos['primeroD'] = null;
            $datos['segundoD'] = null;
            $datos['primerCuarto'] = null;
            $datos['segundoCuarto'] = null;
            $datos['tercerCuarto'] = null;
            $datos['cuartoCuarto'] = null;
            
            $datos['perdedor1'] = null;
            $datos['perdedor2'] = null;
            
            $datos['finalista1'] = null;
            $datos['finalista2'] = null;
            
            $datos['campeon'] = null;
            $datos['segundoPuesto'] = null;
            $datos['tercerPuesto'] = null;
        }
        $torneosLlenos = $this->Torneo->getTorneosLlenos();
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['partidaDetalle']=null;
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                if($torneoEquipo!=null){
                    $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                    $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                    $equipo->set_jugadores($listajugadores);

                    $listaEquipos[]=$equipo;
                }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
		//Noticias
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;
        $datos['partida']=null;
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['replay_partida']=null;
        $datos['torneoPremios']=null;
        $datos['torneos']=$listaTorneos;
        $this->load->view('cliente',$datos);
    }
    public function verPartidaDetalle($nombreEquipo1, $nombreEquipo2, $idTorneo){
        $partida = $this->Partida->verDetallePartida($nombreEquipo1, $nombreEquipo2 , $idTorneo);
        if($partida!=null){
            $data['partidaDetalle']=$partida;
            $data['jugadorUno']=$this->Jugador->getJugadorById($partida->get_jugador1());
            $data['jugadorDos']=$this->Jugador->getJugadorById($partida->get_jugador2());
        }else{
            $data['partidaDetalle']=null;
        }
        $data['grupoA'] = null;
        $data['grupoB'] = null;
        $data['grupoC'] = null;
        $data['grupoD'] = null;
        $data['equiposEnGrupos'] = NULL;

        $torneosLlenos = $this->Torneo->getTorneosLlenos();
        $data['torneosLlenos'] = $torneosLlenos;

        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                if($torneoEquipo!=null){
                    $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                    $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                    $equipo->set_jugadores($listajugadores);

                    $listaEquipos[]=$equipo;
                }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $data['torneos']=$listaTorneos;
        $data['idTorneo']=null;
        $data['equiposEnGrupos'] = null;
        $data['grupoA'] = null;
        $data['grupoB'] = null;
        $data['grupoC'] = null;
        $data['grupoD'] = null;
        $data['primeroA'] = null;
        $data['segundoA'] = null;
        $data['primeroB'] = null;
        $data['segundoB'] = null;
        $data['primeroC'] = null;
        $data['segundoC'] = null;
        $data['primeroD'] = null;
        $data['segundoD'] = null;
        $data['primerCuarto'] = null;
        $data['segundoCuarto'] = null;
        $data['tercerCuarto'] = null;
        $data['cuartoCuarto'] = null;

        $data['perdedor1'] = null;
        $data['perdedor2'] = null;

        $data['finalista1'] = null;
        $data['finalista2'] = null;

        $data['campeon'] = null;
        $data['segundoPuesto'] = null;
        $data['tercerPuesto'] = null;
        
        $data['torneoEnGrupos'] = null;
        //Noticias
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $data['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $data['partidasReplay']=null;
        $data['partidasHorario']=null;
        $data['partida']=null;
        $data['partidasHorario2'] = null;
        $data['partidasHorario3'] =null;
        $data['partidasHorario4'] =null;
        $data['partidasHorario5']=null;
        $data['partidasHorario6']=null;
        $data['replay_partida']=null;
        $data['torneoPremios']=null;
        $this->load->view('cliente',$data);
    }
    
    public function listarPartidaPorTorneoFaseFecha1(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
		$this->load->model('Noticia','',true);
        
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        //Noticias
		
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $data['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
		
		
        $data['title']='Starcraft II Torneos - Usuario';
        $data['equipos']=null;
        $data['torneos'] = $torneos;
        $data['torneosLlenos'] = $torneosLlenos;
        
        $data['grupoA'] = null;
        $data['grupoB'] = null;
        $data['grupoC'] = null;
        $data['grupoD'] = null;
        $data['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $data['torneos']=$listaTorneos;
        $data['idTorneo']=null;
        $data['partidaDetalle']=null;
        $data['primeroA'] = null;
        $data['segundoA'] = null;
        $data['primeroB'] = null;
        $data['segundoB'] = null;
        $data['primeroC'] = null;
        $data['segundoC'] = null;
        $data['primeroD'] = null;
        $data['segundoD'] = null;
        $data['primerCuarto'] = null;
        $data['segundoCuarto'] = null;
        $data['tercerCuarto'] = null;
        $data['cuartoCuarto'] = null;
        
        $data['partida']=null;
        $data['replay_partida']=null;
        $data['partidas']=$partidas;
        $data['partida']=null;
        $data['partidasReplay'] = null;
        $data['partidasHorario'] = $partidasHorario;
        $data['partidasHorario2'] = null;
        $data['partidasHorario3'] = null;
        $data['partidasHorario4'] = null;
        $data['partidasHorario5'] = null;
        $data['partidasHorario6'] = null;;
        $data['replay_partida'] = null;
        $data['torneoPremios']=null;
        ///$noticias = $this->Noticia->verNoticias();
        ///$datos['noticias'] = $noticias;
        //$datos['noticia']=null;
        $this->load->view('cliente',$data);
    }
    
    public function listarPartidaPorTorneoFaseFecha2(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
       
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
		//Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $data['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario2 = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        
        $data['title']='Starcraft II Torneos - Usuario';
        $data['torneo']=null;
        $data['equipos']=null;
        $data['torneosLlenos'] = $torneosLlenos;
        
        $data['grupoA'] = null;
        $data['grupoB'] = null;
        $data['grupoC'] = null;
        $data['grupoD'] = null;
        $data['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $data['torneos']=$listaTorneos;
        $data['idTorneo']=null;
        $data['partidaDetalle']=null;
        $data['primeroA'] = null;
        $data['segundoA'] = null;
        $data['primeroB'] = null;
        $data['segundoB'] = null;
        $data['primeroC'] = null;
        $data['segundoC'] = null;
        $data['primeroD'] = null;
        $data['segundoD'] = null;
        $data['primerCuarto'] = null;
        $data['segundoCuarto'] = null;
        $data['tercerCuarto'] = null;
        $data['cuartoCuarto'] = null;        
        
        $data['partida']=null;
        $data['replay_partida']=null;
        $data['partidas']=$partidas;
        $data['partida']=null;
        $data['partidasReplay'] = null;
         $data['partidasHorario']=null;
        $data['partidasHorario2'] = $partidasHorario2;
         $data['partidasHorario3'] =null;
         $data['partidasHorario4'] =null;
         $data['partidasHorario5']=null;
         $data['partidasHorario6']=null;
        $data['replay_partida'] = null;
        $data['torneoPremios']=null;
        ///$noticias = $this->Noticia->verNoticias();
        ///$datos['noticias'] = $noticias;
        //$datos['noticia']=null;
        $this->load->view('cliente',$data);
    }
    
    public function listarPartidaPorTorneoFaseFecha3(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario3 = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
		
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
		
		
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partida']=null;
        $datos['replay_partida']=null;
        $datos['partidas']=$partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
       $datos['partidasHorario']=null;
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =$partidasHorario3;
         $datos['partidasHorario4'] =null;
         $datos['partidasHorario5']=null;
         $datos['partidasHorario6']=null;
         $datos['replay_partida'] = null;
        $datos['torneoPremios']=null;
        ///$noticias = $this->Noticia->verNoticias();
        ///$datos['noticias'] = $noticias;
        //$datos['noticia']=null;
        $this->load->view('cliente',$datos);
    }
    
    public function listarPartidaPorTorneoFaseFecha4(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
       
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario4 = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partida']=null;
        $datos['replay_partida']=null;
        $datos['partidas']=$partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
        $datos['partidasHorario']=null;
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =null;
         $datos['partidasHorario4'] =$partidasHorario4;
         $datos['partidasHorario5']=null;
         $datos['partidasHorario6']=null;
         $datos['replay_partida'] = null;
        $datos['torneoPremios']=null;
        //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
    }
    
    public function listarPartidaPorTorneoFaseFecha5(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
       
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario5 = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partida']=null;
        $datos['replay_partida']=null;
        $datos['partidas']=$partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
       $datos['partidasHorario']=null;
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =null;
         $datos['partidasHorario4'] =null;
         $datos['partidasHorario5']=$partidasHorario5;
         $datos['partidasHorario6']=null;
        $datos['replay_partida'] = null;
        $datos['torneoPremios']=null;
        //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
    }
    
    public function listarPartidaPorTorneoFaseFecha6(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        
        $idTorneo = $this->input->post('torneoHorario');
        $fase = $this->input->post('faseHorario');
        $fecha = $this->input->post('fechaHorario');
        
        $partidasReplay = null;
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $partidasHorario6 = $this->Partida->listarPartidaPorTorneoFaseFecha($idTorneo, $fase, $fecha);
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partida']=null;
        $datos['replay_partida']=null;
        $datos['partidas']=$partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
       $datos['partidasHorario']=null;
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =null;
         $datos['partidasHorario4'] =null;
         $datos['partidasHorario5']=null;
         $datos['partidasHorario6']=$partidasHorario6;
         $datos['replay_partida'] = null;
        $datos['torneoPremios']=null;
        //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
    }
    
    
    
    
    
    public function listarPartidaPorTorneoFase(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
       
        $idTorneo = $this->input->post('torneosReplay');
        $fase = $this->input->post('faseReplay');
        
        $partidasReplay = $this->Partida->listarPartidaPorTorneoFase($idTorneo,$fase);
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partida']=null;
        $datos['replay_partida']=null;
      
        $datos['partidasHorario']=null;
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =null;
         $datos['partidasHorario4'] =null;
         $datos['partidasHorario5']=null;
         $datos['partidasHorario6']=null;
        $datos['partidas']=$partidas;
        $datos['partidasReplay'] = $partidasReplay;
        $datos['replay_partida'] = null;
        $datos['torneoPremios']=null;
        //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
    }
    
    public function getReplayById(){
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);   
        $this->load->model('Partida','',true);
        $idPartidaReplay = $this->input->post('idPartidaReplay');
        $replay_partida=$this->Partida->getReplayById($idPartidaReplay);
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partidas']=$partidas;
        $datos['partida']=null;
         $datos['partidasReplay']=null;
         $datos['partidasHorario']=null;         
        $datos['partidasHorario2'] = null;
         $datos['partidasHorario3'] =null;
         $datos['partidasHorario4'] =null;
         $datos['partidasHorario5']=null;
         $datos['partidasHorario6']=null;
        $datos['replay_partida'] = $replay_partida;
        $datos['torneoPremios']=null;
		 //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
    }
    
    public function getPartidaById(){
        $this->load->model('Partida','',true);
        $this->load->model('Torneo','',true);
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $idPartida = $this->input->post('idPartidaReplay');
        $partida = $this->Partida->getPartidaById($idPartida);
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partidas']=$partidas;
        $datos['partida']=$partida;
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;         
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['torneoPremios']=null;
        $datos['replay_partida']=null;
	//Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
        
    }
    
    public function getPartidaByIdDetail(){
        $this->load->model('Partida','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Jugador','',true);
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        $idPartida = $this->input->post('idPartidaDet');
        $partida = $this->Partida->getPartidaById($idPartida);
        
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partidas']=$partidas;
        $datos['partida']=$partida;
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;         
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['torneoPremios']=null;
        $datos['replay_partida']=null;
        
         //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
            $this->load->view('cliente',$datos);
    }
    
    
    public function getPartidaLive(){
        $this->load->model('Partida','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Jugador','',true);
        
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $partidas = $this->Partida->verPartidas();
        
        $idT = $this->input->post('torneoLive');
        $hora =  $this->input->post('fhl');
        $dia =  $this->input->post('dia');
        
        $partida = $this->Partida->getPartidaByTorneoFechaHora($idT, $hora, $dia);
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partidas']=$partidas;
        $datos['partida']=$partida;
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;         
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['torneoPremios']=null;
        $datos['replay_partida']=null;
		 //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
        
    }
    public function verPremios(){
        $id = $this->input->post('torneoPremios');
        $torneoPremios = $this->Torneo->getTorneoById($id);
        $datos['torneoPremios']=$torneoPremios;
        
        $datos['title']='Starcraft II Torneos - Usuario';
        $datos['torneo']=null;
        $datos['equipos']=null;
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $datos['torneosLlenos'] = $torneosLlenos;
        
        $datos['grupoA'] = null;
        $datos['grupoB'] = null;
        $datos['grupoC'] = null;
        $datos['grupoD'] = null;
        $datos['equiposEnGrupos'] = NULL;
        
        $partidas = $this->Partida->verPartidas();
        $listaTorneos=$this->Torneo->verTorneos();
        $listaEquipos=array();
        $partidasReplay = null;
        foreach($listaTorneos as $torneo){
            $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByTorneo($torneo->getId());
            foreach($listaTorneoEquipo as $torneoEquipo){
                    if($torneoEquipo!=null){
                        $equipo = $this->Equipo->getEquiposxName($torneoEquipo->get_equipo());
                        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                        $equipo->set_jugadores($listajugadores);

                        $listaEquipos[]=$equipo;
                    }
            }
            $torneo->set_equipos($listaEquipos);
            $listaEquipos=null;
        }
        $datos['torneos']=$listaTorneos;
        $datos['idTorneo']=null;
        $datos['partidaDetalle']=null;
        $datos['primeroA'] = null;
        $datos['segundoA'] = null;
        $datos['primeroB'] = null;
        $datos['segundoB'] = null;
        $datos['primeroC'] = null;
        $datos['segundoC'] = null;
        $datos['primeroD'] = null;
        $datos['segundoD'] = null;
        $datos['primerCuarto'] = null;
        $datos['segundoCuarto'] = null;
        $datos['tercerCuarto'] = null;
        $datos['cuartoCuarto'] = null;
        
        $datos['partidas']=$partidas;
        $datos['partida']=null;
        $datos['partidasReplay']=null;
        $datos['partidasHorario']=null;         
        $datos['partidasHorario2'] = null;
        $datos['partidasHorario3'] =null;
        $datos['partidasHorario4'] =null;
        $datos['partidasHorario5']=null;
        $datos['partidasHorario6']=null;
        $datos['replay_partida']=null;
		 //Noticias
		$this->load->model('Noticia','',true);
            $noticiasDestacadas = $this->Noticia->verNoticiasDestacadas();
            $datos['noticiasDestacadas']= $noticiasDestacadas ;
        //Fin Noticias
        $this->load->view('cliente',$datos);
        
    }
}

?>
