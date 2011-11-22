<?php

class LoginControl extends CI_Controller{
    public function LoginControl(){
        parent::__construct();
        $this->load->model('User','',true);
        $this->load->model('Torneo','',true);
        $this->load->Model("Equipo",'',true);
        $this->load->Model("Jugador",'',true);
        $this->load->Model("TorneoEquipo",'',true);
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->User->log_in($username, $password);
        $arregloUser = array('logged_in' => true);
        $this->session->set_userdata($arregloUser);
        if($login==' '){
            $mensje = 0;
            $equipo =  $this->Equipo->getEquipoxUser($username);
            if($equipo!=null){
                 $listaEquipoTorneo = $this->TorneoEquipo->getTorneoEquipoByEquipo($equipo->get_nombre());

                 $listaTorneoDiffer = $this->Torneo->getTorneoDiffer($listaEquipoTorneo);
                 $listajugadores = $this->Jugador->getJugadoresxEquipo($equipo);
                 $listaTorneoFinal = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoDiffer);
                 
                 $listaTorneoEliminar = $this->Torneo->getListaTorneo($listaEquipoTorneo);
                 $listaTorneoEliminar = $this->Torneo->getTorneosDesmatricula($listaTorneoEliminar);
                 $mensje = 1;
                 $datos['user']=$username;
                 $datos['torneos']=$listaTorneoFinal;
                 $datos['equipo']=$equipo;
                 $datos['mensaje']=$mensje;
                 $datos['listaTorneoEliminar']=$listaTorneoEliminar;
                 $datos['listaJugadores']=$listajugadores;
                 $datos['mensajeExitoInsercionEquipo']=null;
                 $datos['mensajeExitoModificacionEquipo']=null;
                 $datos['mensajeEliminacioEquipo']=null;
                 $this->load->view('inicio',$datos);
            }else{
                $listaTorneoFinal = $this->Torneo->verTorneosEnEspera();

                $listaTorneoFinal2 = $this->TorneoEquipo->countEquiposxTorneo($listaTorneoFinal);
                
                $datos['user']=$username;
                $datos['torneos']=$listaTorneoFinal2;
                $datos['equipo']=$equipo;
                $datos['mensaje']=$mensje;
                $datos['mensajeExitoInsercionEquipo']=null;
                $datos['listaJugadores']=null;
                $datos['listaTorneoEliminar']=null;
                $datos['mensajeExitoModificacionEquipo']=null;
                $datos['mensajeEliminacioEquipo']=null;
                $this->load->view('inicio',$datos); 
            }
        }else{
            $data['mensajeEmail']= ' ';
            $data['mensajeLogin'] = $login;
            $data['mensajeRegistro'] = ' ';
            $this->load->view('login',$data);
        }      
        
    }
    
    public function enviarEmail(){
        $email = $this->input->post('email');

        $estado = $this->User->enviarInfoToEmail($email);
        
        if($estado == true){
            $message = 'Revisa tu Email. Te hemos mandado informaci&#243n.';
        }else
            $message = 'El email no existe.';
        $data['mensajeEmail']= $message;
        $data['mensajeLogin'] = ' ';
        $data['mensajeRegistro'] = ' ';
        $this->load->view('login',$data);
    }
    public function logout(){
        $data['mensajeEmail']= ' ';
        $data['mensajeLogin'] = ' ';
        $data['mensajeRegistro'] = ' ';
        $this->session->sess_destroy();
        $this->load->view('login',$data);
    }
    public function registrarse(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $email = $this->input->post('mail');
        if($username!=null && $email!=null && $password!=null && $password2!=null){
            if($password==$password2){
                $estado = $this->User->registrarse($username,$password,$email);
                $mensajeRegistro = 'Se ha registrado exitosamente';
            }else{
                $mensajeRegistro = 'No coinciden las contraseñas';
            }    
        }else{
            $mensajeRegistro = 'Falta llenar campos';
        }
        $data['mensajeEmail']= ' ';
        $data['mensajeLogin'] = ' ';
        $data['mensajeRegistro'] = $mensajeRegistro;
        $this->load->view('login',$data);
    }
    
}

?>
