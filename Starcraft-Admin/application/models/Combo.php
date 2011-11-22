<?php

class Combo extends CI_Model {
    public function llenar_combo_equipos($torneoId){
         $query="SELECT * FROM equipos where torneoId= ".$torneoId;
         $lista=$this->db->query($query, $torneoId);
         if($lista->num_rows()>0){
            $output="<option value='0'>- Selecciona Equipo -</option>";
            foreach($lista->result() as $equipo){
                $combo_equipo.="<option value='".$equipo->getId()."'>".$equipo->getNombre()."</option>";
            }
         }else{
            $combo_equipo="No hay Resultados";
         }
         echo $combo_equipo;
    }
}

?>
