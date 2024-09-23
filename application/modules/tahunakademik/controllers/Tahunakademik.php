<?php

Class Tahunakademik extends MX_Controller {

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
				->from('tbltahunakademik')
				// ->join('tblprodi', 'tblprodi.kode_prodi = tblprodi.nama_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			
			$this->template->load('template', 'tahunakademik/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tbltahunakademik')->like('judul_proposal', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','tahunakademik/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tbltahunakademik')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','tahunakademik/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'tahunakademik/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kode_thn_akad', 'Kode Tahun Akademik', 'required');
		$this->form_validation->set_rules('nama_thn_akad', 'Nama Tahun Akademik', 'required');
		$this->form_validation->set_rules('smt_akad', 'Semester Akademik', 'required');

		if ($this->form_validation->run() == TRUE) {
			

			// Prepare data for insertion
			$data = array(
				'kode_thn_akad' => $this->input->post('kode_thn_akad'),
				'nama_thn_akad' => $this->input->post('nama_thn_akad'),
				'smt_akad' => $this->input->post('smt_akad')
			);
	
			// Insert data into `tbltahunakademik`
			$this->db->insert('tbltahunakademik', $data);
			$this->session->set_flashdata('success', 'Proposal berhasil ditambahkan.');
			redirect('tahunakademik');
		} else {
			// Load form and get list of prodi
			$data['kode_ujian_proposal'] = $this->db->get('tblujianproposal')->result_array();
			$this->template->load('template', 'tahunakademik/add', $data);
		}
	}
	
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'kode_thn_akad' => $this->input->post('kode_thn_akad'),
				'nama_thn_akad' => $this->input->post('nama_thn_akad'),
				'smt_akad' => $this->input->post('smt_akad')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tbltahunakademik', $data); // Adjust table name to 'tbltahunakademik'
			redirect('tahunakademik');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['kode_ujian_proposal'] = $this->db->get('tblujianproposal')->result_array();
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'tahunakademik/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tbltahunakademik.*')
			->from('tbltahunakademik')
			// ->join('tblmahasiswa', 'tblmahasiswa.nim = tbltahunakademik.nim_prop')
			// ->join('tblprodi', 'tbltahunakademik.prodi_prop = tblprodi.kode_prodi')
			// ->join('tbldosen', 'tbldosen.nik_dosen = tbltahunakademik.nik_pembimbing1')
			->where('tbltahunakademik.id', $id_peserta)
			->get()
			->row_array();
		
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'tahunakademik/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tbltahunakademik');
        }
        redirect('tahunakademik');
    }

}