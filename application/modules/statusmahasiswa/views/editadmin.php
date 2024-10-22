<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Mahasiswa</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Mahasiswa</li>
                    <li class="breadcrumb-item">Edit Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-sm-12 col-xl-12">
        <div class="ro
            <div class="col-sm-12">
                <?php echo form_open_multipart('statusmahasiswa/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Status Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <h6>Status Mahasiswa</h6>
                        <div class="form-group">
                            <label class="col-form-label">NIM</label>
                            <input class="form-control" name="nim" value="<?php echo $data['nim'] ?>" type="text" placeholder="isi periode proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Keaktifan</label>
                            <input class="form-control" name="status_keaktifan" value="<?php echo $data['status_keaktifan'] ?>" type="text" placeholder="Isikan prodi proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Keaktifan</label>
                            <input class="form-control" name="periode_keaktifan" value="<?php echo $data['periode_keaktifan'] ?>" type="text" placeholder="Isikan NIM Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Beasiswa</label>
                            <input class="form-control" name="status_beasiswa" value="<?php echo $data['status_beasiswa'] ?>" type="text" placeholder="Isikan Kode Proposal">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Beasiswa</label>
                            <input class="form-control" name="periode_beasiswa" value="<?php echo $data['periode_beasiswa'] ?>" type="text" placeholder="Isikan Tempat Lahir">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('mahasiswa', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
