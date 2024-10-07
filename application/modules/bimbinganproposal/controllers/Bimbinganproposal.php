<?php

Class Bimbinganproposal extends MX_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('login_status') == null) {
            redirect('auth');
        }
    }

    function get_data()
    {$query = $this->db->get('tblbimbinganproposal');
    return $query->result();}

    function index() {
        if ($this->session->userdata('login_status') == 'admin') {
            // Admin can see all proposals, with JOIN to get details from `tblproposal`
            $data['data'] = $this->db->select('tblbimbinganproposal.*, tblproposal.judul_proposal, tblproposal.nim_prop, tblproposal.nik_pembimbing1')
                ->from('tblbimbinganproposal')
                ->join('tblproposal', 'tblbimbinganproposal.kd_prop = tblproposal.kode_prop') 
                ->get()
                ->result();
            $this->template->load('template', 'bimbinganproposal/listadmin', $data);
        } else if ($this->session->userdata('login_status') == 'proposal') {
            $data['data'] = $this->db->select('*')
                ->from('tblbimbinganproposal')
                ->like('kd_prop', $this->session->userdata('nama'))
                ->get()
                ->result();
            $this->template->load('templateprodi', 'bimbinganproposal/listadmin', $data);
        } else {
            redirect('dashboard');
        }
    }
    function laporan()
	{
		if ($this->session->userdata('login_status') == 'admin') {
			$data['data'] = $this->db->select('*')->from('tblproposal')->get()->result(); // Mengambil semua data dari tabel tblfakultas
			$this->template->load('template', 'proposal/laporan', $data);
		} else {
			redirect('dashboard');
		}
	}

    public function add()
	{
		// Load form validation library
		$this->load->library('form_validation');

		// Set form validation rules
		$this->form_validation->set_rules('kd_prop', 'Kode Proposal', 'required');
		$this->form_validation->set_rules('tgl_bimbingan', 'Tanggal Bimbingan', 'required');
		$this->form_validation->set_rules('materi_bimbingan', 'Materi', 'required');
		$this->form_validation->set_rules('paraf_pembimbing', 'Paraf', 'required');

		if ($this->form_validation->run() == TRUE) {
			// Prepare data for insertion
			$data = array(
				'kd_prop'	=> $this->input->post('kd_prop'),
				'tgl_bimbingan'	=> $this->input->post('tgl_bimbingan'),
				'materi_bimbingan'			=> $this->input->post('materi_bimbingan'),
				'paraf_pembimbing'		=> $this->input->post('paraf_pembimbing'),
			);

			
			$paraf_pembimbing = isset($_POST['paraf_pembimbing']) ? 1 : 0;
			$this->db->insert('tblbimbinganproposal', $data);
			redirect('bimbinganproposal');
		} else {
			// Load form and show validation errors
			$data['bimbinganproposal_list'] = $this->db->get('tblbimbinganproposal')->result_array();
			$this->template->load('template', 'bimbinganproposal/add', $data);
		}
	}

    public function edit() {
        if ($this->input->post('submit')) {
            // Prepare the data array with the updated column names
            $data = array(
                'kd_prop' => $this->input->post('kd_prop'),
                'tgl_bimbingan' => $this->input->post('tgl_bimbingan'),
                'materi_bimbingan' => $this->input->post('materi_bimbingan'),
                'paraf_pembimbing' => $this->input->post('paraf_pembimbing')
            );
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('tblbimbinganproposal', $data);
            redirect('bimbinganproposal');
        } else {
            $id = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('tblbimbinganproposal', array('id' => $id))->row_array();

            if ($this->session->userdata('login_status') == 'admin') {
                $this->template->load('template', 'bimbinganproposal/editadmin', $data);
            } else {
                redirect('dashboard');
            }
        }
    }

    function lihat() {
        $id_peserta = $this->uri->segment(3);
        $data['peserta'] = $this->db->get_where('tblbimbinganproposal', array('id' => $id_peserta))->row_array();
        if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'bimbinganproposal/lihat', $data);
        } else {
            redirect('dashboard');
        }
    }

    function hapus() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            // Proses delete data
            $this->db->where('id', $id);
            $this->db->delete('tblbimbinganproposal');
        }
        redirect('bimbinganproposal');
    }
}
