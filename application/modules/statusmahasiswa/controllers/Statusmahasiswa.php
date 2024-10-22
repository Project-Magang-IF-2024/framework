<?php

Class Statusmahasiswa extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'admin') {
			// Admin can see all students, with JOIN to get `nama_prodi` from `tblprodi`
			$data['data'] = $this->db->select('*')
				->from('tblstatusmahasiswa')
				// ->join('tblprodi', 'tblprodi.kode_prodi = tblprodi.nama_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			
			$this->template->load('template', 'statusmahasiswa/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblstatusmahasiswa')->like('nim', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','statusmahasiswa/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblstatusmahasiswa')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','statusmahasiswa/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'statusmahasiswa/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'required');
		$this->form_validation->set_rules('status_keaktifan', 'Status Keaktifan', 'required');
		$this->form_validation->set_rules('periode_keaktifan', 'Periode Keaktifkan', 'required');
		$this->form_validation->set_rules('status_beasiswa', 'Status Beasiswa', 'required');
		$this->form_validation->set_rules('periode_beasiswa', 'Periode Beasiswa', 'required');

		if ($this->form_validation->run() == TRUE) {
			$nim = $this->input->post('nim');
			
			// Periksa apakah NIM ada di tblmahasiswa
			$mahasiswa_exists = $this->db->where('nim', $nim)->get('tblmahasiswa')->num_rows() > 0;
			
			if (!$mahasiswa_exists) {
				$this->session->set_flashdata('error', 'NIM tidak ditemukan dalam database mahasiswa.');
				redirect('statusmahasiswa/add?mahasiswa_not_found');
				return;
			}

			// Prepare data for insertion
			$data = array(
				'nim' => $nim,
				'status_keaktifan' => $this->input->post('status_keaktifan'),
				'periode_keaktifan' => $this->input->post('periode_keaktifan'),
				'status_beasiswa' => $this->input->post('status_beasiswa'),
				'periode_beasiswa' => $this->input->post('periode_beasiswa'),
			);
	
			// Insert data into `tblstatusmahasiswa`
			$this->db->insert('tblstatusmahasiswa', $data);
			$this->session->set_flashdata('success', 'statusmahasiswa berhasil ditambahkan.');
			redirect('statusmahasiswa');
		} else {
			// Load form and get list of prodi
			$this->template->load('template', 'statusmahasiswa/add');
		}
	}
	
	
	
	
    
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'nim'                => $this->input->post('nim'),
				'status_keaktifan'           => $this->input->post('status_keaktifan'),
				'periode_keaktifan'            => $this->input->post('periode_keaktifan'),
				'status_beasiswa'         => $this->input->post('status_beasiswa'),
				'periode_beasiswa'   => $this->input->post('periode_beasiswa'),
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblstatusmahasiswa', $data); // Adjust table name to 'tblstatusmahasiswa'
			redirect('statusmahasiswa');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblstatusmahasiswa', array('id' => $id))->row_array(); // Adjust 'id_mahasiswa' to 'id'
	
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'statusmahasiswa/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tblstatusmahasiswa.*, tblmahasiswa.* , tblprodi.nama_prodi, tbldosen.nama_dosen')
			->from('tblstatusmahasiswa')
			->join('tblmahasiswa', 'tblmahasiswa.nim = tblstatusmahasiswa.nim_prop')
			->join('tblprodi', 'tblstatusmahasiswa.prodi_prop = tblprodi.kode_prodi')
			->join('tbldosen', 'tbldosen.nik_dosen = tblstatusmahasiswa.nik_pembimbing1')
			->where('tblstatusmahasiswa.id', $id_peserta)
			->get()
			->row_array();
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'statusmahasiswa/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblstatusmahasiswa');
        }
        redirect('statusmahasiswa');
    }

}