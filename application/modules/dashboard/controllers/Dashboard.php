<?php

Class Dashboard extends MX_Controller {

  function __construct() {
				parent::__construct();
			if ($this->session->userdata('login_status')== null) {
                redirect('auth');
            }
}

function index() {
    // Check user login status
    if ($this->session->userdata('login_status') == 'mahasiswa') {
        // Fetch data for the Mahasiswa using the 'id' from session
        $data['peserta'] = $this->db->select('*')
                                     ->from('tblmahasiswa')
                                     ->where('id', $this->session->userdata('id')) // Use 'id' here
                                     ->get()
                                     ->row_array();

        // Check if the data is found
        if (empty($data['peserta'])) {
            // Handle the case where no data is found
            $this->session->set_flashdata('error', 'Data Mahasiswa tidak ditemukan.');
            redirect('auth'); // Redirect to login or appropriate page
        }

        // Load the appropriate template and data
        $this->template->load('templatepeserta', 'dashboard/dashboard', $data);
    } else if ($this->session->userdata('login_status') == 'dosen') {
        $this->template->load('templateprodi', 'dashboard/dashboardprodi');
    } else if ($this->session->userdata('login_status') == 'admin') {
        $this->template->load('template', 'dashboard/dashboardadmin');
    } else {
        redirect('auth');
    }
}

	
	function add() {
	$uploadFoto = $this->upload_foto();
	$id_semester = $this->db->from('semester')->where('status', 'Aktif')->get()->row_array();
    $isi = array(
			'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
			'id_semester' => $id_semester['id_semester'],
            'ipk'     => $this->input->post('ipk'),
            'jenis'     => $this->input->post('jenis'),
			'bukti'     => $uploadFoto
			
			
        );
        $this->db->insert('laporan',$isi);
        redirect('dashboard');
     }
	 
	  function edit(){
        if(isset($_POST['submit'])){
		$uploadFoto = $this->upload_foto();
		$id_semester = $this->db->from('semester')->where('status', 'Aktif')->get()->row_array();
		if($uploadfoto != null){
             $data = array(
            'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
			'id_semester' => $id_semester['id_semester'],
            'ipk'     => $this->input->post('ipk'),
            'jenis'     => $this->input->post('jenis'),
			'bukti'     => $uploadFoto
			);
		} else {
			$data = array(
            'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
			'id_semester' => $id_semester['id_semester'],
            'ipk'     => $this->input->post('ipk'),
            'jenis'     => $this->input->post('jenis')
			);
		}
            $id   = $this->input->post('id_laporan');
            $this->db->where('id_laporan',$id);
            $this->db->update('laporan',$data);
            redirect('dashboard');
        }else{
            $id_peserta           = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('laporan',array('id_laporan'=>$id_peserta))->row_array();
            $this->template->load('template', 'dashboard/editadmin',$data);
        }
	}
	
	function hapus(){
        $id_peserta = $this->uri->segment(3);
        if(!empty($id_peserta)){
            // proses delete data
            $this->db->where('id_laporan',$id_peserta);
            $this->db->delete('laporan');
        }
        redirect('dashboard');
    }
	
	function upload_foto(){
        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10240; // imb
		$new_name = time().$_FILES["userfile"]['name'];
		$config['file_name'] = $new_name;
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('uploaddok');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
			
		

}