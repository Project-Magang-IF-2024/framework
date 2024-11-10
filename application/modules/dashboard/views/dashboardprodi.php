<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-xl-12 xl-100 chart_data_right box-col-12"> 
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body right-chart-content"> 
						<h2><span>Ringkasan Proposal Mahasiswa</span></h2>
                        <h4>Jumlah Proposal yang Dibimbing : </h4>
                        <p><?= isset($jumlah_proposal) ? $jumlah_proposal : 0; ?></p>
                        <h4>Status Proposal : </h4>
                        <?php if (!empty($status_proposal)) : ?>
                            <ul>
                                <?php foreach ($status_proposal as $status) : ?>
                                    <li><?= $status['kode_prop'] ?> - <?= ($status['acc_kaprodi'] == 1) ? 'Disetujui' : 'Belum Disetujui'; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>Tidak ada status proposal yang ditemukan.</p>
                        <?php endif; ?>

                        <h4>Status Ujian Proposal : </h4>
                        <?php if (!empty($status_ujian_proposal)) : ?>
                            <ul>
                                <?php foreach ($status_ujian_proposal as $ujian) : ?>
                                    <li><?= $ujian['kode_ujian_proposal'] ?> - <?= $ujian['revisi_pbb1'] ?> - <?= $ujian['revisi_pbb2'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>Tidak ada status ujian proposal yang ditemukan.</p>
                        <?php endif; ?>
                    </div>
				</div>
			</div>
        </div>
    </div>
    
		
</div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-xl-12 xl-100 chart_data_right box-col-12"> 
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body right-chart-content"> 
                        <h2><span>Jumlah Mahasiswa</span></h2>
						<h4>Total Mahasiswa Terdaftar : </h4>
                        <p><?= isset($jumlah_mahasiswa) ? $jumlah_mahasiswa : 0; ?></p>
                    </div>
				</div>
			</div>
        </div>
    </div>
    
		
</div>
</div>

