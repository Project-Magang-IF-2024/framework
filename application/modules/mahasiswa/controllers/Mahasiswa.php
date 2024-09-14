<?php

Class Mahasiswa extends MX_Controller {

    function __construct() {
        parent::__construct();
		if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
    }

    function index() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('mahasiswa')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','mahasiswa/listadmin', $data);
		} else if ($this->session->userdata('login_status')== 'prodi') {
			$data['data'] = $this->db->select('*')->from('mahasiswa')->like('namaprodi', $this->session->userdata('nama'))->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('templateprodi','mahasiswa/listadmin', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function laporan() {
		
		if($this->session->userdata('login_status') == 'admin') {
		    $data['data'] = $this->db->select('*')->from('mahasiswa')->get()->result(); //Untuk mengambil data dari database webinar
			$this->template->load('template','mahasiswa/laporan', $data);
		} else {
			redirect('dashboard');
		}
    }
	
	function history() {
		$id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'mahasiswa/history',$data);
		} else {
			redirect('dashboard');
		}
    }

function add() {
	if(isset($_POST['submit'])){
    $isi = array(          
            'nokk'     => $this->input->post('nokk'),
			'nikortu'     => $this->input->post('nikortu'),
			'namaortu'     => $this->input->post('namaortu'),
			'nik'     => $this->input->post('nik'),
			'nim'     => $this->input->post('nim'),
			'nama'     => $this->input->post('nama'),
			'alamat'     => $this->input->post('alamat'),
			'kabupaten'     => $this->input->post('kabupaten'),
			'nohp'     => $this->input->post('nohp'),
			'kodeprodi'     => $this->input->post('kodeprodi'),
			'namaprodi'     => $this->input->post('namaprodi'),
			'semester'     => $this->input->post('semester'),
			'ipk'     => $this->input->post('ipk'),
			'angkatan'     => $this->input->post('angkatan'),
			'bank'     => $this->input->post('bank'),
			'namarekening'     => $this->input->post('namarekening'),
			'norekening'     => $this->input->post('norekening'),
			'jenis'     => $this->input->post('jenis'),
			'username'     => $this->input->post('username'),
			'password'     => $this->input->post('password')
        );
        $this->db->insert('mahasiswa',$isi);
        redirect('mahasiswa');
	} else {
		$this->template->load('template', 'mahasiswa/add');
	}
    }
	
    
function edit(){
	if(isset($_POST['submit'])){
            $data = array(
            'nokk'     => $this->input->post('nokk'),
			'nikortu'     => $this->input->post('nikortu'),
			'namaortu'     => $this->input->post('namaortu'),
			'nik'     => $this->input->post('nik'),
			'nim'     => $this->input->post('nim'),
			'nama'     => $this->input->post('nama'),
			'alamat'     => $this->input->post('alamat'),
			'kabupaten'     => $this->input->post('kabupaten'),
			'nohp'     => $this->input->post('nohp'),
			'kodeprodi'     => $this->input->post('kodeprodi'),
			'namaprodi'     => $this->input->post('namaprodi'),
			'semester'     => $this->input->post('semester'),
			'ipk'     => $this->input->post('ipk'),
			'angkatan'     => $this->input->post('angkatan'),
			'bank'     => $this->input->post('bank'),
			'namarekening'     => $this->input->post('namarekening'),
			'norekening'     => $this->input->post('norekening'),
			'jenis'     => $this->input->post('jenis'),
			'username'     => $this->input->post('username'),
			'password'     => $this->input->post('password')
        );
        $id   = $this->input->post('id_mahasiswa');
        $this->db->where('id_mahasiswa',$id);
        $this->db->update('mahasiswa',$data);
        redirect('mahasiswa');
        }else{
            $id           = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id))->row_array();
			if($this->session->userdata('login_status') == 'admin') {
		    $this->template->load('template', 'mahasiswa/editadmin',$data);
		} else {
			redirect('dashboard');
		}
            
        }
    }
	
	function lihat(){
		 $id_peserta           = $this->uri->segment(3);
         $data['peserta'] = $this->db->get_where('mahasiswa',array('id_mahasiswa'=>$id_peserta))->row_array();
		if ($this->session->userdata('login_status')== 'admin') {
            $this->template->load('template', 'mahasiswa/lihat',$data);
		} else {
			redirect('dashboard');
		}
    }

 function hapus(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id_mahasiswa',$id);
            $this->db->delete('mahasiswa');
        }
        redirect('mahasiswa');
    }

}