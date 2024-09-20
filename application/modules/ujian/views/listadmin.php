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
                <?php echo anchor('ujian/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>        
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
                    <h4 class="card-title">Data Ujian Proposal</h4>
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Judul Proposal</th>
                                    <th>Periode Ujian Proposal</th>
                                    <th>Kode Proposal</th>
                                    <th>Jadwal Ujian</th>
                                    <th>Ruangan Ujian</th>
                                    <th>NIK Pembimbing 1</th>
                                    <th>NIK Pembimbing 2</th>
                                    <th>Catatan Pembimbing 1</th>
                                    <th>Catatan Pembimbing 2</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                // print_r($data);
                                // die();
                                foreach($data as $u) { 
                                ?>
                                <tr>  
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $u->judulnya_proposal ?></td>
                                    <td><?php echo $u->periode_ujian_proposal ?></td>
                                    <td><?php echo $u->kd_proposal ?></td>
                                    <td><?php echo $u->hari_ujian_proposal ?> <?php echo $u->tgl_ujian_proposal?> pukul <?php echo $u->jam_ujian_proposal ?> WIB</td>
                                    <td><?php echo $u->ruang_ujian_proposal ?></td>
                                    <td><?php echo $u->nik_pbb1_ujian_proposal ?></td>
                                    <td><?php echo $u->nik_pbb2_ujian_proposal ?></td>
                                    <td>
                                        Revisi : <?php echo $u->revisi_pbb1 == NULL ? '-' : $u->revisi_pbb1 ?><br
                                        Pujian : <?php echo $u->revisi_puji1 == NULL ? '-' : $u->revisi_puji1 ?>
                                    </td>
                                    <td>
                                        Revisi : <?php echo $u->revisi_pbb2 == NULL ? '-' : $u->revisi_pbb2 ?><br>
                                        Pujian : <?php echo $u->revisi_puji2 == NULL ? '-' : $u->revisi_puji2 ?>
                                    </td>
                                    <td>
                                        <?php echo anchor('ujian/lihat/'.$u->id, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">Lihat Data</button>'); ?>
                                        <?php echo anchor('ujian/edit/'.$u->id, '<button type="button" class="btn btn-primary text-center" style="margin-top:10px;width:100%;">Edit Data</button>'); ?>
                                        <a href="<?php echo base_url() ?>ujian/hapus/<?php echo $u->id ?>" class="btn btn-danger text-center" style="margin-top:10px;width:100%;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus Data</a>
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
