<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Proposal</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Proposal</li>
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
                            <h3>Proposal</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-striped display w-100" id="laporan-bimbingan" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID Proposal</th>
                                            <th>Judul Proposal</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Status Proposal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($proposals as $proposal): ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $proposal['id']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="f-w-600"><?php echo $proposal['judul_proposal']; ?></h6>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="flex-shrink-0">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-w-600"><?php echo $proposal['nama_mahasiswa']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <!-- Tambahkan atribut data-id untuk ID proposal dan buat elemen bisa diklik -->
                                                <span 
                                                    class="badge <?php echo $proposal['acc_kaprodi'] == 1 ? 'bg-success' : 'bg-danger'; ?> pointer-cursor toggle-status"
                                                    data-id="<?php echo $proposal['id']; ?>"
                                                    data-status="<?php echo $proposal['acc_kaprodi']; ?>">
                                                    <?php echo $proposal['acc_kaprodi'] == 1 ? 'Hadir' : 'Tidak Hadir'; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <style>
                                .pointer-cursor {
                                    cursor: pointer;
                                    transition: transform 0.1s ease-in-out;
                                }
                                .pointer-cursor:hover {
                                    transform: scale(1.05);
                                }
                            </style>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).on('click', '.toggle-status', function() {
                                    var id = $(this).data('id');
                                    $.ajax({
                                        url: "<?php echo base_url('dashboard/update_status'); ?>",
                                        method: "POST",
                                        data: { id: id },
                                        success: function(response) {
                                            console.log(response); // Untuk memeriksa respon di konsol
                                            // Handle response dari server
                                            if (response.success) {
                                                location.reload();
                                            } else {
                                                alert('anda tidak memiliki izin edit/gagal mengubah');
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText); // Cek di konsol jika terjadi error
                                            alert('Terjadi kesalahan dalam mengubah status');
                                        }
                                    });
                                });
                                </script>
                        </div>
                    </div>
                </div>
                    
                <div class="col-12"> <!-- Menggunakan col-12 agar tabel mengambil seluruh lebar layar -->
                    <div class="card recent-activities" style="width: 100%;"> <!-- Memastikan card menggunakan lebar penuh -->
                        <div class="card-header card-no-border">
                            <h3>Status Proposal</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-striped display w-100" id="laporan-bimbingan" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NIK Dosen</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($status_proposals)) : ?>
                                            <?php foreach($status_proposals as $status): ?>
                                            <tr>
                                                <td>
                                                    <h6 class="f-w-600"><?php echo $status['id']; ?></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-600"><?php echo $status['nik_dsn']; ?></h6>
                                                </td>
                                                <td>
                                                    <h6 class="f-w-600"><?php echo $status['status_dosen']; ?></h6>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data status proposal yang tersedia.</td>
                                            </tr>
                                        <?php endif; ?>
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