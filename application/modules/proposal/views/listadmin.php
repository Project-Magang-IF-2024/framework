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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mengambil data dari PHP ke JavaScript
        var proposals = <?php echo json_encode($data); ?>;
        var categories = proposals.map(function(u) { return u.judul_proposal;});
        var seriesData = proposals.map(function(u) {return u.acc_kaprodi == 1 ? 1 : 0;});

        var options = {
            chart: {
                type: 'area',
                height: 350
            },
            series: [{
                name: 'Status',
                data: seriesData
            }],
            xaxis: {
                categories: categories
            }
        };

        var chart = new ApexCharts(document.querySelector("#area-spaline"), options);
        chart.render();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const proposals = <?php echo json_encode($data); ?>;

        // Hitung jumlah yang disetujui dan tidak disetujui
        const approvedCount = proposals.filter(u => u.acc_kaprodi == 1).length;
        const rejectedCount = proposals.filter(u => u.acc_kaprodi == 0).length;

        new ApexCharts(document.querySelector("#piechart"), {
            chart: { type: 'pie' },
            series: [approvedCount, rejectedCount],
            labels: ['Disetujui', 'Tidak Disetujui']
        }).render();
    });
</script>




<div class="page-breadcrumb" style="margin-top:120px; margin-right:20px">
    <div class="row">
        <div class="col-7 align-self-center"></div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <?php echo anchor('proposal/add/', '<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>        
                <button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Import Data</button>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header">
                    <h3>Area Spaline Chart </h3>
                  </div>
                  <div class="card-body">
                    <div id="area-spaline">TEST</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header">
                    <h3>Pie Chart </h3>
                  </div>
                  <div class="card-body apex-chart">
                    <div id="piechart"></div>
                  </div>
                </div>
              </div>

<div class="container-fluid" style="margin-top:40px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Proposal</h4>
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Judul Proposal</th>
                                    <th>Periode Proposal</th>
                                    <th>Prodi Proposal</th>
                                    <th>NIM Mahasiswa</th>
                                    <th>Kode Proposal</th>
                                    <th>NIK Pembimbing 1</th>
                                    <th>NIK Pembimbing 2</th>
                                    <th>NIK Kaprodi</th>
                                    <th>Status Persetujuan</th>
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
                                    <td><?php echo $u->judul_proposal ?></td>
                                    <td><?php echo $u->periode_prop ?></td>
                                    <td><?php echo $u->prodi_prop ?></td>
                                    <td><?php echo $u->nim_prop ?></td>
                                    <td><?php echo $u->kode_prop ?></td>
                                    <td><?php echo $u->nik_pembimbing1 ?></td>
                                    <td><?php echo $u->nik_pembimbing2 ?></td>
                                    <td><?php echo $u->nik_kaprodi ?></td>
                                    <td><?php echo $u->acc_kaprodi == 1 ? 'Disetujui' : 'Tidak Disetujui' ?></td>
                                    <td>
                                        <?php echo anchor('proposal/lihat/'.$u->id, '<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">Lihat Data</button>'); ?>
                                        <?php echo anchor('proposal/edit/'.$u->id, '<button type="button" class="btn btn-primary text-center" style="margin-top:10px;width:100%;">Edit Data</button>'); ?>
                                        <a href="<?php echo base_url() ?>proposal/hapus/<?php echo $u->id ?>" class="btn btn-danger text-center" style="margin-top:10px;width:100%;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus Data</a>
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