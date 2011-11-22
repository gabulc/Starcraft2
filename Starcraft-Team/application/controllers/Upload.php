<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function Upload(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
  
    public function do_upload()
    {
    $config['upload_path'] = './ImageEquipos/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '9999999999';
    $config['max_width'] = '200';
    $config['max_height'] = '300';
    //$_FILES['userfile']['tmp_name']= $this->input->post("segunfo");
    //$_FILES['userfile']['name']= "sdss";
    var_dump( $_FILES['userfile']['tmp_name']);
    $this->load->library('upload', $config);
   


    
    if(!$this->upload->do_upload()){
        var_dump($this->upload->display_errors());
        $error=array('error'=>$this->upload->display_errors());
        $this->load->view('Inicio.html',$error);
    }else{


    }


    }
}
?>
