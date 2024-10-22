<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Input Data Fakultas</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Dosen</li>
                    <li class="breadcrumb-item">Input Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-sm-12">
            <?php echo form_open('fakultas/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
<div class="card">
    <div class="card-header">
        <h5>Form Input Data Fakultas</h5>
    </div>
    <div class="card-body">
        <h6>Fakultas</h6>
        <div class="form-group">
            <label class="col-form-label">Kode Fakultas</label>
            <input class="form-control" name="kode_fakultas" type="text" placeholder="Isikan Kode Fakultas" required>
        </div>
        <div class="form-group">
            <label class="col-form-label">ID</label>
            <input class="form-control" name="id" type="text" placeholder="Isikan ID" required>
        </div>
        <div class="form-group">
            <label class="col-form-label">Nama Fakultas</label>
            <input class="form-control" name="nama_fakultas" type="text" placeholder="Isikan Nama Fakultas" required>
        </div>
        <div class="form-group">
            <label class="col-form-label">Singkatan Fakultas</label>
            <input class="form-control" name="singkatan_fak" type="text" placeholder="Isikan Singkatan Fakultas" required>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
    </div>
</div>
<?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>