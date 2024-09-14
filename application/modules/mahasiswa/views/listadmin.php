<script type="text/javascript">

$(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'copy', 'excel', 'pdf', 'csv'
        ]
    } );
} );
</script>
<div class="page-breadcrumb" style="margin-top:120px; margin-right:20px">
                <div class="row">
                    <div class="col-7 align-self-center">
                        
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
				<?php echo anchor('mahasiswa/add/','<button class="btn waves-effect waves-light btn-rounded btn-success text-center">Tambah Data</button>'); ?>		
				<button class="btn waves-effect waves-light btn-rounded btn-primary text-center" data-toggle="modal" data-target="#ModalaAdd">Import Data</button>
			</div>
				
			</div>
                </div>
            </div>
			
			
              
<div class="container-fluid" style="margin-top:40px">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
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
						<th>SEMESTER</th>
						<th>IPK</th>
						<th>ANGKATAN</th>
						<th>KODE PRODI</th>
						<th>NAMA PRODI</th>
						<th>NO KARTU KELUARGA</th>
						<th>NIK ORANG TUA/WALI</th>
						<th>NAMA ORANG TUA/WALI</th>
						<th>ALAMAT</th>
						<th>KABUPATEN</th>
						<th>NOMOR HP</th>
						<th>BANK</th>
						<th>NAMA REKENING</th>
						<th>NOMOR REKENING</th>
						<th>JENIS</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th></th>
                    </tr>
                </thead>
		<tbody>		
		<?php 
		$no = 1;
	
		foreach($data as $u){ 
		?>
		<tr>  
			<td><?php echo $no ?></td>
			<td><?php echo $u->nim ?></td>
			<td><?php echo $u->nik ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->semester ?></td>
			<?php $laporan = $this->db->from('laporan')->where('id_mahasiswa', $u->id_mahasiswa)->get()->row_array();
					$ceklaporan = $this->db->from('laporan')->where('id_mahasiswa', $u->id_mahasiswa)->get()->num_rows();
			if($ceklaporan==null){
			?>
			<td><?php echo $u->ipk ?></td>
			<?php } else { ?>
			<td><?php echo $laporan['ipk'] ?></td>
			<?php } ?>
			<td><?php echo $u->angkatan ?></td>
			<td><?php echo $u->kodeprodi ?></td>
			<td><?php echo $u->namaprodi ?></td>
			<td><?php echo $u->nokk ?></td>
			<td><?php echo $u->nikortu ?></td>
			<td><?php echo $u->namaortu ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->kabupaten ?></td>
			<td><?php echo $u->nohp ?></td>
			<td><?php echo $u->bank ?></td>
			<td><?php echo $u->namarekening ?></td>
			<td><?php echo $u->norekening ?></td>
			<td><?php echo $u->jenis ?></td>
			<td><?php echo $u->username ?></td>
			<td><?php echo $u->password ?></td>
			<td>
			<?php echo anchor('mahasiswa/lihat/'.$u->id_mahasiswa,'<button type="button" class="btn btn-success text-center" style="margin-top:10px;width:100%;">Lihat Data</button>'); ?>
			<?php echo anchor('mahasiswa/history/'.$u->id_mahasiswa,'<button type="button" class="btn btn-warning text-center" style="margin-top:10px;width:100%;">History Laporan</button>'); ?>			
			<?php echo anchor('mahasiswa/edit/'.$u->id_mahasiswa,'<button type="button" class="btn btn-primary text-center" style="margin-top:10px;width:100%;">Edit Data</button>'); ?> <a href="<?php echo base_url() ?>mahasiswa/hapus/<?php echo $u->id_mahasiswa ?>" class="btn btn-danger text-center" style="margin-top:10px;width:100%;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus Data</a>
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
            <?php
            echo form_open_multipart('import/importx', 'role="form" class="form-horizontal"');
            ?>
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >File</label>
                        <div class="col-xs-9">
                           <input type="file" name="fileimport">
                        </div>
						</br>
						<label class="control-label col-xs-3" >Unduh Template Import Dapat diunduh pada <a href="<?php echo base_url() ?>template/TemplateMahasiswa.xlsx"> link</a> berikut.</label>
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
