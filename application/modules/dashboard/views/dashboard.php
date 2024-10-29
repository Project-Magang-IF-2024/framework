<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Selamat Datang Di SIM SKRIPSI</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Profil Mahasiswa -->
<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profil Mahasiswa</h4>
                    <div class="row mt-4">
                    <div class="col-md-12">
                                            <p>Nama: <?= $peserta['nama_mhs'] ?></p>
                                            <p>NIM: <?= $peserta['nim'] ?></p>
                                            <p>Program Studi: <?= isset($peserta['nama_prodi']) ? $peserta['nama_prodi'] : 'Tidak tersedia' ?></p>
                                            <p>Status Keaktifan: <?= isset($peserta['status_keaktifan']) ? $peserta['status_keaktifan'] : 'Tidak tersedia' ?></p>
                                            <p>Angkatan: <?= $peserta['angkatan'] ?></p>
                                        </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bimbingan -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>Bimbingan Terbaru</h4>
                                    <?php if (!empty($bimbingan_terbaru)): ?>
                                        <p>Tanggal: <?= $bimbingan_terbaru['tgl_bimbingan'] ?></p>
                                        <p>Materi: <?= $bimbingan_terbaru['materi_bimbingan'] ?></p>
                                    <?php else: ?>
                                        <p>Tidak ada bimbingan terbaru yang disetujui.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistik Singkat -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statistik Singkat</h4>
                    <div class="row mt-4">
                                <div class="col-md-12">
                                    <p>Jumlah Bimbingan: <strong><?= $jumlah_bimbingan ?></strong></p>
                                    <p>Status Proposal: 
                                        <strong>
                                            <?= $status_proposal['acc'] ?> Disetujui, 
                                            <?= $status_proposal['pending'] ?> Pending, 
                                            <?= $status_proposal['ditolak'] ?> Ditolak
                                        </strong>
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $progress_proposal ?>%;" aria-valuenow="<?= $progress_proposal ?>" aria-valuemin="0" aria-valuemax="100"><?= $progress_proposal ?>%</div>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- table pengajuan -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Aksi Cepat</h4>
                    <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url('dashboard/add') ?>" class="btn btn-primary">Ajukan Proposal Baru</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Judul Proposal</th>
                                    <th>Periode Proposal</th>
                                    <th>Prodi Proposal</th>
                                    <th>NIM Mahasiswa</th>
                                    <th>Kode Proposal</th>
                                    <th>NIK Pembimbing 1</th>
                                    <th>NIK Pembimbing 2</th>
                                    <th>NIK Kaprodi</th>
                                    <th>Status Persetujuan</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                // print_r($data);
                                // die();
                                foreach($dataproposal as $u) { 
                                ?>
                                <tr>  
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $u->judul_proposal ?></td>
                                    <td><?php echo $u->periode_prop ?></td>
                                    <td><?php echo $u->prodi_prop ?></td>
                                    <td><?php echo $u->nim_prop ?></td>
                                    <td><?php echo $u->kode_prop ?></td>
                                    <td><?php echo $u->nik_pembimbing1 ?></td>
                                    <td><?php echo $u->nik_pembimbing2 ?></td>
                                    <td><?php echo $u->nik_kaprodi ?></td>
                                    <td><?php echo $u->acc_kaprodi == 1 ? 'Disetujui' : 'Tidak Disetujui' ?></td>
                                    <td>
                                        <?php echo anchor('proposal/lihat/'.$u->id, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">Lihat Data</button>'); ?>
                                        <?php echo anchor('proposal/edit/'.$u->id, '<button type="button" class="btn btn-primary text-center" style="margin-top:10px;width:100%;">Edit Data</button>'); ?>
                                        <a href="<?php echo base_url() ?>proposal/hapus/<?php echo $u->id ?>" class="btn btn-danger text-center" style="margin-top:10px;width:100%;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus Data</a>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">IMPORT DATA</h3>
            </div>
            <?php echo form_open_multipart('import/importx', 'role="form" class="form-horizontal"'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-3">File</label>
                    <div class="col-xs-9">
                        <input type="file" name="fileimport">
                    </div>
                    <br>
                    <label class="control-label col-xs-3">Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/TemplateMahasiswa.xlsx"> link</a> berikut.</label>
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
            </div>
        </div>
    </div>
</div>

                            

                        </div>
                        <div class="col-sm-12 text-center mt-3">test</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
