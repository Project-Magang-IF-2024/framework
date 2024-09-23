<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Input Data Mahasiswa</h3>
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
                <?php echo form_open_multipart('statusmahasiswa/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data Status Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <!-- <h6>Identitas Proposal</h6> -->
                        <div class="form-group">
                            <label class="col-form-label">NIM Mahasiswa</label>
                            <input class="form-control" name="nim" type="text" placeholder="Isi NIM Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Keaktifan</label>
                            <input class="form-control" name="status_keaktifan" type="text" placeholder="Isi NIK Kaprodi" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Keaktifkan</label>
                            <input class="form-control" name="periode_keaktifan" type="text" placeholder="Isi NIK Kaprodi" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Beasiswa</label>
                            <input class="form-control" name="status_beasiswa" type="text" placeholder="Isi NIK Kaprodi" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Beasiswa</label>
                            <input class="form-control" name="periode_beasiswa" type="text" placeholder="Isi NIK Kaprodi" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
