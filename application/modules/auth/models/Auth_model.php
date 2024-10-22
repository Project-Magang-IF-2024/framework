<?php 
class Auth_model extends CI_Model {
   
    // Function to log in admin
    function loginadmin($email, $password) {
        $this->db->where('username', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    // Function to retrieve admin data
    function data_login_admin($email, $password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $email);
        $this->db->where('password', $password);
        return $this->db->get()->row();
    }

    // Function to log in Dosen
    function logindosen($email, $password) {
        $this->db->where('username_dosen', $email);
        $this->db->where('password_dosen', $password);
        $query = $this->db->get('tbldosen');
        return $query->num_rows();
    }

    // Function to retrieve Dosen data
    function data_login_dosen($email, $password) {
        $this->db->select('*');
        $this->db->from('tbldosen');
        $this->db->where('username_dosen', $email);
        $this->db->where('password_dosen', $password);
        return $this->db->get()->row();
    }

    // Function to log in Mahasiswa
    function loginmahasiswa($email, $password) {
        $this->db->where('username_mhs', $email);
        $this->db->where('password_mhs', $password);
        $query = $this->db->get('tblmahasiswa');
        return $query->num_rows();
    }

    // Function to retrieve Mahasiswa data
    function data_login_mahasiswa($email, $password) {
        $this->db->select('*');
        $this->db->from('tblmahasiswa');
        $this->db->where('username_mhs', $email);
        $this->db->where('password_mhs', $password);
        return $this->db->get()->row();
    }

    // Check if email exists (for error handling)
    function check_email_exists($email) {
        // Check in Mahasiswa table
        $this->db->where('username_mhs', $email);
        $query = $this->db->get('tblmahasiswa');
        if ($query->num_rows() == 0) {
            // Check in Dosen table
            $this->db->where('username_dosen', $email);
            $query = $this->db->get('tbldosen');
        }
        return $query->num_rows() > 0;
    }
}
