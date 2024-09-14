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
                              <!-- End Info-->
                            </div>
                            <div class="col-sm-6">
                              <div class="text-md-right">
                                <h3>Data Mahasiswa</h3>
                                <p>Dicetak Tanggal: <?php echo date('M') ?><span> <?php echo date("d"); ?>, <?php echo date("Y"); ?></span><br></p>
                              </div>
                              <!-- End Title-->
                            </div>
                          </div>
                        </div>
                        <hr>
                        <!-- End InvoiceTop-->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="media">
                              <div class="media-left"><img class="media-object rounded-square img-120" src="<?php echo base_url() ?>assets/images/user/3.jpg" alt=""></div>
                              <div class="media-body m-l-20">
                                <h4 class="media-heading"><?php echo $peserta['nama'] ?> </br>NIM : <?php echo $peserta['nim'] ?></h4>
                                <p>Semester : <strong><?php echo $peserta['semester'] ?></strong><br>Angkatan : <strong><?php echo $peserta['angkatan'] ?></strong><br>Prodi : <strong><?php echo $peserta['namaprodi'] ?></strong><br><span>Beasiswa : <strong><?php echo $peserta['jenis'] ?></strong></span></span></p>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <!-- End Invoice Mid-->
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
                                    <label>Bank</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['norekening'] ?> (<?php echo $peserta['bank'] ?>)</p>
                                  </td>
                                </tr>
								
								<tr>
                                  <td>
                                    <label>Nama Rekening</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['namarekening'] ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>No HP</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['nohp'] ?></p>
                                  </td>
                                </tr>
								<tr>
								<tr>
                                  <td>
                                    <label>Alamat</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['alamat'] ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>Kabupaten</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['kabupaten'] ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>NIK Ortu</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['nikortu'] ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>Nama Ortu</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $peserta['namaortu'] ?></p>
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
						<?php 
						$semester = $this->db->from('semester')->where('status', 'Aktif')->get()->row_array();
						$ceklaporan = $this->db->from('laporan')->where('id_mahasiswa', $peserta['id_mahasiswa'])->where('id_semester',	$semester['id_semester'])->get()->num_rows();					
						if($ceklaporan == null){
							?>
				<button class="btn waves-effect waves-light btn-rounded btn-success text-center" data-toggle="modal" data-target="#ModalaAdd">Tambah Laporan</button>
						<?php } else { ?>
						<button class="btn waves-effect waves-light btn-rounded btn-success text-center" data-toggle="modal" data-target="#ModalaAdd2">Tambah Laporan</button>
						<?php } ?>
			</div>
			</br>
			</br>
			<h4>Semester : <?php echo $semester['nama'] ?></h4>
                          <div class="table-responsive" id="table">
                            <table class="table table-bordered table-striped">
							<thead>
							<tr>
							<th>No</th>
							<th>Semester</th>
							<th>IPK</th>
							<th>Jenis Laporan</th>
							<th>Bukti</th>
							<th></th>
							</tr>
							</thead>
                              <tbody>
							  <?php $laporan = $this->db->from('laporan')->where('id_mahasiswa', $peserta['id_mahasiswa'])->get()->result();
								$ceklaporan = $this->db->from('laporan')->where('id_mahasiswa', $peserta['id_mahasiswa'])->get()->result();
								
								$no=1;
								if($ceklaporan != null){
								foreach($laporan as $u){
									$semester = $this->db->from('semester')->where('id_semester', $u->id_semester)->get()->row_array();
								 ?>
								 <tr>
								 <td><?php echo $no++ ?></td>
								 <td><?php echo $semester['nama'] ?></td>
								 <td><?php echo $u->ipk ?></td>
								 <td><?php echo $u->jenis ?></td>
								 <td><img src="<?php echo base_url() ?>uploads/<?php echo $u->bukti ?>" width="180px"></td>
								 <td >
									<?php echo anchor('dashboard/edit/'.$u->id_laporan,'<button type="button" class="btn btn-primary text-center" style="margin-top:10px">Edit Data</button>'); ?> <a href="<?php echo base_url() ?>dashboard/hapus/<?php echo $u->id_laporan ?>" class="btn btn-danger text-center" style="margin-top:10px" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus Data</a>
								</td>
								 </tr>
								<?php } ?>
								<?php } else { ?>
                                <tr>
								<td colspan="6" style="text-align:center"><strong>Belum Ada Data Laporan</strong></td>
								</tr>
								<?php } ?>
                              </tbody>
                            </table>
                          </div>
						</div>
						
						</div>						 
                          
                        </div>
                        <!-- End InvoiceBot-->
                      </div>
                      <div class="col-sm-12 text-center mt-3">
						
                       
                      </div>
                      <!-- End Invoice-->
                      <!-- End Invoice Holder-->
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
            <?php
            echo form_open_multipart('dashboard/add', 'role="form" class="form-horizontal"');
            ?>
                <div class="modal-body">
					<div class="form-group">
                        <label class="control-label col-xs-3" >IPK</label>
                        <div class="col-xs-9">
                           <input type="text" name="ipk" class="form-control">
                        </div>
						
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Dokumen</label>
                        <div class="col-xs-9">
                           <select class="form-control" name="jenis">
								<option>Rekening</option>
						   </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bukti</label>
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
					
				<p>Anda hanya diperkenankan membuat laporan hanya sekali dalam 1 semester silahkan edit laporan atau hapus laporan jika ingin membuat baru.</p>
                </div>
 
                <div class="modal-footer">
                    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
                </div>
            </div>
            </div>
        </div>