<?php

Class CatatanBimbingan extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'mahasiswa') {
			// Admin can see all students, with JOIN to get `nama_prodi` from `tblprodi`
			$data['data'] = $this->db->select('*')
				->from('tblbimbinganproposal')
				->where('kd_prop', $this->session->userdata('kd_prop'))
				->get()
				->result();
			$this->template->load('templatepeserta', 'catatanbimbingan/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'dosen') {
			$data['data'] = $this->db->select('*')->from('tblmahasiswa')->get()->result(); 
			//Query Data mahasiswa yang proposal nya dibimbing oleh dosen yang login beserta info proposalnya
			$this->template->load('templatepeserta','catatanbimbingan/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblbimbinganproposal')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templatepeserta','catatanbimbingan/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('tblbimbinganproposal',array('id_bimbingan'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('templatepeserta', 'catatanbimbingan/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		if ($this->input->post('submit')) {
			// Prepare data for insertion
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama_mhs' => $this->input->post('nama_mhs'),
				'nik_mhs' => $this->input->post('nik_mhs'),
				'gender_mhs' => $this->input->post('gender_mhs'),
				'tempat_lahir_mhs' => $this->input->post('tempat_lahir_mhs'),
				'tanggal_lahir_mhs' => $this->input->post('tanggal_lahir_mhs'),
				'alamat_mhs' => $this->input->post('alamat_mhs'),
				'no_hp_mhs' => $this->input->post('no_hp_mhs'),
				'email_mhs' => $this->input->post('email_mhs'),
				'prodi_mhs' => $this->input->post('prodi_mhs'),
				'angkatan' => $this->input->post('angkatan'),
				'username_mhs' => $this->input->post('username_mhs'),
				'password_mhs' => $this->input->post('password_mhs')
			);
	
			// Insert data into `tblmahasiswa`
			$this->db->insert('tblmahasiswa', $data);
			redirect('mahasiswa');
		} else {
			// Load form and get list of prodi
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array(); // Assuming you have a tblprodi table
			$this->template->load('templatepeserta', 'catatanbimbingan/add', $data);
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
				$this->template->load('templatepeserta', 'catatanbimbingan/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		 $id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('tblmahasiswa',array('id'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('templatepeserta', 'catatanbimbingan/lihat',$data);
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
        redirect('catatanbimbingan');
    }

}