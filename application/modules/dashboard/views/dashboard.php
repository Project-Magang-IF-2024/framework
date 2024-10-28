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
                                            <div class="media-left">
                                                <img class="media-object img-60" src="<?php echo base_url() ?>gambar/unusida.png" alt="">
                                            </div>
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

                            <!-- Informasi Mahasiswa -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object rounded-square img-120" src="<?php echo base_url() ?>assets/images/user/3.jpg" alt="">
                                        </div>
                                        <div class="media-body m-l-20">
                                            <h3>Profil Mahasiswa</h3>
                                            <p>Nama: <?= $peserta['nama_mhs'] ?></p>
                                            <p>NIM: <?= $peserta['nim'] ?></p>
                                            <p>Program Studi: <?= isset($peserta['nama_prodi']) ? $peserta['nama_prodi'] : 'Tidak tersedia' ?></p>
                                            <p>Status Keaktifan: <?= isset($peserta['status_keaktifan']) ? $peserta['status_keaktifan'] : 'Tidak tersedia' ?></p>
                                            <p>Angkatan: <?= $peserta['angkatan'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <!-- Notifikasi Proposal -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Notifikasi Proposal Terbaru</h4>
                                    <?php if (!empty($proposal)): ?>
                                        <p>Status Proposal: <strong><?php echo $proposal['status'] == 'acc' ? 'Disetujui' : 'Menunggu Persetujuan'; ?></strong></p>
                                        <?php if (!empty($proposal['revisi'])): ?>
                                            <p>Revisi Terbaru: <strong><?php echo $proposal['revisi']; ?></strong></p>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <p>Belum ada proposal terbaru.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- End Notifikasi Proposal -->

                            <!-- Nilai Proposal -->
<!-- Nilai Proposal -->
<!-- Nilai Proposal -->
<!-- Nilai Proposal -->
<div class="row mt-4">
    <div class="col-md-12">
        <h4>Nilai Proposal</h4>
        
        <?php if (!empty($nilai_proposal)): ?>
            <ul>
                <?php foreach ($nilai_proposal as $nilai): ?>
                    <li>
                        Penguji: <?= $nilai['nama_penguji'] ?><br>
                        Nilai: <?= $nilai['nilai'] ?><br>
                        Revisi: <?= $nilai['revisi'] ?><br>
                        Kriteria: <?= $nilai['nama_kriteria'] ?><br>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Belum ada nilai ujian proposal terbaru.</p>
        <?php endif; ?>
    </div>
</div>
<!-- End Nilai Proposal -->

<!-- End Nilai Proposal -->
<!-- End Nilai Proposal -->


                            <!-- End Nilai Proposal -->

                            <!-- Bimbingan Terbaru -->
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
                            <!-- End Bimbingan Terbaru -->

                            <!-- Aksi Cepat -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>Aksi Cepat</h4>
                                    <div class="btn-group">
                                        <a href="<?php echo base_url('proposal/ajukan') ?>" class="btn btn-primary">Ajukan Proposal Baru</a>
                                        <a href="<?php echo base_url('ujian/jadwal') ?>" class="btn btn-secondary">Lihat Jadwal Ujian</a>
                                        <a href="<?php echo base_url('proposal/revisi') ?>" class="btn btn-info">Lihat Revisi Proposal</a>
                                        <a href="<?php echo base_url('profil/update') ?>" class="btn btn-warning">Update Profil</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Aksi Cepat -->

                            <!-- Statistik Singkat -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h4>Statistik Singkat</h4>
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
                            <!-- End Statistik Singkat -->

                        </div>
                        <div class="col-sm-12 text-center mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
