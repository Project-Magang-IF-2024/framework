<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Data Kurikulum</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Lihat Kurikulum</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object img-60" src="<?php echo base_url() ?>gambar/unusida.png" alt="">
                                        </div>
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading">Universitas Nahdlatul Ulama Sidoarjo</h4>
                                            <p>https://unusida.ac.id</p>
                                        </div>
                                    </div>
                                    <!-- End Info-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-md-right">
                                        <h3>Data Kurikulum</h3>
                                        <p>Dicetak Tanggal: <?php echo date('M') ?><span> <?php echo date("d"); ?>, <?php echo date("Y"); ?></span><br></p>
                                    </div>
                                    <!-- End Title-->
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- End InvoiceTopTest-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="media">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Invoice Mid-->
                        </br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="table">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="p-2 mb-0">Data Kurikulum</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Kode Matakuliah</label>
                                                </td>
                                                <td>
                                                <p class="itemtext"><?php echo $kurikulum['kode_matkul'] ?></p>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Nama Matakuliah</label>
                                                </td>
                                                <td>
                                                  <p class="itemtext"><?php echo $kurikulum['nama_matkul'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>SKS Matakuliah</label>
                                                </td>
                                                <td>
                                                  <p class="itemtext"><?php echo $kurikulum['sks_matkul'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Semester</label>
                                                </td>
                                                <td>
                                                  <p class="itemtext"><?php echo $kurikulum['smt_matkul'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>SKS Teori</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $kurikulum['sks_teori'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>SKS Praktek</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $kurikulum['sks_praktek'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Status</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $kurikulum['status_matkul'] == 'W' ? 'Wajib' : 'Pilihan'?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Milik</label>
                                                </td>
                                                <td>
                                                <p class="itemtext">
                                                    <?php 
                                                        if (!empty($kurikulum['milik_matkul'])) {
                                                            if ($kurikulum['milik_matkul'] == 'U') {
                                                                echo 'Universitas';
                                                            } elseif ($kurikulum['milik_matkul'] == 'F') {
                                                                echo 'Fakultas';
                                                            } elseif ($kurikulum['milik_matkul'] == 'P') {
                                                                echo 'Prodi';
                                                            } else {
                                                                echo 'Kategori tidak diketahui';
                                                            }
                                                        } else {
                                                            echo 'Data milik matkul tidak tersedia'; // Penanganan jika data kosong
                                                        }
                                                    ?>
                                                </p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label>versi</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $kurikulum['versi_matkul'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Kode Prodi</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $kurikulum['prodi_matkul'] ?></p>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End InvoiceBot-->
                    </div>
                    <div class="col-sm-12 text-center mt-3">
                        <?php echo anchor('kurikulum','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                    </div>
                    <!-- End Invoice-->
                    <!-- End Invoice Holder-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->