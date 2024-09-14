<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Edit Data mahasiswa</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Mahasiswa</li>
                    <li class="breadcrumb-item">Edit Data</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">                     
	<div class="col-sm-12 col-xl-12">
                <div class="row">
                  <div class="col-sm-12">
				   <?php echo form_open_multipart('mahasiswa/edit', 'role="form" method="post" class="theme-form mega-form"'); 
				    echo form_hidden('id_mahasiswa', $data['id_mahasiswa']);
				   ?>
                    <div class="card">
                      <div class="card-header">
                        <h5>Form Edit Data mahasiswa</h5>
                      </div>
                      <div class="card-body">
                          <h6>Identitas Diri</h6>
                          <div class="form-group">
                            <label class="col-form-label">Nomor KK</label>
                            <input class="form-control" name="nokk" value="<?php echo $data['nokk'] ?>" type="text" placeholder="Isikan No KK">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">NIK Orang Tua/Wali</label>
                            <input class="form-control" name="nikortu" value="<?php echo $data['nikortu'] ?>" type="text" placeholder="Isikan NIK Ortu">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Orang Tua/Wali</label>
                            <input class="form-control" name="namaortu" value="<?php echo $data['namaortu'] ?>" type="text" placeholder="Isikan Nama Ortu">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">NIK Mahasiswa</label>
                            <input class="form-control" name="nik" value="<?php echo $data['nik'] ?>" type="text" placeholder="Isikan NIK Mahasiswa">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor Induk Mahasiswa</label>
                            <input class="form-control" name="nim" value="<?php echo $data['nim'] ?>" type="text" placeholder="Isikan NIM">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama</label>
                            <input class="form-control" name="nama" value="<?php echo $data['nama'] ?>" type="text" placeholder="Isikan Nama">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Alamat</label>
                            <input class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>" type="text" placeholder="Isikan alamat">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Kabupaten</label>
                            <input class="form-control" name="kabupaten" value="<?php echo $data['kabupaten'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor HP</label>
                            <input class="form-control" name="nohp" value="<?php echo $data['nohp'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <input class="form-control" name="kodeprodi" value="<?php echo $data['kodeprodi'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Prodi</label>
                            <input class="form-control" name="namaprodi" value="<?php echo $data['namaprodi'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Semester</label>
                            <input class="form-control" name="semester" value="<?php echo $data['semester'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">IPK</label>
                            <input class="form-control" name="ipk" value="<?php echo $data['ipk'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Angkatan</label>
                            <input class="form-control" name="angkatan" value="<?php echo $data['angkatan'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Bank</label>
                            <input class="form-control" name="bank" value="<?php echo $data['bank'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Rekening</label>
                            <input class="form-control" name="namarekening" value="<?php echo $data['namarekening'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nomor Rekening</label>
                            <input class="form-control" name="norekening" value="<?php echo $data['norekening'] ?>" type="text">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Jenis</label>
                            <input class="form-control" name="jenis" value="<?php echo $data['jenis'] ?>" type="text">
                          </div>
						  
						  <div class="form-group">
                            <label class="col-form-label">Username/NIK</label>
                            <input class="form-control" name="username" value="<?php echo $data['username'] ?>" type="text" placeholder="Isikan Username atau NIK">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" name="password" type="text" value="<?php echo $data['password'] ?>" placeholder="Isikan Password">
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('mahasiswa','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                      </div>
                    </div>
					</form>
                  </div>
                </div>
              </div>		                               
</div>
        