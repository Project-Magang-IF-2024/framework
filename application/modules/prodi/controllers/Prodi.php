<?php

Class Prodi extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'admin') {
			$data['data'] = $this->db->select('tblprodi.*, tblfakultas.nama_fakultas')
    ->from('tblprodi')
    ->join('tblfakultas', 'tblprodi.kd_fakultas = tblfakultas.kode_fakultas') // Join on the correct field
    ->get()
    ->result();
$this->template->load('template', 'prodi/index', $data);

		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblprodi')->like('nama_fakultas', $this->session->userdata('kode_fakultas'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','prodi/listadmin', $data);
		} else {
			redirect('prodi');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblmahasiswa')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','mahasiswa/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'mahasiswa/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		// Load form validation library
		$this->load->library('form_validation');
	
		// Set form validation rules
		$this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required');
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
		$this->form_validation->set_rules('kd_fakultas', 'Kode Fakultas', 'required');
		$this->form_validation->set_rules('singkatan_prodi', 'Singkatan Prodi', 'required');
	
		if ($this->form_validation->run() == TRUE) {
			// Prepare data for insertion
			$data = array(
				'kode_prodi' => $this->input->post('kode_prodi'),
				'nama_prodi' => $this->input->post('nama_prodi'),
				'kd_fakultas' => $this->input->post('kd_fakultas'),
				'singkatan_prodi' => $this->input->post('singkatan_prodi')
			);
	
			// Insert data into `tblprodi`
			$this->db->insert('tblprodi', $data);
			redirect('prodi');
		} else {
			// Load form and show validation errors
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array();
			$this->template->load('template', 'prodi/add', $data);
		}
	}
	
	
	
	
	
	
	
    
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'nim'                => $this->input->post('nim'),
				'nama_mhs'           => $this->input->post('nama'),
				'nik_mhs'            => $this->input->post('nik'),
				'gender_mhs'         => $this->input->post('gender'),
				'tempat_lahir_mhs'   => $this->input->post('tempat_lahir'),
				'tanggal_lahir_mhs'  => $this->input->post('tanggal_lahir'),
				'alamat_mhs'         => $this->input->post('alamat'),
				'no_hp_mhs'          => $this->input->post('no_hp'),
				'email_mhs'          => $this->input->post('email'),
				'prodi_mhs'          => $this->input->post('kodeprodi'), // assuming 'kodeprodi' is passed as the prodi code
				'angkatan'           => $this->input->post('angkatan'),
				'username_mhs'       => $this->input->post('username'),
				'password_mhs'       => $this->input->post('password')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblmahasiswa', $data); // Adjust table name to 'tblmahasiswa'
			redirect('mahasiswa');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblmahasiswa', array('id' => $id))->row_array(); // Adjust 'id_mahasiswa' to 'id'
	
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'mahasiswa/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		 $id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('tblmahasiswa',array('id'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'mahasiswa/lihat',$data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblmahasiswa');
        }
        redirect('mahasiswa');
    }

}