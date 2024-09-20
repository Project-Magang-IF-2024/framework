<?php

class Kriterianilai extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login_status') == null) {
			redirect('auth');
		}
	}

	function get_data()
	{
		$query = $this->db->get('tblkriterianilai');
		return $query->result();
	}

	// function index()
	// {
	// 	if ($this->session->userdata('login_status') == 'admin') {
	// 		// Admin bisa melihat semua fakultas
	// 		$data['data'] = $this->db->select('*')->from('tblkriterianilai')->get()->result();
	// 		$data['result'] = $this->get_data();
	// 		$this->template->load('template', 'kriterianilai/listadmin', $data);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	function index()
	{

		if ($this->session->userdata('login_status') == 'admin') {
			$data['data'] = $this->db->select('*')->from('tblkriterianilai')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template', 'kriterianilai/listadmin', $data);
		} else if ($this->session->userdata('login_status') == 'prodi') {
			$data['data'] = $this->db->select('*')->from('tblmahasiswa')->like('namaprodi', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi', 'kriterianilai/listadmin', $data);
		} else {
			redirect('dashboard');
		}
	}

	function laporan()
	{
		if ($this->session->userdata('login_status') == 'admin') {
			$data['data'] = $this->db->select('*')->from('tblfakultas')->get()->result(); // Mengambil semua data dari tabel tblfakultas
			$this->template->load('template', 'fakultas/laporan', $data);
		} else {
			redirect('dashboard');
		}
	}

	// function laporan()
	// {

	// 	if ($this->session->userdata('login_status') == 'admin') {
	// 		$data['data'] = $this->db->select('*')->from('tblkriterianilai')->get()->result(); //Untuk mengambil data dari database webinar
	// 		$this->template->load('template', 'kriterianilai/laporan', $data);
	// 	} else {
	// 		redirect('dashboard');
	// 	}
	// }

	function history()
	{
		$id_peserta           = $this->uri->segment(3);
		$data['peserta'] = $this->db->get_where('kriterianilai', array('id' => $id_peserta))->row_array();
		if ($this->session->userdata('login_status') == 'admin') {
			$this->template->load('template', 'kriterianilai/history', $data);
		} else {
			redirect('dashboard');
		}
	}

	public function add()
	{
		// Load form validation library
		$this->load->library('form_validation');

		// Set form validation rules
		$this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('versi', 'Versi', 'required');

		if ($this->form_validation->run() == TRUE) {
			// Prepare data for insertion
			$data = array(
				'kode_kriteria'	=> $this->input->post('kode_kriteria'),
				'nama_kriteria'	=> $this->input->post('nama_kriteria'),
				'jenis'			=> $this->input->post('jenis'),
				'status'		=> $this->input->post('status'),
				'versi'			=> $this->input->post('versi')
			);

			// Insert data into `tblprodi`
			$status = isset($_POST['status']) ? 1 : 0;
			$this->db->insert('tblkriterianilai', $data);
			redirect('kriterianilai');
		} else {
			// Load form and show validation errors
			$data['kriterianilai_list'] = $this->db->get('tblkriterianilai')->result_array();
			$this->template->load('template', 'kriterianilai/add', $data);
		}
	}


	public function edit()
	{
		if (isset($_POST['submit'])) {
			// Persiapan data untuk update
			$data = array(
				'kode_kriteria' => $this->input->post('kode_kriteria'),
				'nama_kriteria' => $this->input->post('nama_kriteria'),
				'jenis' => $this->input->post('jenis'),
				'status' => $this->input->post('status'),
				'versi' => $this->input->post('versi')
			);

			$status = isset($_POST['status']) ? 1 : 0;
			$id = $this->input->post('id'); // Pastikan ID dikirim dari form
			$this->db->where('id', $id);
			$this->db->update('tblkriterianilai', $data);
			redirect('kriterianilai');
		} else {
			$id = $this->uri->segment(3); // Ambil ID dari URL
			$data['data'] = $this->db->get_where('tblkriterianilai', array('id' => $id))->row_array();

			if ($this->session->userdata('login_status') == 'admin') {
				$this->template->load('template', 'kriterianilai/editadmin', $data);
			} else {
				redirect('dashboard');
			}
		}
	}

	function lihat()
	{
		$id_peserta = $this->uri->segment(3);
		$data['peserta'] = $this->db->get_where('tblkriterianilai', array('id' => $id_peserta))->row_array();
		if ($this->session->userdata('login_status') == 'admin') {
			$this->template->load('template', 'kriterianilai/lihat', $data);
		} else {
			redirect('dashboard');
		}
	}

	function hapus()
	{
		$id = $this->uri->segment(3);
		if (!empty($id)) {
			// Proses delete data
			$this->db->where('id', $id);
			$this->db->delete('tblkriterianilai');
		}
		redirect('kriterianilai');
	}
}
