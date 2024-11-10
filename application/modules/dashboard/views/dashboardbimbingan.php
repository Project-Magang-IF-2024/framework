<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Bimbingan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Bimbingan</li>
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
                            <h3>Bimbingan</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-striped display w-100" id="laporan-bimbingan" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Mahasiswa Bimbingan</th>
                                            <th>Judul Proposal</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Materi Bimbingan</th>
                                            <th>Paraf Pembimbing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($jadwal_bimbingan as $bimbingan): ?>
                                        <tr>
                                            <td><?php echo $bimbingan['nama_mhs']; ?></td>
                                            <td><?php echo $bimbingan['judul_proposal']; ?></td>
                                            <td><?php echo $bimbingan['tgl_bimbingan']; ?></td>
                                            <td><?php echo $bimbingan['materi_bimbingan']; ?></td>
                                            <td>
                                                <span 
                                                    class="badge <?php echo $bimbingan['paraf_pembimbing'] == 1 ? 'bg-success' : 'bg-danger'; ?> pointer-cursor toggle-status"
                                                    data-id="<?php echo $bimbingan['id']; ?>"
                                                    data-status="<?php echo $bimbingan['paraf_pembimbing']; ?>">
                                                    <?php echo $bimbingan['paraf_pembimbing'] == 1 ? 'Hadir' : 'Tidak Hadir'; ?>
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
                                        url: "<?php echo base_url('dashboard/update_paraf'); ?>",
                                        method: "POST",
                                        data: { id: id },
                                        success: function(response) {
                                            console.log(response); // Untuk memeriksa respon di konsol
                                            // Handle response dari server
                                            if (response.success) {
                                                location.reload();
                                            } else {
                                                alert('Gagal mengubah status paraf');
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

                    </div>
				</div>
			</div>
        </div>
    </div>
    
		
</div>
</div>