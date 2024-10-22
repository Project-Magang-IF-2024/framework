<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'csv'
            ]
        });
    });
</script>

<div class="page-breadcrumb" style="margin-top:120px; margin-right:20px">
    <div class="row">
        <div class="col-7 align-self-center"></div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <?php echo anchor('mahasiswa/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>        
                <button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Import Data</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body custom-input">
                    <h4 class="card-title">Data Mahasiswa</h4>
                    <form class="row g-3">
                      <div class="col-12"> 
                        <label class="form-label" for="nama-lengkap">Nama Lengkap</label>
                        <input class="form-control" id="nama-lengkap" type="text" placeholder="Nama Lengkap" aria-label="Nama Lengkap">
                      </div>
                      <div class="col-12"> 
                        <label class="form-label" for="nim">NIM</label>
                        <input class="form-control" id="nim" type="text" placeholder="NIM" aria-label="NIM">
                      </div>
                      <div class="col-12"> 
                        <label class="form-label" for="nik">NIK</label>
                        <input class="form-control" id="nik" type="text" placeholder="NIK" aria-label="NIK">
                      </div>
                      <div class="col-12"> 
                        <label class="form-label" for="jenis-kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis-kelamin" aria-label="Jenis Kelamin">
                            <option value="">Select Option</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="col-12"> 
                        <label class="form-label" for="tempat-lahir">Tempat Lahir</label>
                        <input class="form-control" id="tempat-lahir" type="text" placeholder="Tempat Lahir" aria-label="Tempat Lahir">
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="date">Tanggal Lahir</label>
                        <input class="form-control" id="date" type="date" aria-label="Date">
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="alamat">Alamat Lengkap</label>
                        <input class="form-control" id="alamat" type="text" aria-label="Alamat Lengkap">
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" placeholder="Email" aria-label="Email">
                      </div>
                      <div class="col-12"> 
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" type="password" aria-label="Password">
                      </div>    
                      <div class="col-12">
                        <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">IMPORT DATA</h3>
            </div>
            <?php echo form_open_multipart('import/importx', 'role="form" class="form-horizontal"'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-3">File</label>
                    <div class="col-xs-9">
                        <input type="file" name="fileimport">
                    </div>
                    <br>
                    <label class="control-label col-xs-3">Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/TemplateMahasiswa.xlsx"> link</a> berikut.</label>
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
