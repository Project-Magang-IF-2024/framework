<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data Fakultas</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Fakultas</li>
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
                <?php echo form_open_multipart('fakultas/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']);
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Fakultas</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Fakultas</h6>
                        <div class="form-group">
                            <label class="col-form-label">Nama Fakultas</label>
                            <input class="form-control" name="nama_fakultas" value="<?php echo $data['nama_fakultas'] ?>" type="text" placeholder="Isikan Nama Fakultas">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Singkatan Fakultas</label>
                            <input class="form-control" name="singkatan_fak" value="<?php echo $data['singkatan_fak'] ?>" type="text" placeholder="Isikan Singkatan Fakultas">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php echo anchor('fakultas', '<button type="button" class="btn btn-danger text-center">Kembali</button>'); ?>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
