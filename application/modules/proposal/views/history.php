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
                          <div class="table-responsive" id="table">
                            <table class="table table-bordered table-striped">
                              <tbody>
                                <tr>
                                  <td colspan="2">
                                    <h6 class="p-2 mb-0">History Laporan Beasiswa</h6>
                                  </td>
                                </tr>
								<?php $laporan = $this->db->from('laporan')->where('id_mahasiswa', $peserta['id_mahasiswa'])->get()->result();
								$ceklaporan = $this->db->from('laporan')->where('id_mahasiswa', $peserta['id_mahasiswa'])->get()->result();
								if($ceklaporan != null){
								foreach($laporan as $l){
									$semester = $this->db->from('semester')->where('id_semester', $l->id_semester)->get()->row_array();
								?>
								<tr>
                                  <td colspan="2">
                                    <p class="p-2 mb-0">Laporan <?php echo ($semester['nama']) ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>Jenis</label>
                                  </td>
                                  <td>
                                    <p class="itemtext"><?php echo $l->jenis ?></p>
                                  </td>
                                </tr>
								<tr>
                                  <td>
                                    <label>Bukti</label>
                                  </td>
                                  <td>
                                    <img src="<?php echo base_url() ?>uploads/bukti/<?php echo $l->bukti ?>" width="180px">
                                  </td>
                                </tr>
								<?php } ?>
								<?php }else { ?>
								<tr>
                                  <td colspan="2">
                                    <p class="p-2 mb-0" style="text-align:center; font-size:15px;"><strong>Belum ada laporan</strong></p>
                                  </td>
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
						<?php echo anchor('mahasiswa','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                       
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