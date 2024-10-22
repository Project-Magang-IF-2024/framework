<?php

Class Ujian extends MX_Controller {

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
				->from('tblujianproposal')
				->get()
				->result();
			
			$this->template->load('template', 'ujian/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblujianproposal')->like('judulnya_proposal', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','ujian/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblproposal')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','ujian/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'ujian/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judulnya_proposal', 'Judul Proposal', 'required');
		$this->form_validation->set_rules('periode_ujian_proposal', 'Periode Proposal', 'required');
		$this->form_validation->set_rules('kode_ujian_proposal', 'Kode Ujian Proposal', 'required');
		$this->form_validation->set_rules('nim_ujian_proposal', 'NIM Mahasiswa', 'required');
		$this->form_validation->set_rules('tgl_ujian_proposal', 'Tanggal Ujian Proposal', 'required');
		$this->form_validation->set_rules('hari_ujian_proposal', 'Hari Ujian Proposal', 'required');
		$this->form_validation->set_rules('jam_ujian_proposal', 'Jam Ujian Proposal', 'required');
		$this->form_validation->set_rules('ruang_ujian_proposal', 'Ruang Ujian Proposal', 'required');
		$this->form_validation->set_rules('nik_pbb1_ujian_proposal', 'NIK Pembimbing 1', 'required');
		$this->form_validation->set_rules('nik_pbb2_ujian_proposal', 'NIK Pembimbing 2', 'required');
		$this->form_validation->set_rules('revisi_pbb1', 'Revisi PBB1', 'required');
		$this->form_validation->set_rules('revisi_pbb2', 'Revisi PBB2', 'required');
		$this->form_validation->set_rules('revisi_puji1', 'Revisi PPUJI1', 'required');
		$this->form_validation->set_rules('revisi_puji2', 'Revisi PPUJI2', 'required');

		if ($this->form_validation->run() == TRUE) {
			// Prepare data for insertion
			$data = array(
				'judulnya_proposal' => $this->input->post('judulnya_proposal'),
				'periode_ujian_proposal' => $this->input->post('periode_ujian_proposal'),
				'kode_ujian_proposal' => $this->input->post('kode_ujian_proposal'),
				'nim_ujian_proposal' => $this->input->post('nim_ujian_proposal'),
				'tgl_ujian_proposal' => $this->input->post('tgl_ujian_proposal'),
				'hari_ujian_proposal' => $this->input->post('hari_ujian_proposal'),
				'jam_ujian_proposal' => $this->input->post('jam_ujian_proposal'),
				'ruang_ujian_proposal' => $this->input->post('ruang_ujian_proposal'),
				'nik_pbb1_ujian_proposal' => $this->input->post('nik_pbb1_ujian_proposal'),
				'nik_pbb2_ujian_proposal' => $this->input->post('nik_pbb2_ujian_proposal'),
				'revisi_pbb1' => $this->input->post('revisi_pbb1'),
				'revisi_pbb2' => $this->input->post('revisi_pbb2'),
				'revisi_puji1' => $this->input->post('revisi_puji1'),
				'revisi_puji2' => $this->input->post('revisi_puji2'),
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
			$this->template->load('template', 'ujian/add', $data);
		}
	}
    
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'judulnya_proposal'                => $this->input->post('judulnya_proposal'),
				'periode_ujian_proposal'           => $this->input->post('periode_ujian_proposal'),
				'kode_ujian_proposal'            => $this->input->post('kode_ujian_proposal'),
				'nim_ujian_proposal'         => $this->input->post('nim_ujian_proposal'),
				'tgl_ujian_proposal'   => $this->input->post('tgl_ujian_proposal'),
				'hari_ujian_proposal'  => $this->input->post('hari_ujian_proposal'),
				'jam_ujian_proposal'  => $this->input->post('jam_ujian_proposal'),
				'ruang_ujian_proposal'         => $this->input->post('ruang_ujian_proposal'),
				'nik_pbb1_ujian_proposal'          => $this->input->post('nik_pbb1_ujian_proposal'),
				'nik_pbb2_ujian_proposal'          => $this->input->post('nik_pbb2_ujian_proposal'),
				'revisi_pbb1'          => $this->input->post('revisi_pbb1'),
				'revisi_pbb2'          => $this->input->post('revisi_pbb2'),
				'revisi_puji1'          => $this->input->post('revisi_puji1'),
				'revisi_puji2'          => $this->input->post('revisi_puji2'),
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblujianproposal', $data); // Adjust table name to 'tblproposal'
			redirect('ujian');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblujianproposal', array('id' => $id))->row_array(); // Adjust 'id_mahasiswa' to 'id'
			$data['periode_list'] = $this->db->get('tblthnakademik')->result_array();
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'ujian/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tblujianproposal.*, tblmahasiswa.*, tblprodi.nama_prodi')
			->from('tblujianproposal')
			->join('tblmahasiswa', 'tblmahasiswa.nim = tblujianproposal.nim_ujian_proposal')
			->join('tblprodi', 'tblprodi.kode_prodi = tblmahasiswa.prodi_mhs')
			// ->join('tblprodi', 'tblproposal.prodi_prop = tblprodi.kode_prodi')
			// ->join('tbldosen', 'tbldosen.nik_dosen = tblproposal.nik_pembimbing1')
			->where('tblujianproposal.id', $id_peserta)
			->get()
			->row_array();
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'ujian/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblujianproposal');
        }
        redirect('ujian');
    }

}