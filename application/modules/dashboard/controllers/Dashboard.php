<?php

Class Dashboard extends MX_Controller {

  function __construct() {
				parent::__construct();
                $this->load->helper('url');
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
        // Ambil data dosen dari session
        $nik_dosen = $this->session->userdata('nik_dosen');
        $data['dosen'] = $this->db->select('nama_dosen, nik_dosen, jabatan')
                                   ->from('tbldosen')
                                   ->where('nik_dosen', $nik_dosen)
                                   ->get()
                                   ->row_array();

        $this->template->load('templateprodi');
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
    
    function dashboardprodi()
    {
        $username = $this->session->userdata('nama');
        $dosen = $this->db->select('nik_dosen')->from('tbldosen')->where('username_dosen', $username)->get()->row_array();
        if (!empty($dosen)) {
            $this->session->set_userdata('nik_dosen', $dosen['nik_dosen']);
        }

        // Query untuk menghitung jumlah proposal yang dibimbing
        $jumlah_proposal = $this->db->where('nik_pembimbing1', $dosen['nik_dosen'])
                                    ->or_where('nik_pembimbing2', $dosen['nik_dosen'])
                                    ->count_all_results('tblproposal');

        // Query untuk status proposal berdasarkan kolom `acc_kaprodi`
        $status_proposal = $this->db->select('acc_kaprodi, kode_prop')
                                    ->where('nik_pembimbing1', $dosen['nik_dosen'])
                                    ->or_where('nik_pembimbing2', $dosen['nik_dosen'])
                                    ->get('tblproposal')
                                    ->result_array();

        // Query untuk status ujian proposal di tabel `tblujianproposal`
        $status_ujian_proposal = $this->db->where('nik_pbb1_ujian_proposal', $dosen['nik_dosen'])
                                        ->or_where('nik_pbb2_ujian_proposal', $dosen['nik_dosen'])
                                        ->get('tblujianproposal')
                                        ->result_array();

        // Query untuk jumlah mahasiswa yang dibimbing
        $jumlah_mahasiswa = $this->db->where('nik_pembimbing1', $dosen['nik_dosen'])
                                    ->or_where('nik_pembimbing2', $dosen['nik_dosen'])
                                    ->count_all_results('tblproposal');

        // Kirim data ke view
        $data = [
            'jumlah_proposal' => $jumlah_proposal,
            'status_proposal' => $status_proposal,
            'status_ujian_proposal' => $status_ujian_proposal,
            'jumlah_mahasiswa' => $jumlah_mahasiswa
        ];

        // Load view untuk data proposal
        $this->template->load('templateprodi', 'dashboardprodi', $data);
    }

    function dashboardproposal()
    {
        // Mendapatkan NIK dosen dari session
        $nik_dosen = $this->session->userdata('nik');

        // Mengambil data daftar proposal yang dibimbing oleh dosen dengan NIK dari session
        $this->db->select('tblproposal.id, tblproposal.judul_proposal, tblmahasiswa.nama_mhs as nama_mahasiswa, tblproposal.acc_kaprodi, tblproposal.nik_kaprodi');
        $this->db->from('tblproposal');
        $this->db->join('tblmahasiswa', 'tblproposal.nim_prop = tblmahasiswa.nim');
        $this->db->where('tblproposal.nik_pembimbing1', $nik_dosen); // Filter untuk pembimbing 1
        $this->db->or_where('tblproposal.nik_pembimbing2', $nik_dosen); // Filter untuk pembimbing 2
        $data['proposals'] = $this->db->get()->result_array();

        // Mengambil data status proposal
        $this->db->select('tblstatusdosen.id, tblstatusdosen.nik_dsn, tblstatusdosen.status_dosen');
        $this->db->from('tblstatusdosen');
        $this->db->where('tblstatusdosen.nik_dsn', $nik_dosen); // Filter untuk NIK dosen di status proposals
        $data['status_proposals'] = $this->db->get()->result_array();

        // Load view untuk data proposal
        $this->template->load('templateprodi', 'dashboardproposal', $data);
    }

    function dashboardmahasiswa()
    {
        // Ambil NIK dosen dari session
        $nik_dosen = $this->session->userdata('nik');

        // Query untuk mendapatkan daftar mahasiswa yang dibimbing oleh dosen
        $this->db->select('tblmahasiswa.*');
        $this->db->from('tblmahasiswa');
        $this->db->join('tblproposal', 'tblmahasiswa.nim = tblproposal.nim_prop');
        $this->db->where('tblproposal.nik_pembimbing1', $nik_dosen);
        $this->db->or_where('tblproposal.nik_pembimbing2', $nik_dosen);
        $data['mahasiswa'] = $this->db->get()->result_array();

        // Load view untuk data mahasiswa
        $this->template->load('templateprodi', 'dashboardmahasiswa', $data);
    }

    function dashboardbimbingan()
    {
        // Mengambil data jadwal bimbingan dengan join ke tabel proposal untuk judul proposal dan join ke tabel mahasiswa untuk nama mahasiswa
        $data['jadwal_bimbingan'] = $this->db->select('tblbimbinganproposal.id, tblbimbinganproposal.kd_prop, tblbimbinganproposal.tgl_bimbingan, tblbimbinganproposal.materi_bimbingan, tblbimbinganproposal.paraf_pembimbing, tblproposal.judul_proposal, tblmahasiswa.nama_mhs')
        ->from('tblbimbinganproposal')
        ->join('tblproposal', 'tblbimbinganproposal.kd_prop = tblproposal.kode_prop', 'left')
        ->join('tblmahasiswa', 'tblproposal.nim_prop = tblmahasiswa.nim', 'left')
        ->get()
        ->result_array();

        // Load view untuk data bimbingan
        $this->template->load('templateprodi', 'dashboardbimbingan', $data);
    }

    function dashboardcttnbmbngn()
    {
        // Mengambil data catatan bimbingan
        $data['catatan_bimbingan'] = $this->db->select('tblbimbinganproposal.id, tblbimbinganproposal.kd_prop, tblbimbinganproposal.tgl_bimbingan, tblbimbinganproposal.materi_bimbingan, tblbimbinganproposal.paraf_pembimbing, tblproposal.judul_proposal, tblmahasiswa.nama_mhs')
        ->from('tblbimbinganproposal')
        ->join('tblproposal', 'tblbimbinganproposal.kd_prop = tblproposal.kode_prop', 'left')
        ->join('tblmahasiswa', 'tblproposal.nim_prop = tblmahasiswa.nim', 'left')
        ->get()
        ->result_array();

        /// Load view untuk data catatan bimbingan
        $this->template->load('templateprodi', 'dashboardcttnbmbngn', $data);
    }

    public function dashboardlaporan()
    {
        // Mendapatkan NIK dosen dari session
        $nik_dosen = $this->session->userdata('nik');

        // Query untuk mengambil data dari tblbimbinganproposal dengan join ke tblproposal dan tblmahasiswa
        $this->db->select('tblbimbinganproposal.*, tblproposal.*, tblmahasiswa.*, tblstatusmahasiswa.*');
        $this->db->from('tblbimbinganproposal');
        $this->db->join('tblproposal', 'tblbimbinganproposal.kd_prop = tblproposal.kode_prop');
        $this->db->join('tblmahasiswa', 'tblproposal.nim_prop = tblmahasiswa.nim');
        $this->db->join('tblstatusmahasiswa', 'tblmahasiswa.nim = tblstatusmahasiswa.nim');
        
        // Memfilter data berdasarkan NIK yang ada di session
        $this->db->where('tblproposal.nik_pembimbing1', $nik_dosen);
        $this->db->or_where('tblproposal.nik_pembimbing2', $nik_dosen);
        
        // Menjalankan query dan mendapatkan hasilnya
        $data['laporan_bimbingan'] = $this->db->get()->result_array();

        // Load view dengan data laporan bimbingan yang sudah difilter
        $this->template->load('templateprodi', 'dashboardlaporan', $data);
    }

    public function dashboardprofil() {
        $nik_dosen = $this->session->userdata('nik');
        if (!$nik_dosen) {
            echo "Session nik_dosen tidak ada.";
            exit;
        }
    
        // Ambil data profil dosen
        $profil_dosen = $this->db->select('nama_dosen, nik_dosen, email_dosen, no_hp_dosen')
                                 ->from('tbldosen')
                                 ->where('nik_dosen', $nik_dosen)
                                 ->get()
                                 ->row_array();
    
        if (empty($profil_dosen)) {
            echo "Profil dosen tidak ditemukan.";
            exit;
        }
    
        $data['profil_dosen'] = $profil_dosen;
        $this->template->load('templateprodi', 'dashboardprofil', $data);
    }
    

    function update_profil()
    {
        // Ambil data dari input
        $nik_dosen = $this->session->userdata('nik_dosen');
        $data = [
            'nama_dosen' => $this->input->post('nama_dosen'),
            'email_dosen' => $this->input->post('email_dosen'),
            'no_hp_dosen' => $this->input->post('no_hp_dosen')
        ];
        
        // Update data di database
        $this->db->where('nik_dosen', $nik_dosen);
        $this->db->update('tbldosen', $data);
        
        // Redirect kembali ke pengaturan
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        redirect('dashboard/dashboardpengaturan');
    }

    public function update_paraf() 
    {
        header('Content-Type: application/json'); // Menambahkan header JSON
        $id = $this->input->post('id');
        $this->db->select('paraf_pembimbing');
        $this->db->from('tblbimbinganproposal');
        $this->db->where('id', $id);
        $jadwal = $this->db->get()->row_array();

        if ($jadwal) {
            // Toggle status
            $new_status = $jadwal['paraf_pembimbing'] == 1 ? 0 : 1;
            $this->db->where('id', $id);
            $this->db->update('tblbimbinganproposal', ['paraf_pembimbing' => $new_status]);

            echo json_encode(['success' => true]); // Pastikan response JSON sesuai
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function update_status()
    {
        header('Content-Type: application/json');
        
        $id = $this->input->post('id');
        $nik_dosen = $this->session->userdata('nik'); // Ambil NIK dosen dari session
        
        // Cek apakah NIK dosen sama dengan nik_kaprodi di tblproposal
        $this->db->select('acc_kaprodi, nik_kaprodi');
        $this->db->from('tblproposal');
        $this->db->where('id', $id);
        $proposal = $this->db->get()->row_array();

        if ($proposal && $proposal['nik_kaprodi'] == $nik_dosen) {
            // Toggle status acc_kaprodi
            $new_status = $proposal['acc_kaprodi'] == 1 ? 0 : 1;
            $this->db->where('id', $id);
            $this->db->update('tblproposal', ['acc_kaprodi' => $new_status]);

            echo json_encode(['success' => true]);
        } else {
            // Jika tidak cocok, kirim pesan gagal
            echo json_encode(['success' => false, 'message' => 'Anda tidak memiliki izin untuk mengubah status ini.']);
        }
    }
}