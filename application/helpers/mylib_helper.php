<?php

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function cmb_dinamis_transaksi($name, $table, $field, $wherenilai, $pk, $selected = null, $extra = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->where('id_gudang !=', $wherenilai)->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}


function cmb_dinamis2($name, $table, $field, $pk, $selected = null, $extra = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
     $cmb .= "<option value=''>Semua Satuan</option>";
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function max_value($args) {
    $results = array();
    $max_value = max($args);
    $results[] = $max_value;
 
    //now get the key for the first occurence of max value
    $found_key = false;
    foreach ($args as $key => $value) {
        if ($value == $max_value && !$found_key) {
            $results[] =  $key;
            $found_key = true;
        }
    }
    return $results;
}

function min_value($args) {
    $results = array();
    $min_value = min($args);
    $results[] = $min_value;
 
    //now get the key for the first occurence of max value
    $found_key = false;
    foreach ($args as $key => $value) {
        if ($value == $min_value && !$found_key) {
            $results[] =  $key;
            $found_key = true;
        }
    }
    return $results;
}

function cmb_dinamis_groupby($name, $table, $field, $pk, $selected = null, $extra = null, $group = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->group_by($group)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function cmb_dinamis_where($name, $table, $field, $pk, $selected = null, $extra = null, $where = null, $nilaiwhere=null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->where($where,$nilaiwhere)->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function get_tahun_akademik_aktif($field) {
    $ci = & get_instance();
    $ci->db->where('is_aktif', 'y');
    $tahun = $ci->db->get('tbl_tahun_akademik')->row_array();
    return $tahun[$field];
}

function chek_nilai($nim, $id_jadwal) {
    $ci = & get_instance();
    $nilai = $ci->db->get_where('tbl_nilai', array('nim' => $nim, 'id_jadwal' => $id_jadwal));
    if ($nilai->num_rows() > 0) {
        $row = $nilai->row_array();
        return $row['nilai'];
    } else {
        return 0;
    }
}

function chek_komponen_biaya($id_jenis_pembayaran) {
    $ci = & get_instance();
    $where = array(
        'id_jenis_pembayaran' => $id_jenis_pembayaran,
        'id_tahun_akademik' => get_tahun_akademik_aktif('semester_aktif'));
    $biaya = $ci->db->get_where('tbl_biaya_sekolah', $where);
    if ($biaya->num_rows() > 0) {
        $row = $biaya->row_array();
        return $row['jumlah_biaya'];
    } else {
        return 0;
    }
}

function chekAksesModule() {
    $ci = & get_instance();
    // ambil parameter uri segment untuk controller dan method
    $controller = $ci->uri->segment(1);
    $method = $ci->uri->segment(2);

    // chek url
    if (empty($method)) {
        $url = $controller;
    } else {
        $url = $controller . '/' . $method;
    }

    // chek id menu nya
    $menu = $ci->db->get_where('tabel_menu', array('link' => $url))->row_array();
    $level_user = $ci->session->userdata('id_level_user');

    if (!empty($level_user)) {

        // chek apakah level ini diberikan hak akses atau tidak
        $chek = $ci->db->get_where('tbl_user_rule', array('id_level_user' => $level_user, 'id_menu' => $menu['id']));
        if ($chek->num_rows() < 1 and $method != 'data' and $method != 'add' and $method != 'edit' and $method != 'delete') {
            echo "ANDA TIDAK BOLEH MENGAKSES MODUL INI";
            die;
        }
    } else {
        redirect('auth');
    }



}

function kirimemail($email)
    {
         $ci = & get_instance();
        $ci->load->library('email');
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'SIER Performance Analysis';
                $config['protocol'] = 'smtp';
                $config['mailtype'] = 'html';
                $config['smtp_host'] = 'mail.it-trust.co.id';
                $config['smtp_port'] = '587';
                $config['smtp_timeout'] = '5';
                $config['smtp_user'] = 'admin@sier.it-trust.co.id';
                $config['smtp_pass'] = 'sier123456';
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;
    
	
      $message = '<p>Terima kasih anda telah melakukan penilaian pada platform PA SIER 360. Hasil akan diumumkan pada akun masing-masing.
                </p>
                    ';
      
	$ci->email->initialize($config);
      
      $ci->email->from('admin@sier.it-trust.co.id'); // change it to yours
      $ci->email->to($email);// change it to yours
      $ci->email->subject('Bukti Pengisian SIER PA 360');
      $ci->email->message($message);
		$ci->email->send();
      $ci->email->print_debugger();
	
    }

   
function tulislog($kegiatan,$id_peserta) {
    $ci = & get_instance();
          $data = array(
        'kegiatan'=>$kegiatan,
        'id_peserta'=>$id_peserta
    );

    $ci->db->insert('log',$data);
    }



    function Terbilang($x) {
        $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . "belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
    }