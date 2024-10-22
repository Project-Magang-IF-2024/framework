<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Edit Data Kurikulum</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Data Kurikulum</li>
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
				   <?php echo form_open_multipart('kurikulum/edit', 'role="form" method="post" class="theme-form mega-form"'); 
				    echo form_hidden('id', $data['id']);
				   ?>
                    <div class="card">
                      <div class="card-header">
                        <h5>Form Edit Data Kurikulum</h5>
                      </div>
                      <div class="card-body">
                          <h6>Identitas Kurikulum</h6>
                          <div class="form-group">
                            <label class="col-form-label">Kode Matkul</label>
                            <input class="form-control" name="kode_matkul" value="<?php echo $data['kode_matkul'] ?>" type="text" placeholder="Isikan Kode Matakuliah">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Nama Matkul</label>
                            <input class="form-control" name="nama_matkul" value="<?php echo $data['nama_matkul'] ?>" type="text" placeholder="Isikan Nama Matakuliah">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">SKS Matakuliah</label>
                            <input class="form-control" name="sks_matkul" value="<?php echo $data['sks_matkul'] ?>" type="text" placeholder="Isikan SKS Matakuliah">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Semester</label>
                            <select class="form-control" name="smt_matkul" required>
                              <option value="1" <php echo ($data['smt_matkul'] == '1' ) ? 'selected' : '' ; ?>1</option>
                              <option value="2" <php echo ($data['smt_matkul'] == '2' ) ? 'selected' : '' ; ?>2</option>
                              <option value="3" <php echo ($data['smt_matkul'] == '3' ) ? 'selected' : '' ; ?>3</option>
                              <option value="4" <php echo ($data['smt_matkul'] == '4' ) ? 'selected' : '' ; ?>4</option>
                              <option value="5" <php echo ($data['smt_matkul'] == '5' ) ? 'selected' : '' ; ?>5</option>
                              <option value="6" <php echo ($data['smt_matkul'] == '6' ) ? 'selected' : '' ; ?>6</option>
                              <option value="7" <php echo ($data['smt_matkul'] == '7' ) ? 'selected' : '' ; ?>7</option>
                              <option value="8" <php echo ($data['smt_matkul'] == '8' ) ? 'selected' : '' ; ?>8</option>
                            </select>
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">SKS Teori</label>
                            <input class="form-control" name="sks_teori" value="<?php echo $data['sks_teori'] ?>" type="text" placeholder="Isikan SKS Teori">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">SKS Praktek</label>
                            <input class="form-control" name="sks_praktek" value="<?php echo $data['sks_praktek'] ?>" type="text" placeholder="Isikan SKS Praktek">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status_matkul" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="W" <php echo ($data['status_matkul'] == 'W' ) ? 'selected' : '' ; ?>W</option>
                                <option value="P" <php echo ($data['status_matkul'] == 'P' ) ? 'selected' : '' ; ?>P</option>
                            </select>
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Milik</label>
                            <select class="form-control" name="milik_matkul" required>
                              <option value="U" <php echo ($data['milik_matkul'] == 'U' ) ? 'selected' : '' ; ?>U</option>
                              <option value="F" <php echo ($data['milik_matkul'] == 'F' ) ? 'selected' : '' ; ?>F</option>
                              <option value="P" <php echo ($data['milik_matkul'] == 'P' ) ? 'selected' : '' ; ?>P</option>
                            </select>
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Versi</label>
                            <input class="form-control" name="versi_matkul" value="<?php echo $data['versi_matkul'] ?>" type="text" placeholder="Isikan Versi">
                          </div>
						  <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <select class="form-control" name="prodi_matkul" required>
                              <!-- Sesuaikan dengan kode prodi yang relevan -->
                              <option value="12" <php echo ($data['prodi_matkul'] == '12' ) ? 'selected' : '' ; ?>12</option>
                              <option value="13" <php echo ($data['prodi_matkul'] == '13' ) ? 'selected' : '' ; ?>13</option>
                              <option value="21" <php echo ($data['prodi_matkul'] == '21' ) ? 'selected' : '' ; ?>21</option>
                              <option value="22" <php echo ($data['prodi_matkul'] == '22' ) ? 'selected' : '' ; ?>22</option>
                              <option value="23" <php echo ($data['prodi_matkul'] == '23' ) ? 'selected' : '' ; ?>23</option>
                              <option value="31" <php echo ($data['prodi_matkul'] == '31' ) ? 'selected' : '' ; ?>31</option>
                              <option value="32" <php echo ($data['prodi_matkul'] == '32' ) ? 'selected' : '' ; ?>32</option>
                              <option value="41" <php echo ($data['prodi_matkul'] == '41' ) ? 'selected' : '' ; ?>41</option>
                              <option value="42" <php echo ($data['prodi_matkul'] == '42' ) ? 'selected' : '' ; ?>42</option>
                              <option value="49" <php echo ($data['prodi_matkul'] == '49' ) ? 'selected' : '' ; ?>49</option>
                              <option value="51" <php echo ($data['prodi_matkul'] == '51' ) ? 'selected' : '' ; ?>51</option>
                              <option value="52" <php echo ($data['prodi_matkul'] == '52' ) ? 'selected' : '' ; ?>52</option>
                              <option value="78" <php echo ($data['prodi_matkul'] == '78' ) ? 'selected' : '' ; ?>78</option>
                              <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('kurikulum','<button type="button" class="btn btn-danger text-center" style="margin-top:10px;width:30%;">Kembali</button>'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>		                               
</div>
        