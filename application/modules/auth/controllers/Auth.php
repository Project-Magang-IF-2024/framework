<?php 

class Auth extends MX_Controller {
    
	public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'error' => $error
        );
        $this->load->view('login3', $data);
    }
    
    public function forgot() {
        $this->load->view('lupa');
    }
    
    public function sukses() {
        $this->load->view('sukses');
    }
    
    public function login() {
        $this->load->model('auth_model');
    
        // Get email and password from input
        $email = $this->input->post('text');
        $password = $this->input->post('password');
    
        // Check if the user is an admin
        $cekloginadmin = $this->auth_model->loginadmin($email, $password);
        if ($cekloginadmin == 1) {
            // Admin login
            $row = $this->auth_model->data_login_admin($email, $password);
            $data = array(
                'logged' => TRUE,
                'login_status' => 'admin',
                'nama' => $row->username,
                'id' => $row->id
            );
            $this->session->set_userdata($data);
            $this->handleRememberMe($email, $password);
    
            redirect('auth/sukses');
        }
    
        // Check if the user is a Dosen
        $ceklogindosen = $this->auth_model->logindosen($email, $password);
        if ($ceklogindosen == 1) {
            // Dosen login
            $row = $this->auth_model->data_login_dosen($email, $password);
            $data = array(
                'logged' => TRUE,
                'login_status' => 'dosen',
                'nama' => $row->username_dosen,
                'id' => $row->id
            );
            $this->session->set_userdata($data);
            $this->handleRememberMe($email, $password);
    
            redirect('auth/sukses');
        }
    
        // Check if the user is a Mahasiswa
        $cekloginmahasiswa = $this->auth_model->loginmahasiswa($email, $password);
        if ($cekloginmahasiswa == 1) {
            // Mahasiswa login
            $row = $this->auth_model->data_login_mahasiswa($email, $password);
            $data = array(
                'logged' => TRUE,
                'login_status' => 'mahasiswa',
                'nama' => $row->nama_mhs,
                'id' => $row->id
            );
            $this->session->set_userdata($data);
            $this->handleRememberMe($email, $password);
    
            redirect('auth/sukses');
        }
    
        // Handle login errors
        $this->handleLoginError($email, $password);
    }
    
    private function handleRememberMe($email, $password) {
        if (!empty($this->input->post("remember"))) {
            setcookie("loginId", $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie("loginPass", $password, time() + (10 * 365 * 24 * 60 * 60));
        } else {
            setcookie("loginId", "");
            setcookie("loginPass", "");
        }
    }
    
    private function handleLoginError($email, $password) {
        $error = '';
    
        if ($email == null && $password == null) {
            $error = 'Silahkan Memasukkan Username dan Password';
        } elseif ($this->auth_model->check_email_exists($email) == false) {
            $error = 'Data anda tidak terdaftar dalam sistem.';
        } else {
            $error = 'Username dan Password Tidak Sesuai';
        }
    
        $this->session->set_flashdata('error', $error);
        $this->index($error);
    }
    

    function logout() {
          
//        destroy session
        $this->session->sess_destroy();
      
//        redirect ke halaman login
        redirect(site_url());
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */