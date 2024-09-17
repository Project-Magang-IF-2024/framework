<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Edit Data Laporan</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Laporan</li>
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
				  <div class="card">
                      <div class="card-header">
					  <div class="customize-input float-right">
				  <?php echo anchor('dashboard','<button class="btn btn-secondary">Kembali</button>'); ?>
            </div>
                        <h5>Form Edit Data Laporan</h5>
                      </div>
				   <?php echo form_open_multipart('dashboard/edit', 'role="form" method="post" class="theme-form mega-form"'); 
				   echo form_hidden('id_laporan', $data['id_laporan']);
				  
				   ?>
                    
                      <div class="card-body">
                          
                          <div class="form-group">
                        <label class="control-label col-xs-3" >IPK</label>
                        <div class="col-xs-9">
                           <input type="text" name="ipk" value="<?php echo $data['ipk'] ?>" class="form-control">
                        </div>
						
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-3" >Jenis Dokumen</label>
                        <div class="col-xs-9">
                           <select class="form-control" name="jenis">
								<option><?php echo $data['jenis'] ?></option>
								<option>Rekening</option>
						   </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bukti</label>
                        <div class="col-xs-9">
                           <input type="file" name="uploaddok" class="form-control">
                        </div>
						
                    </div>
						  
						  
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                      </div>
                   
					</form>
					
					 </div>
                  </div>
                </div>
              </div>		                               
</div>
        