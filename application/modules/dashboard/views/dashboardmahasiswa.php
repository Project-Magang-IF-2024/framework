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
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Mahasiswa</h4>
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                        <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIM</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>NOMOR HP</th>
                                    <th>PRODI</th>
                                    <th>ANGKATAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($mahasiswa as $u) { 
                                ?>
                                <tr>  
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $u['nim']; ?></td>
                                    <td><?php echo $u['nik_mhs']; ?></td>
                                    <td><?php echo $u['nama_mhs']; ?></td>
                                    <td><?php echo $u['tempat_lahir_mhs']; ?></td>
                                    <td><?php echo $u['tanggal_lahir_mhs']; ?></td>
                                    <td><?php echo $u['alamat_mhs']; ?></td>
                                    <td><?php echo $u['no_hp_mhs']; ?></td>
                                    <td><?php echo $u['prodi_mhs']; ?></td>
                                    <td><?php echo $u['angkatan']; ?></td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
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