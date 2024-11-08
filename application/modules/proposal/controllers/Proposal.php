<?php

Class Proposal extends MX_Controller {

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
				->from('tblproposal')
				// ->join('tblprodi', 'tblprodi.kode_prodi = tblprodi.nama_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			
			$this->template->load('template', 'proposal/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblproposal')->like('judul_proposal', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','proposal/listadmin', $data);
		} else if($this->session->userdata('login_status') == 'mahasiswa'){
			$data['data'] = $this->db->select('*')->from('tblproposal')->where('nim_prop', $this->session->userdata());
			$this->template->load('templatepeserta', 'proposal/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblproposal')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','proposal/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'proposal/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul_proposal', 'Judul Proposal', 'required');
		$this->form_validation->set_rules('periode_prop', 'Periode Proposal', 'required');
		$this->form_validation->set_rules('prodi_prop', 'Prodi Mahasiswa', 'required');
		$this->form_validation->set_rules('nim_prop', 'NIM Mahasiswa', 'required');
		$this->form_validation->set_rules('nik_pembimbing1', 'NIK Pembimbing 1', 'required');
		$this->form_validation->set_rules('nik_pembimbing2', 'NIK Pembimbing 2', 'required');
		$this->form_validation->set_rules('nik_kaprodi', 'NIK Kaprodi', 'required');

		if ($this->form_validation->run() == TRUE) {
			$nim_prop = $this->input->post('nim_prop');
			
			// Periksa apakah NIM ada di tblmahasiswa
			$mahasiswa_exists = $this->db->where('nim', $nim_prop)->get('tblmahasiswa')->num_rows() > 0;
			
			if (!$mahasiswa_exists) {
				$this->session->set_flashdata('error', 'NIM tidak ditemukan dalam database mahasiswa.');
				redirect('proposal/add');
				return;
			}

			// Prepare data for insertion
			$kode_prop = substr($this->input->post('periode_prop'), -3).$this->input->post('prodi_prop');
			$data = array(
				'judul_proposal' => $this->input->post('judul_proposal'),
				'periode_prop' => $this->input->post('periode_prop'),
				'prodi_prop' => $this->input->post('prodi_prop'),
				'nim_prop' => $nim_prop,
				'kode_prop' => $kode_prop,
				'nik_pembimbing1' => $this->input->post('nik_pembimbing1'),
				'nik_pembimbing2' => $this->input->post('nik_pembimbing2'),
				'nik_kaprodi' => $this->input->post('nik_kaprodi'),
			);
	
			// Insert data into `tblproposal`
			$this->db->insert('tblproposal', $data);
			$this->session->set_flashdata('success', 'Proposal berhasil ditambahkan.');
			redirect('proposal');
		} else {
			// Load form and get list of prodi
			$data['pembimbing_list1'] = $this->db->get('tbldosen')->result_array();
			$data['pembimbing_list2'] = $this->db->get('tbldosen')->result_array();
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array();
			$data['periode_list'] = $this->db->get('tblthnakademik')->result_array();
			$this->template->load('template', 'proposal/add', $data);
		}
	}
	
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'judul_proposal'                => $this->input->post('judul_proposal'),
				'periode_prop'           => $this->input->post('periode_prop'),
				'prodi_prop'            => $this->input->post('prodi_prop'),
				'nim_prop'         => $this->input->post('nim_prop'),
				'kode_prop'   => $this->input->post('kode_prop'),
				'nik_pembimbing1'  => $this->input->post('nik_pembimbing1'),
				'nik_pembimbing2'         => $this->input->post('nik_pembimbing2'),
				'nik_kaprodi'          => $this->input->post('nik_kaprodi'),
				'acc_kaprodi'          => $this->input->post('acc_kaprodi'),
				// 'prodi_mhs'          => $this->input->post('kodeprodi'), // assuming 'kodeprodi' is passed as the prodi code
				// 'angkatan'           => $this->input->post('angkatan'),
				// 'username_mhs'       => $this->input->post('username'),
				// 'password_mhs'       => $this->input->post('password')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblproposal', $data); // Adjust table name to 'tblproposal'
			redirect('proposal');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblproposal', array('id' => $id))->row_array();
			$data['pembimbing_list1'] = $this->db->get('tbldosen')->result_array();
			$data['pembimbing_list2'] = $this->db->get('tbldosen')->result_array();
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array();
			$data['periode_list'] = $this->db->get('tblthnakademik')->result_array();
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'proposal/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tblproposal.*, tblmahasiswa.*, tblprodi.*, tbldosen.*')
			->from('tblproposal')
			->join('tblmahasiswa', 'tblmahasiswa.nim = tblproposal.nim_prop')
			->join('tblprodi', 'tblproposal.prodi_prop = tblprodi.kode_prodi')
			->join('tbldosen', 'tbldosen.nik_dosen = tblproposal.nik_pembimbing1')
			->where('tblproposal.id', $id_peserta)
			->get()
			->row_array();
		
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'proposal/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblproposal');
        }
        redirect('proposal');
    }

}