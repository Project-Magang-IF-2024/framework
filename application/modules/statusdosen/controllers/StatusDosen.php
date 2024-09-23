<?php

Class StatusDosen extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'admin') {
			// Admin can see all students, with JOIN to get `nama_prodi` from `tblprodi`
			$data['data'] = $this->db->select('tblstatusdosen.*, tblthnakademik.*')
				->from('tblstatusdosen')
				->join('tblthnakademik', 'tblthnakademik.kode_thn_akad = tblstatusdosen.periode_status_dsn')
				->get()
				->result();
			
			$this->template->load('template', 'statusdosen/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblstatusdosen')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','statusdosen/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblstatusdosen')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','statusdosen/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'statusdosen/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nik_dsn', 'NIK Dosen', 'required');
		$this->form_validation->set_rules('periode_status_dsn', 'Periode Status Dosen', 'required');
		$this->form_validation->set_rules('status_dosen', 'Status Dosen', 'required');
		

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nik_dsn' => $this->input->post('nik_dsn'),
				'periode_status_dsn' => $this->input->post('periode_status_dsn'),
				'status_dosen' => $this->input->post('status_dosen'),
			);
	
			// Insert data into `tblproposal`
			$this->db->insert('tblstatusdosen', $data);
			$this->session->set_flashdata('success', 'Proposal berhasil ditambahkan.');
			redirect('statusdosen');
		} else {
			// Load form and get list of prodi
			$data['pembimbing_list1'] = $this->db->get('tbldosen')->result_array();
			$data['pembimbing_list2'] = $this->db->get('tbldosen')->result_array();
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array();
			$data['periode_list'] = $this->db->get('tblthnakademik')->result_array();
			$this->template->load('template', 'statusdosen/add', $data);
		}
	}
	
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'nik_dsn' => $this->input->post('nik_dsn'),
				'periode_status_dsn' => $this->input->post('periode_status_dsn'),
				'status_dosen' => $this->input->post('status_dosen'),
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblstatusdosen', $data); // Adjust table name to 'tblproposal'
			redirect('statusdosen');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblstatusdosen', array('id' => $id))->row_array();
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'statusdosen/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		$id_peserta = $this->uri->segment(3);
    	$data['peserta'] = $this->db->select('tblstatusdosen.*, tblthnakademik.nama_thn_akad, tbldosen.*')
			->from('tblstatusdosen')
			->join('tblthnakademik', 'tblthnakademik.kode_thn_akad = tblstatusdosen.periode_status_dsn')
			->join('tbldosen', 'tbldosen.nik_dosen = tblstatusdosen.nik_dsn')
			->where('tblstatusdosen.id', $id_peserta)
			->get()
			->row_array();
		
		if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'statusdosen/lihat', $data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblstatusdosen');
        }
        redirect('statusdosen');
    }

}