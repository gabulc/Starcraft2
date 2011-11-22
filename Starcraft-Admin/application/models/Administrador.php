<?php

class Administrador extends CI_Model{
    private $_username;
    private $_password;
    private $_nombre;
    private $_apellido;
    private $_email;
    
    public function __construct($username="",$password="",$nombre="",$apellido="",$email="") {
        parent::__construct();
        $this->_username=$username;
        $this->_password=$password;
        $this->_nombre=$nombre;
        $this->_apellido=$apellido;
        $this->_email=$email;
    }
    public function getUsername(){return $this->_username;}
    public function getPassword(){return $this->_password;}
    public function getNombre(){return $this->_nombre;}
    public function getApellido(){return $this->_apellido;}
    public function getEmail(){return $this->_email;}
    
    public function getAll(){
        $query = $this->db->get('administradores');
        $lista = $query->result();
        $listaAdmin = array();
        foreach($lista as $adm){
            $username= $adm->username;
            $password = $adm->password;
            $nombre = $adm->nombre;
            $apellido = $adm->apellido;
            $email = $adm->email;
            $listaAdmin[] = new Administrador($username, $password, $nombre, $apellido, $email);
        }
        return $listaAdmin;
    }
    public function getAdminByUsername($username){
        $admins = $this->getAll();
        foreach($admins as $adm){   
            if($adm->_username== $username)
                return $adm;
        }
    }
    public function log_in($username,$password){
        $adm = $this->getAdminByUsername($username);
        if($adm != null){
            $pass = md5($password);
            if($username==null || $password==null){
                return "Usuario o Contrase&ntildea no ingresada.";
            }elseif($adm->_password==$pass){
                    return ' ';
                }
                else{
                    return "La contrase&ntildea es incorrecta.";
                }
        }else
            return "El usuario no existe.";
        
    }
    public function enviarInfoToEmail($email){
        $admins = $this->getAll();
        foreach($admins as $adm){
            if($adm->_email == $email){
                
                return true;
            }
        }
        return false;
    }
    
}

?>
