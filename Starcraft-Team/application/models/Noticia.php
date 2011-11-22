<?php

class Noticia extends CI_Model {
    private $_id;
    private $_titulo;
    private $_descripcion;
    private $_imagen;
    private $_destacada;
    
    function __construct($id = "", $titulo = "", $descripcion = "", $imagen="", $destacada="" ) {
        parent::__construct();
        $this->_id = $id;
        $this->_titulo = $titulo;
        $this->_descripcion = $descripcion;
        $this->_imagen = $imagen;
        $this->_destacada = $destacada;
    }
    
    function getId() {return $this->_id;}
    function getTitulo() {return $this->_titulo;}
    function getDescripcion() {return $this->_descripcion;}
    function getImagen() {return $this->_imagen;}
    function getDestacada(){return $this->_destacada;}
    
    function verNoticiasDestacadas(){
        $query = $this->db->get("noticias");
        $lista = $query->result();
        $listaNoticias = null;
        foreach($lista as $noticia){
            $id= $noticia->id;
            $titulo=$noticia->titulo;
            $descripcion = $noticia->descripcion;
            $imagen = $noticia->imagen;
            $destacada = $noticia->destacada;
            if($destacada==1){
                $listaNoticias[] = new Noticia($id, $titulo, $descripcion, $imagen);
            }
        }
        return $listaNoticias;
    }
    
    function getNoticiaById($id){
        $noticias = $this->verNoticias();
        foreach($noticias as $n){
            if($n->getId() == $id)
                return $n;
        }
        return false;
    }
}

?>
