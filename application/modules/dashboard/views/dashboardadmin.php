<div class="container-fluid">
	<div class="page-title">
        <div class="row">
            <div class="col-6">
				<h3>Dashboard</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
			
<div class="container-fluid">
<div class="row">
	<div class="col-xl-6 xl-50 chart_data_right box-col-6"> 
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body right-chart-content"> 
						<h4><?php echo $this->db->from('user')->get()->num_rows(); ?></h4><span>Total Mahasiswa Terdaftar</span>
                    </div>
				</div>
			</div>
        </div>
    </div>
    
		
</div>
</div>