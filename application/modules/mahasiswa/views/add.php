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
                <?php echo form_open_multipart('mahasiswa/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <div class="form-group">
                            <label class="col-form-label">NIK Mahasiswa</label>
                            <input class="form-control" name="nik_mhs" type="text" placeholder="Isikan NIK Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nomor Induk Mahasiswa</label>
                            <input class="form-control" name="nim" type="text" placeholder="Isikan NIM" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama</label>
                            <input class="form-control" name="nama_mhs" type="text" placeholder="Isikan Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Alamat</label>
                            <input class="form-control" name="alamat_mhs" type="text" placeholder="Isikan Alamat" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No HP</label>
                            <input class="form-control" name="no_hp_mhs" type="text" placeholder="Isikan No HP" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" name="email_mhs" type="email" placeholder="Isikan Email" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <input class="form-control" name="prodi_mhs" type="text" placeholder="kode prodi" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Angkatan</label>
                            <input class="form-control" name="angkatan" type="text" placeholder="Isikan Angkatan" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input class="form-control" name="username_mhs" type="text" placeholder="Isikan Username" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" name="password_mhs" type="text" placeholder="Isikan Password" required>
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
