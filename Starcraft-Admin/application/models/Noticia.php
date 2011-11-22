<?php

class Noticia extends CI_Model {
    private $_id;
    private $_titulo;
    private $_descripcion;
    private $_imagen;
    private $_destacada;
    
    public function __construct($id = "", $titulo = "", $descripcion = "", $imagen="", $destacada="" ) {
        parent::__construct();
        $this->_id = $id;
        $this->_titulo = $titulo;
        $this->_descripcion = $descripcion;
        $this->_imagen = $imagen;
        $this->_destacada = $destacada;
    }
    
    public function getId() {return $this->_id;}
    public function getTitulo() {return $this->_titulo;}
    public function getDescripcion() {return $this->_descripcion;}
    public function getImagen() {return $this->_imagen;}
    public function getDestacada(){return $this->_destacada;}

    public function crearNoticia(Noticia $noticia){
        $data=array(
            'id'=>$noticia->getId(),
            'titulo'=>$noticia->getTitulo(),
            'descripcion'=>$noticia->getDescripcion(),
            'imagen'=>$noticia->getImagen(),
        );
        $this->db->insert('noticias',$data);
    }
    
    public function verNoticias(){
        $query = $this->db->get("noticias");
        $lista = $query->result();
        $listaNoticias = array();
        foreach($lista as $noticia){
            $id= $noticia->id;
            $titulo=$noticia->titulo;
            $descripcion = $noticia->descripcion;
            $imagen = $noticia->imagen;
            $destacada = $noticia->destacada;
            $listaNoticias[] = new Noticia($id, $titulo, $descripcion, $imagen,$destacada);
        }
        return $listaNoticias;
    }
    
    public function modificarNoticia(Noticia $noticia){
        $data=array(
            'titulo'=>$noticia->getTitulo(),
            'descripcion'=>$noticia->getDescripcion(),
            'imagen'=>$noticia->getImagen()
        );
        $this->db->where('id',$noticia->getId());
        $this->db->update('noticias',$data);
    }

    public function destacarNoticia($id){
        $temp = $this->getNoticiaById($id);
        if(is_object($temp)){
        $data=array(
            'destacada'=>1
        );
        $this->db->where('id',$temp->getId());
        $this->db->update('noticias',$data);
        }else return false;
    }
    
    public function removerNoticias(){
        $lista = $this->verNoticias();
        foreach($lista as $temp){
            $data=array(
                'titulo'=>$temp->getTitulo(),
                'descripcion'=>$temp->getDescripcion(),
                'imagen'=>$temp->getImagen(),
                'destacada'=>0
            );
            $this->db->where('id',$temp->getId());
            $this->db->update('noticias',$data);
        }
    }
    
    public function eliminarNoticia($id){
        $this->db->where('id',$id);
        $this->db->delete("noticias");
    }
    
    public function getNoticiaById($id){
        $noticias = $this->verNoticias();
        foreach($noticias as $n){
            if($n->getId() == $id)
                return $n;
        }
        return false;
    }
    public function getMaxNoticia(){
        $query = $this->db->select_max('id');
       $query = $this->db->get('noticias');
       $list = $query->result();
       foreach($list as $d){
           $id = $d->id;
       }
       return $id;
    }
}

?>
