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
                <?php echo anchor('fakultas/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>        
                <button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Import Data</button>
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
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Kode Fakultas</th>
                                    <th>Nama Fakultas</th>
                                    <th>Singkatan Fakultas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($data as $u){ 
                                ?>
                                <tr>
                                    <td><?php echo $u->kode_fakultas ?></td>
                                    <td><?php echo $u->nama_fakultas ?></td>
                                    <td><?php echo $u->singkatan_fak ?></td>
                                    
                                    <?php $laporan = $this->db->from('laporan')->where('kode_fakultas', $u->kode_fakultas)->get()->num_rows(); 
                                    if($laporan != null){ ?>
                                        <td>Telah Laporan</td>
                                    <?php } else { ?>
                                        <td>Belum Laporan</td>
                                    <?php } ?>
                                    <td>
                                        <?php echo anchor('fakultas/history/'.$u->kode_fakultas, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">History Laporan</button>'); ?>
                                    </td>
                                    <?php $no++; ?>
                                </tr>
                                <?php } ?>
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
                    <label class="control-label col-xs-3">Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/Template_Fakultas.xlsx"> link</a> berikut.</label>
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
