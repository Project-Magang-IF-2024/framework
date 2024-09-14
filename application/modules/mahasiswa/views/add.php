<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Input Data Mahasiswa</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Dosen</li>
                    <li class="breadcrumb-item">Input Data</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">                     
	<div class="col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-sm-12">
				   <?php echo form_open_multipart('mahasiswa/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                    <div class="card">
                      <div class="card-header">
                        <h5>Form Input Data Mahasiswa</h5>
                      </div>
                      <div class="card-body">
                          <h6>Identitas Diri</h6>
                          <div class="form-group">
                            <label class="col-form-label">Nomor KK</label>
                            <input class="form-control" name="nokk" type="text" placeholder="Isikan No KK">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">NIK Orang Tua/Wali</label>
                            <input class="form-control" name="nikortu" type="text" placeholder="Isikan NIK Ortu">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Orang Tua/Wali</label>
                            <input class="form-control" name="namaortu" type="text" placeholder="Isikan Nama Ortu">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">NIK Mahasiswa</label>
                            <input class="form-control" name="nik" type="text" placeholder="Isikan NIK Mahasiswa">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor Induk Mahasiswa</label>
                            <input class="form-control" name="nim" type="text" placeholder="Isikan NIM">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama</label>
                            <input class="form-control" name="nama" type="text" placeholder="Isikan Nama">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Alamat</label>
                            <input class="form-control" name="alamat" type="text" placeholder="Isikan alamat">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Kabupaten</label>
                            <input class="form-control" name="kabupaten" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor HP</label>
                            <input class="form-control" name="nohp" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <input class="form-control" name="kodeprodi" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Prodi</label>
                            <input class="form-control" name="namaprodi" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Semester</label>
                            <input class="form-control" name="semester" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">IPK</label>
                            <input class="form-control" name="ipk" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Angkatan</label>
                            <input class="form-control" name="angkatan" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Bank</label>
                            <input class="form-control" name="bank" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Rekening</label>
                            <input class="form-control" name="namarekening" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor Rekening</label>
                            <input class="form-control" name="norekening" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Jenis</label>
                            <input class="form-control" name="jenis" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input class="form-control" name="username" type="text" placeholder="Isikan Username atau NIK">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" name="password" type="text" placeholder="Isikan Password">
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                      </div>
                    </div>
					</form>
                  </div>
                </div>
              </div>		                               
</div>
        