<?php

Class Dosen extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'admin') {
			// Admin can see all students, with JOIN to get `nama_prodi` from `tblprodi`
			$data['data'] = $this->db->select('tbldosen.*, tblprodi.nama_prodi')
				->from('tbldosen')
				->join('tblprodi', 'tbldosen.prodi_homebase = tblprodi.kode_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			$this->template->load('template', 'dosen/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tbldosen')->like('nama_prodi', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','dosen/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tbldosen')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','dosen/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'dosen/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		if ($this->input->post('submit')) {
			// Prepare data for insertion
			$data = array(
				'nik_dosen' 		=> $this->input->post('nik_dosen'),
				'nama_dosen'		=> $this->input->post('nama_dosen'),
				'gelar_depan' 		=> $this->input->post('gelar_depan'),
				'gelar_belakang' 	=> $this->input->post('gelar_belakang'),
				'no_ktp' 			=> $this->input->post('no_ktp'),
				'nidn_dosen' 		=> $this->input->post('nidn_dosen'),
				'nuptk_dosen' 		=> $this->input->post('nuptk_dosen'),
				'gender_dosen' 		=> $this->input->post('gender_dosen'),
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
				'alamat_dosen' 		=> $this->input->post('alamat_dosen'),
				'no_hp_dosen' 		=> $this->input->post('no_hp_dosen'),
				'email_dosen' 		=> $this->input->post('email_dosen'),
				'prodi_homebase' 	=> $this->input->post('prodi_homebase'),
				'jabfung' 			=> $this->input->post('jabfung'),
				'pangkat' 			=> $this->input->post('pangkat'),
				'golongan' 			=> $this->input->post('golongan'),
				'univ_s1' 			=> $this->input->post('univ_s1'),
				'prodi_s1' 			=> $this->input->post('prodi_s1'),
				'univ_s2' 			=> $this->input->post('univ_s2'),
				'prodi_s2' 			=> $this->input->post('prodi_s2'),
				'univ_s3' 			=> $this->input->post('univ_s3'),
				'prodi_s3' 			=> $this->input->post('prodi_s3'),
				'bidang_keahlian' 	=> $this->input->post('bidang_keahlian'),
				'jabatan_dosen' 	=> $this->input->post('jabatan_dosen'),
				'username_dosen' 	=> $this->input->post('username_dosen'),
				'password_dosen' 	=> $this->input->post('password_dosen')
			);
	
			// Insert data into `tbldosen`
			$this->db->insert('tbldosen', $data);
			redirect('dosen');
		} else {
			// Load form and get list of prodi
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array(); // Assuming you have a tblprodi table
			$this->template->load('template', 'dosen/add', $data);
		}
	}
	
	
	
	
    
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
				'alamat_dosen'		=> $this->input->post('alamat_dosen'),
				'no_hp_dosen' 		=> $this->input->post('no_hp_dosen'),
				'email_dosen' 		=> $this->input->post('email_dosen'),
				'prodi_homebase' 	=> $this->input->post('prodi_homebase'),
				'jabfung' 			=> $this->input->post('jabfung'),
				'pangkat' 			=> $this->input->post('pangkat'),
				'golongan' 			=> $this->input->post('golongan'),
				'univ_s1' 			=> $this->input->post('univ_s1'),
				'prodi_s1' 			=> $this->input->post('prodi_s1'),
				'univ_s2' 			=> $this->input->post('univ_s2'),
				'prodi_s2'		 	=> $this->input->post('prodi_s2'),
				'univ_s3' 			=> $this->input->post('univ_s3'),
				'prodi_s3' 			=> $this->input->post('prodi_s3'),
				'bidang_keahlian' 	=> $this->input->post('bidang_keahlian'),
				'jabatan_dosen'	 	=> $this->input->post('jabatan_dosen'),
				'username_dosen' 	=> $this->input->post('username_dosen'),
				'password_dosen' 	=> $this->input->post('password_dosen')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tbldosen', $data); // Adjust table name to 'tblmahasiswa'
			redirect('dosen');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tbldosen', array('id' => $id))->row_array(); // Adjust 'id_mahasiswa' to 'id'
	
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'dosen/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		 $id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('tbldosen',array('id'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'dosen/lihat',$data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tbldosen');
        }
        redirect('dosen');
    }

}