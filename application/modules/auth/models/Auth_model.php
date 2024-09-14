<?php 
class Auth_model extends CI_Model {
   
function loginadmin($email,$password) {
        $this->db->where('username', $email);
        $this->db->where('password', $password);
        $query =  $this->db->get('user');
        return $query->num_rows();
    }

    
//    untuk mengambil data hasil login
		
	function data_login_admin($email,$password) {
		$this->db->select('*');
		$this->db->from('user');
        $this->db->where('username', $email);
        $this->db->where('password', $password);
        return $this->db->get()->row();
    }

	
}
