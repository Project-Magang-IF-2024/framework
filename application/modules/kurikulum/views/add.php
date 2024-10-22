<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Input Data Kurikulum</h3>
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
				   <?php echo form_open_multipart('kurikulum/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                    <div class="card">
                      <div class="card-header">
                        <h5>Form Input Data Kurikulum</h5>
                      </div>
                      <div class="card-body">
                          <h6>Identitas Kurikulum</h6>
                          <div class="form-group">
                            <label class="col-form-label">Kode Matakuliah</label>
                            <input class="form-control" name="kode_matkul" type="text" placeholder="Isikan Kode Matakuliah" required>
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Matakuliah</label>
                            <input class="form-control" name="nama_matkul" type="text" placeholder="Isikan Nama Matakuliah" required>
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">SKS Matakuliah</label>
                            <input class="form-control" name="sks_matkul" type="text" placeholder="SKS Matakuliah" required>
                          </div>
              <div class="form-group">
                          <label class="col-form-label">Semester</label>
                          <select class="form-control" name="smt_matkul" required>
                            <option value="" disabled selected>Pilih Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                          </select>
                        </div>
              <div class="form-group">
                            <label class="col-form-label">SKS Teori</label>
                            <input class="form-control" name="sks_teori" type="text" placeholder="Isikan SKS Teori" required>
                          </div>
              <div class="form-group">
                            <label class="col-form-label">SKS Praktek</label>
                            <input class="form-control" name="sks_praktek" type="text" placeholder="SKS Praktek" required>
                          </div>
              <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status_matkul" required>
                              <option value="" disabled selected>Pilih Status</option>
                              <option value="W">W</option>
                              <option value="P">P</option>
                          </select>
                          </div>
              <div class="form-group">
                            <label class="col-form-label">Milik</label>
                            <select class="form-control" name="milik_matkul" required>
                              <option value="" disabled selected>Pilih Milik</option>
                              <option value="U">U</option>
                              <option value="F">F</option>
                              <option value="P">P</option>
                            </select>
                          </div>
              <div class="form-group">
                            <label class="col-form-label">Versi</label>
                            <input class="form-control" name="versi_matkul" type="text" placeholder="Versi" required>
                          </div>
              <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <select class="form-control" name="prodi_matkul" required>
                              <option value="" disabled selected>Pilih Kode Prodi</option>
                              <!-- Sesuaikan dengan kode prodi yang relevan -->
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="31">31</option>
                              <option value="32">32</option>
                              <option value="41">41</option>
                              <option value="42">42</option>
                              <option value="49">49</option>
                              <option value="51">51</option>
                              <option value="52">52</option>
                              <option value="78">78</option>
                              <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
                          </div>
              </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    </div>
                  </div>
             </div>
        </div>
    </div>		                               
</div>
        