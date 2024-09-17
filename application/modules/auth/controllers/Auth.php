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
		$cekloginadmin = $this->auth_model->loginadmin($this->input->post('email'), $this->input->post('password'));
         if ($cekloginadmin == 1) {
		//ambil detail data
		$row = $this->auth_model->data_login_admin($this->input->post('email'), $this->input->post('password'));
            //daftarkan session
            $data = array(
                'logged' => TRUE,
				'login_status' => 'admin',
				'nama' => $row->username,
				
				'id' => $row->id
            );
            $this->session->set_userdata($data);
            // remember me
                    if(!empty($this->input->post("remember"))) {
                      setcookie ("loginId", $this->input->post('email'), time()+ (10 * 365 * 24 * 60 * 60));  
                      setcookie ("loginPass", $this->input->post('password'),  time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                      setcookie ("loginId",""); 
                      setcookie ("loginPass","");
                    }
         
//            redirect ke halaman sukses
            redirect('auth/sukses');
		} else {
//            tampilkan pesan error
            $email = $this->db->select('*')->from('mahasiswa')->where('email',$this->input->post('email'))->get()->num_rows();
            
            if($this->input->post('email') == null && $this->input->post('password') == null){
                $error = 'Silahkan Memasukkan Username dan Password';
                $this->session->set_flashdata('error',$error);
            }
            
            else if($email == null){
                $error = 'Data anda tidak terdaftar dalam sistem.';
                $this->session->set_flashdata('error',$error);
            }
            else {
            $error = 'Username dan Password Tidak Sesuai';
            $this->session->set_flashdata('error',$error);
            }
           $error = 'Cek lagi Username/Password yang anda masukkan';
            
            $this->index($error);
        }
		
	
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