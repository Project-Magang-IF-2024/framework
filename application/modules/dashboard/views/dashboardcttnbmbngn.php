<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Catatan Bimbingan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Catatan Bimbingan</li>
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
                    <div class="col-12"> <!-- Menggunakan col-12 agar tabel mengambil seluruh lebar layar -->
                    <div class="card recent-activities" style="width: 100%;"> <!-- Memastikan card menggunakan lebar penuh -->
                        <div class="card-header card-no-border">
                            <h3>Catatan Bimbingan</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-striped display w-100" id="laporan-bimbingan" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID Catatan</th>
                                            <th>Mahasiswa</th>
                                            <th>Proposal</th>
                                            <th>Tanggal</th>
                                            <th>Isi Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($catatan_bimbingan as $catatan): ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $catatan['id']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $catatan['nama_mhs']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $catatan['judul_proposal']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="f-w-600"><?php echo $catatan['tgl_bimbingan']; ?></h6>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $catatan['materi_bimbingan']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
                    </div>
				</div>
			</div>
        </div>
    </div>
    
		
</div>
</div>