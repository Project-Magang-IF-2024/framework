<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Lihat Mahasiswa</li>
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
                            <div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="media">
                                            <div class="media-left"><img class="media-object img-60" src="<?php echo base_url() ?>gambar/unusida.png" alt=""></div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading">Universitas Nahdlatul Ulama Sidoarjo</h4>
                                                <p>https://unusida.ac.id</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-md-right">
                                            <h3>Data Mahasiswa</h3>
                                            <p>Dicetak Tanggal: <?php echo date('M') ?><span> <?php echo date("d"); ?>, <?php echo date("Y"); ?></span><br></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <div class="media-left"><img class="media-object rounded-square img-120" src="<?php echo base_url() ?>assets/images/user/3.jpg" alt=""></div>
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading"><?php echo $peserta['nama_mhs'] ?> <br>NIM: <?php echo $peserta['nim'] ?></h4>
                                            <p>Angkatan: <strong><?php echo $peserta['angkatan'] ?></strong><br>Prodi: <strong><?php echo $peserta['prodi_mhs'] ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div>
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
                                                            <label>No HP</label>
                                                        </td>
                                                        <td>
                                                            <p class="itemtext"><?php echo $peserta['no_hp_mhs'] ?></p>
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </br></br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customize-input float-right">
                                        </div>
                                        </br></br>
                                        <h4>Semester: </h4>
                                        <div class="table-responsive" id="table">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Semester</th>
                                                        <th>IPK</th>
                                                        <th>Jenis Laporan</th>
                                                        <th>Bukti</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>						 
                            </div>
                            <!-- End InvoiceBot-->
                        </div>
                        <div class="col-sm-12 text-center mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">TAMBAH LAPORAN</h3>
            </div>
            <?php echo form_open_multipart('dashboard/add', 'role="form" class="form-horizontal"'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-3">IPK</label>
                    <div class="col-xs-9">
                        <input type="text" name="ipk" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Jenis Dokumen</label>
                    <div class="col-xs-9">
                        <select class="form-control" name="jenis">
                            <option>Rekening</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Bukti</label>
                    <div class="col-xs-9">
                        <input type="file" name="uploaddok" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button class="btn btn-info" id="btn_simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalaAdd2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">TAMBAH LAPORAN</h3>
            </div>
            <div class="modal-body">
                <p>Anda hanya diperkenankan membuat laporan hanya sekali dalam 1 semester. Silakan edit laporan atau hapus laporan jika ingin membuat baru.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Tutup</button>
            </div>
        </div>
    </div>
</div>
