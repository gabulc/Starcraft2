<?php

class User extends CI_Model{
   private $_user;
   private $_password;
   private $_email;
   public function __construct($user="",$password="",$email="") {
       parent::__construct();
       $this->_user = $user;
       $this->_password = $password;
       $this->_email= $email;
   }
   public function get_user() {return $this->_user;}
   public function get_password() {return $this->_password;}
   public function get_email() {return $this->_email;}
   
   public function getAll(){
        $query = $this->db->get('usuarios');
        $lista = $query->result();
        $listaUsers = array();
        foreach($lista as $user){
            $username= $user->user;
            $password = $user->password;
            $email = $user->email;
            $listaUsers[] = new User($username, $password, $email);
        }
        return $listaUsers;
    }
    public function getAdminByUsername($user){
        $users = $this->getAll();
        foreach($users as $u){   
            if($u->_user == $user)
                return $u;
        }
        return false;
    }
    public function log_in($user,$password){
        $usuario = $this->getAdminByUsername($user);
        if($usuario != null){
            $pass = md5($password);
            if($user==null || $password==null){
                return "Usuario o Contraseña no ingresada.";
            }elseif($usuario->_password == $pass){
                    return ' ';
                }
                else{
                    return "La contraseña es incorrecta.";
                }
        }else
            return "El usuario no existe.";
    }
    public function enviarInfoToEmail($email){
        $users = $this->getAll();
        foreach($users as $u){
            if($u->_email == $email){
                return true;
            }
        }
        return false;
    }
    public function registrarse($user,$password,$email){
        $pass=md5($password);
        $data=array('user'=>$user,
                    'password'=>$pass,
                    'email'=>$email
        );
        $this->db->insert('usuarios',$data);
    }

}
?>
