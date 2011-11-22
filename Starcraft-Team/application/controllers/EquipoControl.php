<?php

class EquipoControl extends CI_Controller {
    public function EquipoControl(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->Model("Torneo");
        $this->load->Model("Equipo");
        $this->load->Model("Torneo");
        $this->load->Model("User");
        $this->load->Model("Jugador");
        $this->load->Model("TorneoEquipo");
        $this->load->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('/LoginControl/logout','refresh');
        }
    }
    public function registrarEquipo(){
        $this->load->Model("Torneo");
        $this->load->Model("Equipo");
        $this->load->Model("Torneo");
        $this->load->Model("User");
        $this->load->Model("TorneoEquipo");
        $nombre=$this->input->post("txtnombreequipo");
        $raza = $this->input->post("raza");
        $pagina= $this->input->post("txtpaginaequipo");
        $ruta = $this->input->post("segunfo");
        $agent=$_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,'Chrome')){
            $ruta = $this->tokenizer($ruta);
        }
        if(strpos($agent,'MSIE')){
            $ruta = $this->tokenizer($ruta);
        }   
        $torneo_id = $this->input->post("torneo");
        $user = $this->input->post("user");
        $torneo = new Torneo($torneo_id);
        $equipo = new Equipo($nombre, new User($user), $raza, $pagina, "", "", 1, 0, 0);
        $torneoEquipo = new TorneoEquipo($torneo_id, $nombre);
        $bool = $this->Equipo->verificarId($nombre);
        if(!$bool){
             copy("uploads/$ruta", "ImageEquipos/$nombre.png");
             unlink("uploads/$ruta");
             $this->Equipo->insertEquipo($equipo);
             $this->TorneoEquipo->insertarEquipoTorneo($torneoEquipo);
             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipo->get_nombre());
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = "Se Registro Exitosamente el equipo";
             $mensajeExitoModificacionEquipo = null;
             $mensajeEliminacioEquipo=null;
             $data['user']=$user;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipo;
             $data['mensaje']=$mensje;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['listaJugadores']=null;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
             $this->load->view('inicio',$data);
            
        }else{
             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipo->get_nombre());
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = "No se Registro el equipo x Existe un equipo con el mismo nombre";
             $mensajeExitoModificacionEquipo = null;
             $mensajeEliminacioEquipo=null;
             $data['user']=$user;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipo;
             $data['mensaje']=$mensje;
             $data['listaJugadores']=null;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
             $this->load->view('inicio',$data);
            
        }
        
       
        
    }

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

    public function eREgistrarEquipo2(){
        $this->load->Model("Torneo");
        $this->load->Model("Jugador");
        $this->load->Model("Equipo");
        $nombre1= $this->input->post("txtNombre1");
        $apellido1 = $this->input->post("txtApellido1");
        $nick1 = $this->input->post("txtNick1");
        $DNI1 = $this->input->post("txtDNI1");
        $rank1 = $this->input->post("rank1");
        $descrip1= $this->input->post("txtDescribete1");
        $raza1 = $this->input->post("raza1");
        $nombre2= $this->input->post("txtNombre2");
        $apellido2 = $this->input->post("txtApellido2");
        $nick2 = $this->input->post("txtNick2");
        $DNI2 = $this->input->post("txtDNI2");
        $rank2 = $this->input->post("rank2");
        $descrip2= $this->input->post("txtDescribete2");
        $raza2 = $this->input->post("raza2");
        $user = $this->input->post("user");
        $equipo = $this->Equipo->getEquipoxUser($user);

        $jugador1 = new Jugador(0, $equipo, $nombre1, $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
        $jugador2 = new Jugador(1, $equipo, $nombre2, $apellido2, $nick2, $DNI2, $raza2, $rank2, $descrip2);
        $this->Jugador->insertJugadores($jugador1);
        $this->Jugador->insertJugadores($jugador2);

        $this->Cargar();
        
         
         
    }

    public function eRegistrarEquipo1(){
        $this->load->Model("Torneo");
        $this->load->Model("Jugador");
        $this->load->Model("Equipo");
        $nombre1= $this->input->post("txtNombre3");
        $apellido1 = $this->input->post("txtApellido3");
        $nick1 = $this->input->post("txtNick3");
        $DNI1 = $this->input->post("txtDNI3");
        $rank1 = $this->input->post("rank3");
        $descrip1= $this->input->post("txtDescribete3");
        $raza1 = $this->input->post("raza3");
        $user = $this->input->post("user");
        $equipo = $this->Equipo->getEquipoxUser($user);
        $jugador1 = new Jugador(0, $equipo, $nombre1, $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
        
        $this->Jugador->insertJugadores($jugador1);
        $this->Cargar();

    }


//-------------------------------

public function Cargar(){
        $usuario = $this->input->post('user');
        $this->load->Model("Torneo");
        $this->load->Model("Equipo");
        $this->load->Model("Jugador");
        $this->load->Model("TorneoEquipo");
        $mensje = 0;
        $equipo =  $this->Equipo->getEquipoxUser($usuario);
        if($equipo!=null){
             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipo->get_nombre());
            
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
             $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = null;
             $mensajeExitoModificacionEquipo = null;
             $mensajeEliminacioEquipo=null;
             $data['user']=$usuario;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipo;
             $data['mensaje']=$mensje;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['listaJugadores']=$listajugadores;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
              $this->load->view('inicio',$data);
        }else{
            $listaTorneoFinal = $this->Torneo->verTorneos();
            $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoFinal);

            $mensajeExitoInsercionEquipo = null;
            $mensajeExitoModificacionEquipo = null;
            $mensajeEliminacioEquipo=null;
            $data['user']=$usuario;
            $data['torneos']=$listaTorneoFinal;
            $data['equipo']=$equipo;
            $data['mensaje']=$mensje;
            $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
            $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
            $data['mensajeEliminacioEquipo']=null;
            $this->load->view('inicio',$data); 

        }
       
        
    }


  public function registrarOtroTorneo(){
      $this->load->model("TorneoEquipo");
      $torneo = $this->input->post("torneo");
      $equipo = $this->input->post("equipo");
      $torneoEquipo = new TorneoEquipo($torneo, $equipo);
      $this->TorneoEquipo->insertarEquipoTorneo($torneoEquipo);

      $this->Cargar();


  }

  public function modificarEquipo(){
        $this->load->Model("Torneo");
        $this->load->Model("Equipo");
        $this->load->Model("TorneoEquipo");
        $this->load->Model("Jugador");
        $nombre=$this->input->post("txtnombreequipoM");
        $raza = $this->input->post("razaM");
        $pagina= $this->input->post("txtpaginaequipoM");
        $ruta = $this->input->post("segunfoM");
        $torneo_id = $this->input->post("torneoM");
        $user = $this->input->post("userM");
        $agent= $_SERVER['HTTP_USER_AGENT'];

	if(strpos($agent,'Chrome')){
            $ruta = $this->tokenizer($ruta);
        }
        if(strpos($agent,'MSIE')){
            $ruta = $this->tokenizer($ruta);
        }   
      if($nombre==""){
             $equipoF= $this->Equipo->getEquipoxUser($user);
             $nombrF = $equipoF->get_nombre();
             $equipo = new Equipo($equipoF->get_nombre(), $equipoF->get_user(), $raza, $pagina,"", "", "", "", "");
             $equipo->updateEquipo($equipo);
             if($ruta!=""){
              copy("uploads/$ruta", "ImageEquipos/$nombrF.png");
              unlink("uploads/$ruta");

              }

             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipoF->get_nombre());
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
             $listaJugadores = $this->Jugador->getJugadoresxEquipo($equipoF);
             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = null;
             $mensajeExitoModificacionEquipo = "Se Hizo la Modificacion Exitosamente";
             
             $data['user']=$user;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipoF;
             $data['mensaje']=$mensje;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['listaJugadores']=$listaJugadores;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['mensajeEliminacioEquipo']=null;
              $this->load->view('inicio',$data);
        
      }else{




        $bool = $this->Equipo->verificarId($nombre);
        $equipoAntiguo = $this->Equipo->getEquipoxUser($user);
        $nombreAntiguo = $equipoAntiguo->get_nombre();
        $listaJugadores = $this->Jugador->getJugadoresxEquipo($equipoAntiguo);
        $listaTorneoEquipo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipoAntiguo->get_nombre());
        $equipoNuevo = $equipoAntiguo;
        if(!$bool){

             $equipoNuevo->set_nombre($nombre);
             $equipoNuevo->set_raza($raza);
             $equipoNuevo->set_pagina($pagina);
             $this->Equipo->insertEquipo($equipoNuevo);
            
             if($listaJugadores!=null){
                foreach($listaJugadores as $jugador){
                    $jugador->set_equipo($equipoNuevo);
                    $this->Jugador->updateJugadorXEquipo($jugador,$nombreAntiguo);
                }
             }

             foreach($listaTorneoEquipo as $torneoEquipo){
                 $torneoEquipo->set_equipo($equipoNuevo->get_nombre());
                 $this->TorneoEquipo->updateEquipoTorneo($torneoEquipo,$nombreAntiguo);
             }
             
             $this->Equipo->deleteCompleteEquipo($nombreAntiguo);
             if($ruta!=""){
             copy("uploads/$ruta", "ImageEquipos/$nombre.png");
             unlink("uploads/$ruta");
             }
             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipoNuevo->get_nombre());
              $listajugadores = $this->Jugador->getJugadoresxEquipo($equipoNuevo);
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);

             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = null;
             $mensajeExitoModificacionEquipo = "Se Hizo la Modificacion Exitosamente";
             $mensajeEliminacioEquipo=null;
             $data['user']=$user;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipoNuevo;
             $data['mensaje']=$mensje;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['listaJugadores']=$listaJugadores;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['$mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
              $this->load->view('inicio',$data);
              
              

        }else{

             $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipoAntiguo->get_nombre());
              $listajugadores = $this->Jugador->getJugadoresxEquipo($equipoAntiguo);
             $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
             $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
             $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
             $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
             $mensje = 1;
             $mensajeExitoInsercionEquipo = null;
             $mensajeExitoModificacionEquipo = "No se Registro. Existe otro Equipo con el mismo Nombre";
             $mensajeEliminacioEquipo=null;
             $data['user']=$user;
             $data['torneos']=$listaTorneoFinal;
             $data['equipo']=$equipoAntiguo;
             $data['mensaje']=$mensje;
             $data['listaTorneoEliminar']=$listaTorneoEliminar;
             $data['listaJugadores']=$listaJugadores;
             $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
             $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
             $data['$mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
             $this->load->view('inicio',$data);

        }
      }
  }



  public function eliminarEquipo(){
         $this->load->Model("Torneo");
         $this->load->Model("TorneoEquipo");
         $this->load->Model("Equipo");
         $user = $this->input->post("user");
         $torneo = $this->input->post("eli");
         $equipo= $this->Equipo->getEquipoxUser($user);
         $this->TorneoEquipo->eliminarTorneoEquipo($torneo,$equipo->get_nombre());
         $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);

         $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipo->get_nombre());

         $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
         $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
         $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
         $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
         $mensje = 1;
         $mensajeExitoInsercionEquipo = null;
         $mensajeExitoModificacionEquipo = null;
         $mensajeEliminacioEquipo="El retiro del Torneo Fue Exitoso";
         $data['user']=$user;
         $data['torneos']=$listaTorneoFinal;
         $data['equipo']=$equipo;
         $data['mensaje']=$mensje;
         $data['listaTorneoEliminar']=$listaTorneoEliminar;
         $data['listaJugadores']=$listaJugadores;
         $data['mensajeExitoInsercionEquipo']=$mensajeExitoInsercionEquipo;
         $data['mensajeExitoModificacionEquipo']=$mensajeExitoModificacionEquipo;
         $data['mensajeEliminacioEquipo']=$mensajeEliminacioEquipo;
         $this->load->view('inicio',$data);
  }


   public function eModificar2(){
       $this->load->Model("Torneo");
        $this->load->Model("Jugador");
        $this->load->Model("Equipo");
        $nombre1= $this->input->post("mtxtNombre1");
        $apellido1 = $this->input->post("mtxtApellido1");
        $nick1 = $this->input->post("mtxtNick1");
        $DNI1 = $this->input->post("mtxtDNI1");
        $rank1 = $this->input->post("mrank1");
        $descrip1= $this->input->post("mtxtDescribete1");
        $raza1 = $this->input->post("mraza1");
        $nombre2= $this->input->post("mtxtNombre2");
        $apellido2 = $this->input->post("mtxtApellido2");
        $nick2 = $this->input->post("mtxtNick2");
        $DNI2 = $this->input->post("mtxtDNI2");
        $rank2 = $this->input->post("mrank2");
        $descrip2= $this->input->post("mtxtDescribete2");
        $raza2 = $this->input->post("mraza2");
        $user = $this->input->post("user");
        $jugador1=$this->input->post("jugador1");
        $jugador2=$this->input->post("jugador2");
        $equipo = $this->Equipo->getEquipoxUser($user);

        $jugador1T=$this->Jugador->getJugadorById($jugador1);
        $jugador2T=$this->Jugador->getJugadorById($jugador2);
        $player1=null;
        $player2=null;
        
        if($nombre1=="" && $nombre2==""){
            $player1 = new Jugador($jugador1, $equipo,$jugador1T->get_nombre(), $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
            $player2 = new Jugador($jugador2, $equipo,$jugador2T->get_nombre(), $apellido2, $nick2, $DNI2, $raza2, $rank2, $descrip2);
        }
        if($nombre1==""  && $nombre2!=""){
            $player1 = new Jugador($jugador1, $equipo,$jugador1T->get_nombre(), $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
            $player2 = new Jugador($jugador2, $equipo,$nombre2, $apellido2, $nick2, $DNI2, $raza2, $rank2, $descrip2);
        }
        if($nombre1!="" && $nombre2==""){
            $player1 = new Jugador($jugador1, $equipo,$nombre1, $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
            $player2 = new Jugador($jugador2, $equipo,$jugador2T->get_nombre(), $apellido2, $nick2, $DNI2, $raza2, $rank2, $descrip2);

        }
        if($nombre1!="" && $nombre2!=""){
             $player1 = new Jugador($jugador1, $equipo,$nombre1, $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
             $player2 = new Jugador($jugador2, $equipo,$nombre2, $apellido2, $nick2, $DNI2, $raza2, $rank2, $descrip2);
        }
        $this->Jugador->updateJugador($player1);
        $this->Jugador->updateJugador($player2);
        $this->Cargar();
   }

   public function eModificar1(){
       $this->load->Model("Torneo");
        $this->load->Model("Jugador");
        $this->load->Model("Equipo");
        $nombre1= $this->input->post("mtxtNombre3");
        $apellido1 = $this->input->post("mtxtApellido3");
        $nick1 = $this->input->post("mtxtNick3");
        $DNI1 = $this->input->post("mtxtDNI3");
        $rank1 = $this->input->post("mrank3");
        $descrip1= $this->input->post("mtxtDescribete3");
        $raza1 = $this->input->post("mraza3");
        $jugador=$this->input->post("jugador");
        $user = $this->input->post("user");
        $equipo = $this->Equipo->getEquipoxUser($user);
        $playerT = $this->Jugador->getJugadorById($jugador);
        $player = null;
        if($nombre1==""){
            $player = new Jugador($jugador, $equipo, $playerT->get_nombre(), $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);

        }else{
           $player = new Jugador($jugador, $equipo, $nombre1, $apellido1, $nick1, $DNI1, $raza1, $rank1, $descrip1);
        $this->Jugador->updateJugador($player);
        $this->Cargar();
        }
   }

   public function eliminar(){
         $this->load->Model("Torneo");
        $this->load->Model("Jugador");
        $this->load->Model("Equipo");
        $user = $this->input->post("user");
        $equipo = $this->Equipo->getEquipoxUser($user);
        $id = $this->input->post("selecEquipo");
        $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
        switch ($id) {
            case 0:
                foreach($listajugadores as $jugador){
                        $this->Jugador->deleteJugador($jugador->get_id());
                }
                break;
            default:
                $this->Jugador->deleteJugador($id);
                break;
        }
        $this->Cargar();
   }

   
}
?>
