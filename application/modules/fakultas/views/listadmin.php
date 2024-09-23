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
                <!-- Button Tambah Fakultas -->
                <?php echo anchor('fakultas/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Fakultas</button>'); ?>        
                <!-- Button Import Fakultas -->
                <button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Import Fakultas</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Fakultas</h4>
                    <div class="table-responsive">
                        <!-- Tabel Fakultas -->
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>KODE FAKULTAS</th>
                                    <th>NAMA FAKULTAS</th>
                                    <th>SINGKATAN FAKULTAS</th>
                                    <th>TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($result as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $row->kode_fakultas ?></td> <!-- Menampilkan Kode Fakultas -->
                                    <td><?php echo $row->nama_fakultas ?></td> <!-- Menampilkan Nama Fakultas -->
                                    <td><?php echo $row->singkatan_fak ?></td> <!-- Menampilkan Singkatan Fakultas -->
                                    <td>
                                        <!-- Aksi Lihat Fakultas -->
                                        <?php echo anchor('fakultas/lihat/'.$row->kode_fakultas, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">Lihat</button>'); ?>
                                        <!-- Aksi Edit Fakultas -->
                                        <?php echo anchor('fakultas/edit/'.$row->kode_fakultas, '<button type="button" class="btn btn-primary text-center" style="margin-top:10px;width:100%;">Edit</button>'); ?>
                                        <!-- Aksi Hapus Fakultas -->
                                        <a href="<?php echo base_url() ?>fakultas/hapus/<?php echo $row->kode_fakultas ?>" class="btn btn-danger text-center" style="margin-top:10px;width:100%;" onclick="return confirm('Apakah anda yakin ingin menghapus fakultas ini?');">Hapus</a>
                                    </td>
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
                <h3 class="modal-title" id="myModalLabel">IMPORT DATA FAKULTAS</h3>
            </div>
            <!-- Form Import Data Fakultas -->
            <?php echo form_open_multipart('import/importFakultas', 'role="form" class="form-horizontal"'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-3">File</label>
                    <div class="col-xs-9">
                        <input type="file" name="fileimport">
                    </div>
                    <br>
                    <label class="control-label col-xs-3">Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/TemplateFakultas.xlsx"> link</a> berikut.</label>
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
