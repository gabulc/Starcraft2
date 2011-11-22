<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginControl extends CI_Controller{
    public function LoginControl(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Administrador','',true);
        $this->load->model('Torneo','',true);
        $this->load->model('Equipo','',true);
        $this->load->model('Partida','',true);
        $this->load->model('Noticia','',true);
    }
    public function index()
    {
        $datos['title']= 'Starcraft II Torneos - Administrador';
        $datos['mensaje']= ' ';
        $datos['msjError'] = ' ';
        $this->load->view('login',$datos);
        
    }
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $login = $this->Administrador->log_in($username, $password);
        $adm = $this->Administrador->getAdminByUsername($username);
        
        $torneos = $this->Torneo->verTorneos();
        
        $data['title']= 'Starcraft II Torneos - Administrador';
        $data['mensaje']= ' ';
        $data['msjError'] = $login;
        
        $datos['title']='Starcraft II Torneos - Administrador';
        if($adm!=null)
            $datos['nombreCompleto'] = $adm->getNombre().' '.$adm->getApellido();
        $datos['username'] = $username;
        
        //Noticias
        $noticias = $this->Noticia->verNoticias();
        $datos['noticias'] = $noticias;
        $datos['noticia']=null;
        //Torneo
        $torneos = $this->Torneo->verTorneos();
        $torneosLlenos=$this->Torneo->getTorneosLlenos();
        $torneosLlenosC= $this->Torneo->getTorneosLlenosParaEmpezar();
        $datos['torneos'] = $torneos;
        $datos['torneosLlenos'] = $torneosLlenos;
        $datos['torneosLlenosC'] = $torneosLlenosC;
        $datos['torneo']=null;
        $datos['equipos']=null;
        //Partidas
        $partidas = $this->Partida->verPartidas();
        $datos['partidas'] = $partidas;
        $datos['partida']=null;
        $datos['partidasReplay'] = null;
        
        if($login==' '){
            $arregloUser = array('usuario'=>$adm->getUsername(),
                            'nombre'=>$adm->getNombre(),
                            'apellido'=>$adm->getApellido(),
                            'logged_in' => true);
            $this->session->set_userdata($arregloUser);
            $this->load->view('inicio',$datos);
        }else{
            $this->load->view('login',$data);
        }
    }
    
    public function enviarEmail(){
        $this->load->model('Administrador','',true);
        
        $email = $this->input->post('email');

        $estado = $this->Administrador->enviarInfoToEmail($email);
        
        if($estado == true){
            $message = 'Revisa tu Email. Te hemos mandado informaci&#243n.';
        }else
            $message = 'El email no existe.';
        
        $data['title']= 'Starcraft II Torneos - Administrador';
        $data['mensaje']= $message;
        $data['msjError'] = ' ';
        $this->load->view('login',$data);
        
    }
    public function logout(){
        $data['title']= 'Starcraft II Torneos - Administrador';
        $data['mensaje']= ' ';
        $data['msjError'] = ' ';
        $this->session->sess_destroy();
        $this->load->view('login',$data);
    }
}

?>
