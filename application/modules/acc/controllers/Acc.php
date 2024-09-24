<?php

Class Mahasiswa extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if ($this->session->userdata('login_status') == 'admin') {
			// Admin can see all students, with JOIN to get `nama_prodi` from `tblprodi`
			$data['data'] = $this->db->select('tblacc.*, tblprodi.nama_prodi')
				->from('tblacc')
				// ->join('tblprodi', 'tblacc.prodi_mhs = tblprodi.kode_prodi') // Join to get `nama_prodi`
				->get()
				->result();
			$this->template->load('template', 'acc/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblacc')->like('nama_prodi', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','acc/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('tblacc')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','acc/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('acc',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'acc/history',$data);
		} else {
			redirect('dashboard');
		}
    }

	public function add() {
		if ($this->input->post('submit')) {
			// Prepare data for insertion
			$data = array(
				'kode_ujian_proposal' => $this->input->post('nim'),
				'acc_pbb1' => $this->input->post('nama_mhs'),
				'acc_pbb2' => $this->input->post('nik_mhs'),
				'acc_puji1' => $this->input->post('gender_mhs'),
				'acc_puji2' => $this->input->post('tempat_lahir_mhs'),
				'acc_tata_tulis' => $this->input->post('tanggal_lahir_mhs'),
				'acc_upload_laporan' => $this->input->post('alamat_mhs'),
				'acc_kaprodi' => $this->input->post('no_hp_mhs')
			);
	
			// Insert data into `tblacc`
			$this->db->insert('tblacc', $data);
			redirect('acc');
		} else {
			// Load form and get list of prodi
			$data['prodi_list'] = $this->db->get('tblprodi')->result_array(); // Assuming you have a tblprodi table
			$this->template->load('template', 'acc/add', $data);
		}
	}
	
	
	
	
    
	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Prepare the data array with the updated column names
			$data = array(
				'kode_ujian_proposal' => $this->input->post('nim'),
				'acc_pbb1' => $this->input->post('nama_mhs'),
				'acc_pbb2' => $this->input->post('nik_mhs'),
				'acc_puji1' => $this->input->post('gender_mhs'),
				'acc_puji2' => $this->input->post('tempat_lahir_mhs'),
				'acc_tata_tulis' => $this->input->post('tanggal_lahir_mhs'),
				'acc_upload_laporan' => $this->input->post('alamat_mhs'),
				'acc_kaprodi' => $this->input->post('no_hp_mhs')
			);
	
			$id = $this->input->post('id'); // Ensure this ID is being passed from the form
			$this->db->where('id', $id); // Adjust 'id_mahasiswa' to 'id'
			$this->db->update('tblacc', $data); // Adjust table name to 'tblacc'
			redirect('acc');
		} else {
			$id = $this->uri->segment(3); // Get ID from URI segment
			$data['data'] = $this->db->get_where('tblacc', array('id' => $id))->row_array(); // Adjust 'id_mahasiswa' to 'id'
	
			// Check user session status and load appropriate view
			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'acc/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}
	
	
	function lihat(){
		 $id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('tblacc',array('id'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'acc/lihat',$data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tblacc');
        }
        redirect('acc');
    }

}