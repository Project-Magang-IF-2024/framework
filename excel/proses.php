<?php
include('koneksi.php');
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
	    $trainer = $_GET['trainer'];
        $nama = $sheetData[$i]['1'];
        $jabatan = $sheetData[$i]['2'];
        $divisi = $sheetData[$i]['3'];
        $usia = $sheetData[$i]['4'];
        $masakerja = $sheetData[$i]['5'];
        $pendidikan = $sheetData[$i]['6'];
        $email = $sheetData[$i]['7'];
        $password = $sheetData[$i]['8'];
        $kelamin = $sheetData[$i]['9'];
        $nik = $sheetData[$i]['10'];
        mysqli_query($koneksi,"INSERT INTO `peserta`(`id_trainer`, `nama`, `jabatan`, `divisi`, `usia`, `masakerja`, `pendidikan`, `email`, `password`, `kelamin`, `nik`) VALUES ('$trainer','$nama','$jabatan','$divisi','$usia','$masakerja','$pendidikan','$email','$password','$kelamin','$nik')");
    }
}
?>