<?php

Class Kurikulum extends MX_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('login_status') == null) {
            redirect('auth');
        }
    }

    function get_data(){
        $query = $this->db->get('tblkurikulum');
        return $query->result();
    }

    function index() {
        if ($this->session->userdata('login_status') == 'admin') {
            $data['data'] = $this->db->select('tblkurikulum.*, tblprodi.nama_prodi')
                                     ->from('tblkurikulum')
                                     ->join('tblprodi', 'tblkurikulum.prodi_matkul = tblprodi.kode_prodi')
                                     ->get()
                                     ->result(); 
            $this->template->load('template', 'kurikulum/listadmin', $data);
        } else if ($this->session->userdata('login_status') == 'prodi') {
            $data['data'] = $this->db->select('*')
                                     ->from('tblkurikulum')
                                     ->like('prodi_matkul', $this->session->userdata('nama'))
                                     ->get()
                                     ->result(); 
            $this->template->load('templateprodi', 'kurikulum/listadmin', $data);
        } else {
            redirect('dashboard');
        }
    }

    function laporan() {
        if ($this->session->userdata('login_status') == 'admin') {
            $data['data'] = $this->db->select('*')->from('tblkurikulum')->get()->result(); 
            $this->template->load('template', 'kurikulum/laporan', $data);
        } else {
            redirect('dashboard');
        }
    }

    function history() {
        $id_kurikulum = $this->uri->segment(3);
        $data['kurikulum'] = $this->db->get_where('tblkurikulum', array('kode_matkul' => $id_kurikulum))->row_array();
        if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'kurikulum/history', $data);
        } else {
            redirect('dashboard');
        }
    }

    public function add() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_matkul', 'Kode Matakuliah', 'required');
        $this->form_validation->set_rules('nama_matkul', 'Nama Matakuliah', 'required');
        $this->form_validation->set_rules('sks_matkul', 'SKS Matakuliah', 'required');    
        $this->form_validation->set_rules('smt_matkul', 'Semester', 'required');
        $this->form_validation->set_rules('sks_teori', 'SKS Teori', 'required');
        $this->form_validation->set_rules('sks_praktek', 'SKS Praktek', 'required');
        $this->form_validation->set_rules('status_matkul', 'Status', 'required');
        $this->form_validation->set_rules('versi_matkul', 'Versi', 'required');
        $this->form_validation->set_rules('prodi_matkul', 'Kode Prodi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kode_matkul'    => $this->input->post('kode_matkul'),
                'nama_matkul'    => $this->input->post('nama_matkul'),
                'sks_matkul'     => $this->input->post('sks_matkul'),
                'smt_matkul'     => $this->input->post('smt_matkul'),
                'sks_teori'      => $this->input->post('sks_teori'),
                'sks_praktek'    => $this->input->post('sks_praktek'),
                'status_matkul'  => $this->input->post('status_matkul'),
                'milik_matkul'  => $this->input->post('milik_matkul'),
                'versi_matkul'   => $this->input->post('versi_matkul'),
                'prodi_matkul'   => $this->input->post('prodi_matkul'),
            );

            $this->db->insert('tblkurikulum', $data);
            redirect('kurikulum');
        } else {
            $data['kurikulum_list'] = $this->db->get('tblkurikulum')->result_array();
            $this->template->load('template', 'kurikulum/add', $data);
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $data = array(
                'kode_matkul'    => $this->input->post('kode_matkul'),
                'nama_matkul'    => $this->input->post('nama_matkul'),
                'sks_matkul'     => $this->input->post('sks_matkul'),
                'smt_matkul'     => $this->input->post('smt_matkul'),
                'sks_teori'      => $this->input->post('sks_teori'),
                'sks_praktek'    => $this->input->post('sks_praktek'),
                'status_matkul'  => $this->input->post('status_matkul'),
                'milik_matkul'  => $this->input->post('milik_matkul'),
                'versi_matkul'   => $this->input->post('versi_matkul'),
                'prodi_matkul'   => $this->input->post('prodi_matkul')
            );
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('tblkurikulum', $data);
            redirect('kurikulum');
        } else {
            $id = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('tblkurikulum', array('id' => $id))->row_array();
            if ($this->session->userdata('login_status') == 'admin') {
                $this->template->load('template', 'kurikulum/editadmin', $data);
            } else {
                redirect('dashboard');
            }
        }
    }

    function lihat() {
        $id_kurikulum = $this->uri->segment(3);
        $data['kurikulum'] = $this->db->get_where('tblkurikulum', array('id' => $id_kurikulum))->row_array();
        if ($this->session->userdata('login_status') == 'admin') {
            $this->template->load('template', 'kurikulum/lihat', $data);
        } else {
            redirect('dashboard');
        }
    }

    function hapus() {
        $id = $this->uri->segment(3);
        if (!empty($id)) {
            $this->db->where('id', $id);
            $this->db->delete('tblkurikulum');
        }
        redirect('kurikulum');
    }
}
