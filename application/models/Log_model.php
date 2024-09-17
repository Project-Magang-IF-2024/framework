<?php 
class Log_model extends CI_Model {
   
function tulislog($kegiatan,$id_peserta) {
          $data = array(
        'kegiatan'=>$kegiatan,
        'id_peserta'=>$id_peserta
    );

    $this->db->insert('log',$data);
    }


}
