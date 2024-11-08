<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Data Catatan Bimbingan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Lihat Catatan Bimbingan</li>
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
                                        <h3>Data Catatan Bimbingan</h3>
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
                                    <div class="media-left">
                                        <img class="media-object rounded-square img-120" src="<?php echo base_url() ?>assets/images/user/3.jpg" alt="">
                                    </div>
                                    <div class="media-body m-l-20">
                                        <h4 class="media-heading"><?php echo $peserta['nama_mhs'] ?> </br>NIM : <?php echo $peserta['nim'] ?></h4>
                                        <p>Semester : <strong><?php echo $peserta['angkatan'] ?></strong><br>Prodi : <strong><?php echo $peserta['prodi_mhs'] ?></strong></p>
                                    </div>
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
                                                    <h6 class="p-2 mb-0">Data Diri</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Nama</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['nama_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>NIM</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['nim'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>NIK</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['nik_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Jenis Kelamin</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['gender_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Tempat Tanggal Lahir</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['tempat_lahir_mhs'] ?>, <?php echo date('d M Y', strtotime($peserta['tanggal_lahir_mhs'])) ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Alamat</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['alamat_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>No HP</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['no_hp_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Email</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['email_mhs'] ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label>Prodi</label>
                                                </td>
                                                <td>
                                                    <p class="itemtext"><?php echo $peserta['prodi_mhs'] ?></p>
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
                        <?php echo anchor('mahasiswa','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                    </div>
                    <!-- End Invoice-->
                    <!-- End Invoice Holder-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
