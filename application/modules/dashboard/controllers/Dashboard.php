<?php

Class Dashboard extends MX_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('login_status') == null) {
            redirect('auth');
        }
    }

    function index() {
        // Check user login status
        $login_status = $this->session->userdata('login_status');
        $user_id = $this->session->userdata('id');
    
        if ($login_status === 'mahasiswa') {
            // Fetch data for the Mahasiswa using the 'id' from session
            $data['peserta'] = $this->db->select('tblmahasiswa.*, tblprodi.nama_prodi, tblstatusmahasiswa.status_keaktifan')
                                         ->from('tblmahasiswa')
                                         ->join('tblprodi', 'tblmahasiswa.prodi_mhs = tblprodi.kode_prodi', 'left')
                                         ->join('tblstatusmahasiswa', 'tblmahasiswa.nim = tblstatusmahasiswa.nim', 'left')
                                         ->where('tblmahasiswa.id', $user_id)
                                         ->get()
                                         ->row_array();
    
            // Check if the data is found
            if (empty($data['peserta'])) {
                // Handle the case where no data is found
                $this->session->set_flashdata('error', 'Data Mahasiswa tidak ditemukan.');
                redirect('auth'); // Redirect to login or appropriate page
            }
    








    
            // 2. Bimbingan Terbaru
// Fetch the latest proposal for the student
$latest_proposal = $this->db->select('kode_prop')
                             ->from('tblproposal')
                             ->where('nim_prop', $data['peserta']['nim'])
                             ->order_by('id', 'DESC') // Adjust the order by to your needs
                             ->limit(1)
                             ->get()
                             ->row_array();

if (!empty($latest_proposal)) {
    // Fetch the latest guidance based on the proposal code
    $data['bimbingan_terbaru'] = $this->db->select('tgl_bimbingan, materi_bimbingan')
                                            ->from('tblbimbinganproposal')
                                            ->where('kd_prop', $latest_proposal['kode_prop'])
                                            ->order_by('tgl_bimbingan', 'DESC')
                                            ->limit(1)
                                            ->get()
                                            ->row_array();
} else {
    // Handle the case where no proposal is found
    $data['bimbingan_terbaru'] = null; // or however you want to handle this case
}

    
            // // 3. Pengumuman Penting
            // $data['pengumuman'] = $this->db->select('isi_pengumuman')
            //                                 ->from('tblpengumuman')
            //                                 ->order_by('tanggal', 'DESC')
            //                                 ->limit(5) // Show latest 5 announcements
            //                                 ->get()
            //                                 ->result_array();
    
// 4. Statistik Singkat

// Get total number of guidance sessions for the student
$data['jumlah_bimbingan'] = $this->db->where('kd_prop IN (SELECT kode_prop FROM tblproposal WHERE nim_prop = "'.$data['peserta']['nim'].'")')
                                       ->count_all_results('tblbimbinganproposal');

// Get proposal status counts for the student
$status_proposal_counts = $this->db->select('acc_kaprodi as status, COUNT(*) as count')
                                     ->from('tblproposal')
                                     ->where('nim_prop', $data['peserta']['nim'])
                                     ->group_by('acc_kaprodi')
                                     ->get()
                                     ->result_array();

// Prepare the status proposal counts
$data['status_proposal'] = array_reduce($status_proposal_counts, function($carry, $status) {
    $carry[$status['status']] = $status['count'];
    return $carry;
}, ['acc' => 0, 'pending' => 0, 'ditolak' => 0]);

// Calculate progress based on acceptance
$total_proposal = array_sum($data['status_proposal']);
$data['progress_proposal'] = $total_proposal > 0 ? round(($data['status_proposal']['acc'] / $total_proposal) * 100) : 0;

// Get the total number of accepted proposals (using tblacc)
$total_accepted = $this->db->where('kode_ujian_proposal IN (SELECT kode_prop FROM tblproposal WHERE nim_prop = "'.$data['peserta']['nim'].'")')
                            ->count_all_results('tblacc');
$data['total_accepted'] = $total_accepted;

    
            // Load the appropriate template and data for Mahasiswa
            $this->template->load('templatepeserta', 'dashboard/dashboard', $data);
        } elseif ($login_status === 'dosen') {
            // Load the appropriate template for Dosen
            $this->template->load('templateprodi', 'dashboard/dashboardprodi');
        } elseif ($login_status === 'admin') {
            // Load the appropriate template for Admin
            $this->template->load('template', 'dashboard/dashboardadmin');
        } else {
            // Redirect to authentication page if login status is not recognized
            redirect('auth');
        }
    }
    

    function add() {
        $uploadFoto = $this->upload_foto();
        $id_semester = $this->db->from('semester')->where('status', 'Aktif')->get()->row_array();
        $isi = array(
            'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
            'id_semester' => $id_semester['id_semester'],
            'ipk' => $this->input->post('ipk'),
            'jenis' => $this->input->post('jenis'),
            'bukti' => $uploadFoto
        );
        $this->db->insert('laporan', $isi);
        redirect('dashboard');
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto();
            $id_semester = $this->db->from('semester')->where('status', 'Aktif')->get()->row_array();
            if ($uploadFoto != null) {
                $data = array(
                    'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
                    'id_semester' => $id_semester['id_semester'],
                    'ipk' => $this->input->post('ipk'),
                    'jenis' => $this->input->post('jenis'),
                    'bukti' => $uploadFoto
                );
            } else {
                $data = array(
                    'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
                    'id_semester' => $id_semester['id_semester'],
                    'ipk' => $this->input->post('ipk'),
                    'jenis' => $this->input->post('jenis')
                );
            }
            $id = $this->input->post('id_laporan');
            $this->db->where('id_laporan', $id);
            $this->db->update('laporan', $data);
            redirect('dashboard');
        } else {
            $id_peserta = $this->uri->segment(3);
            $data['data'] = $this->db->get_where('laporan', array('id_laporan' => $id_peserta))->row_array();
            $this->template->load('template', 'dashboard/editadmin', $data);
        }
    }

    function hapus() {
        $id_peserta = $this->uri->segment(3);
        if (!empty($id_peserta)) {
            // proses delete data
            $this->db->where('id_laporan', $id_peserta);
            $this->db->delete('laporan');
        }
        redirect('dashboard');
    }

    function upload_foto() {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10240; // mb
        $new_name = time() . $_FILES["userfile"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        // proses upload
        if ($this->upload->do_upload('uploaddok')) {
            $upload = $this->upload->data();
            return $upload['file_name'];
        } else {
            return null; // Handle upload error as needed
        }
    }

}
