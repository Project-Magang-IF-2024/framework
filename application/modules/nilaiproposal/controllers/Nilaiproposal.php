<?php

Class Nilaiproposal extends MX_Controller {

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
				->from('tblnilaiproposal')
				// ->join('tblprodi', 'tblprodi.kode_prodi = tblprodi.nama_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			
			$this->template->load('template', 'nilaiproposal/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblnilaiproposal')->like('judul_proposal', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','nilaiproposal/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblnilaiproposal')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','nilaiproposal/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'nilaiproposal/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kode_ujian_proposal', 'Kode Ujian Proposal', 'required');
		$this->form_validation->set_rules('dosen', 'Dosen', 'required');

		if ($this->form_validation->run() == TRUE) {
			$nim_prop = $this->input->post('nim_prop');
			

			// Prepare data for insertion
			$data = array(
				'kode_ujian_proposal' => $this->input->post('kode_ujian_proposal'),
				'dosen' => $this->input->post('dosen')
			);
	
			// Insert data into `tblnilaiproposal`
			$this->db->insert('tblnilaiproposal', $data);
			$this->session->set_flashdata('success', 'Proposal berhasil ditambahkan.');
			redirect('nilaiproposal');
		} else {
			// Load form and get list of prodi
			$data['kode_ujian_proposal'] = $this->db->get('tblujianproposal')->result_array();
			$this->template->load('template', 'nilaiproposal/add', $data);
		}
	}
	
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'kode_ujian_proposal' => $this->input->post('kode_ujian_proposal'),
				'dosen' => $this->input->post('dosen')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblnilaiproposal', $data); // Adjust table name to 'tblnilaiproposal'
			redirect('nilaiproposal');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['kode_ujian_proposal'] = $this->db->get('tblujianproposal')->result_array();
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'nilaiproposal/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tblnilaiproposal.*, tblmahasiswa.*, tblprodi.*, tbldosen.*')
			->from('tblnilaiproposal')
			// ->join('tblmahasiswa', 'tblmahasiswa.nim = tblnilaiproposal.nim_prop')
			// ->join('tblprodi', 'tblnilaiproposal.prodi_prop = tblprodi.kode_prodi')
			// ->join('tbldosen', 'tbldosen.nik_dosen = tblnilaiproposal.nik_pembimbing1')
			->where('tblnilaiproposal.id', $id_peserta)
			->get()
			->row_array();
		
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'nilaiproposal/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblnilaiproposal');
        }
        redirect('nilaiproposal');
    }

}