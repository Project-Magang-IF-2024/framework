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
        <div class="col-7 align-self-center">
            <h3>Data Bimbingan Proposal</h3>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <?php echo anchor('bimbinganproposal/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>
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
                    <h4 class="card-title">Data Bimbingan Proposal</h4>
                    <div class="table-responsive">
                        <table class="display" id="datatable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIM</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>TGL BIMBINGAN</th>
                                    <th>MATERI BIMBINGAN</th>
                                    <th>KODE PRODI</th>
                                    <th>STATUS LAPORAN</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($data as $u) { 
                                    // Ambil status laporan
                                    $laporan = $this->db->from('tblbimbinganproposal')
                                        ->where('kd_prop', $u->kd_prop)
                                        ->where('tgl_bimbingan', $u->tgl_bimbingan)
                                        ->get()->num_rows();
                                ?>
                                <tr>  
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $u->nim ?></td>
                                    <td><?php echo $u->nik ?></td>
                                    <td><?php echo $u->nama_mhs ?></td>
                                    <td><?php echo $u->tgl_bimbingan ?></td>
                                    <td><?php echo $u->materi_bimbingan ?></td>
                                    <td><?php echo $u->kd_prop ?></td>
                                    <td><?php echo ($laporan > 0) ? 'Telah Laporan' : 'Belum Laporan'; ?></td>
                                    <td>
                                        <?php echo anchor('bimbinganproposal/history/'.$u->id, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">History Laporan</button>'); ?>
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
                            <input type="file" name="fileimport" required>
                        </div>
                        <br>
                        <label class="control-label col-xs-3">Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/Template_Karyawan_Baru.xlsx">link</a> berikut.</label>
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
