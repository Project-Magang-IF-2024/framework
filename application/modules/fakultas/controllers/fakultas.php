<?php

Class Fakultas extends MX_Controller {

	function __construct() {
			parent::__construct();
			if ($this->session->userdata('login_status') == null) {
					redirect('auth');
			}
			$this->load->database();
	}

	function get_data(){
		$query = $this->db->get('tblfakultas');
		return $query->result();
	}

	function index() {
			if ($this->session->userdata('login_status') == 'admin') {
					// Admin bisa melihat semua fakultas
					$data['result'] = $this->get_data();
					$data['data'] = $this->db->select('*')->from('tblfakultas')->get()->result();
					$this->template->load('template', 'fakultas/listadmin', $data);
			} else {
					redirect('dashboard');
			}
	}

	function laporan() {
			if ($this->session->userdata('login_status') == 'admin') {
					$data['data'] = $this->db->select('*')->from('tblfakultas')->get()->result(); // Mengambil semua data dari tabel `tblfakultas`
					$this->template->load('template', 'fakultas/laporan', $data);
			} else {
					redirect('dashboard');
			}
	}

	function history() {
		$id_peserta = $this->uri->segment(3);
  	$data['peserta'] = $this->db->get_where('fakultas',array('id_fakultas'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'fakultas/history',$data);
		} else {
			redirect('dashboard');
		}
  }

	public function add() {

			$this->load->library('form_validation');
		
			// Set form validation rules
			$this->form_validation->set_rules('kode_fakultas', 'Kode Fakultas', 'required');
			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
			$this->form_validation->set_rules('singkatan_fak', 'Singkatan Fakultas', 'required');

			if ($this->form_validation->run() == TRUE) {
					// Persiapan data untuk insert
					$data = array(
							'kode_fakultas' => $this->input->post('kode_fakultas'),
							'id' => $this->input->post('id'),
							'nama_fakultas' => $this->input->post('nama_fakultas'),
							'singkatan_fak' => $this->input->post('singkatan_fak')
					);
					
					//insert ke tabel 'tblfakultas'
					$this->db->insert('tblfakultas', $data);
					redirect('fakultas');
			} else { 
					$data['fakultas_list'] = $this->db->get('tblfakultas')->result_array();
					$this->template->load('template', 'fakultas/add', $data);
			}
	}

	public function edit() {
			if (isset($_POST['submit'])){
				// Persiapan data untuk update
				$data = array(
					//'kode_fakultas' => $this->input->post('kode_fakultas'),
					'nama_fakultas' => $this->input->post('nama_fakultas'),
					'singkatan_fak' => $this->input->post('singkatan_fak')
				);

				$id = $this->input->post('id'); // Pastikan ID dikirim dari form
				$this->db->where('id', $id);
				$this->db->update('tblfakultas', $data);
				redirect('fakultas');
			} else {
					$id = $this->uri->segment(3); // Ambil ID dari URL
					$data['data'] = $this->db->get_where('tblfakultas', array('id' => $id))->row_array();

					if ($this->session->userdata('login_status') == 'admin') {
							$this->template->load('template', 'fakultas/editadmin', $data);
					} else {
							redirect('dashboard');
					}
			}
	}

	function lihat() {
			$id_peserta = $this->uri->segment(3);
			$data['peserta'] = $this->db->get_where('tblfakultas', array('id' => $id_peserta))->row_array();
			if ($this->session->userdata('login_status') == 'admin') {
					$this->template->load('template', 'fakultas/lihat', $data);
			} else {
					redirect('dashboard');
			}
	}

	function hapus() {
			$id = $this->uri->segment(3);
			if (!empty($id)) {
					// Proses delete data
					$this->db->where('id', $id);
					$this->db->delete('tblfakultas');
			}
			redirect('fakultas');
	}

}
