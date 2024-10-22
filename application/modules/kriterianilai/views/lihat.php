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
                    <h3>Data Kriteria Nilai</h3>
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
                  <!-- <div class="media-left">
                    <img class="media-object rounded-square img-120" src="<?php echo base_url() ?>assets/images/user/3.jpg" alt="">
                  </div>
                  <div class="media-body m-l-20">
                    <h4 class="media-heading"><?php echo $peserta['nama_mhs'] ?> </br>NIM : <?php echo $peserta['nim'] ?></h4>
                    <p>Semester : <strong><?php echo $peserta['angkatan'] ?></strong><br>Prodi : <strong><?php echo $peserta['prodi_mhs'] ?></strong></p>
                  </div> -->
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
                          <h6 class="p-2 mb-0">Data Kriteria Nilai</h6>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Kode Kriteria</label>
                        </td>
                        <td>
                          <p class="itemtext"><?php echo $peserta['kode_kriteria'] ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Nama Kriteria</label>
                        </td>
                        <td>
                          <p class="itemtext"><?php echo $peserta['nama_kriteria'] ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Jenis</label>
                        </td>
                        <td>
                          <p class="itemtext"><?php echo $peserta['jenis'] == 'P' ? 'Proposal' : 'Skripsi' ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Status</label>
                        </td>
                        <td>
                          <p class="itemtext"><?php echo $peserta['status'] == 1 ? 'Dipakai' : 'Tidak Dipakai' ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Versi</label>
                        </td>
                        <td>
                          <p class="itemtext"><?php echo $peserta['versi'] ?></p>
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
            <?php echo anchor('kriterianilai', '<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
          </div>
          <!-- End Invoice-->
          <!-- End Invoice Holder-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->