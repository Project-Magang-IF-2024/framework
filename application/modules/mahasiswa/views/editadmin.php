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
        <div class="row">
            <div class="col-sm-12">
                <?php echo form_open_multipart('mahasiswa/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <div class="form-group">
                            <label class="col-form-label">Nomor Induk Mahasiswa</label>
                            <input class="form-control" name="nim" value="<?php echo $data['nim'] ?>" type="text" placeholder="Isikan NIM">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama</label>
                            <input class="form-control" name="nama" value="<?php echo $data['nama_mhs'] ?>" type="text" placeholder="Isikan Nama">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK Mahasiswa</label>
                            <input class="form-control" name="nik" value="<?php echo $data['nik_mhs'] ?>" type="text" placeholder="Isikan NIK Mahasiswa">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gender</label>
                            <input class="form-control" name="gender" value="<?php echo $data['gender_mhs'] ?>" type="text" placeholder="Isikan Gender">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir_mhs'] ?>" type="text" placeholder="Isikan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Lahir</label>
                            <input class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir_mhs'] ?>" type="date">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Alamat</label>
                            <input class="form-control" name="alamat" value="<?php echo $data['alamat_mhs'] ?>" type="text" placeholder="Isikan Alamat">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nomor HP</label>
                            <input class="form-control" name="no_hp" value="<?php echo $data['no_hp_mhs'] ?>" type="text" placeholder="Isikan Nomor HP">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" name="email" value="<?php echo $data['email_mhs'] ?>" type="email" placeholder="Isikan Email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Prodi</label>
                            <input class="form-control" name="kodeprodi" value="<?php echo $data['prodi_mhs'] ?>" type="text" placeholder="Isikan Kode Prodi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Angkatan</label>
                            <input class="form-control" name="angkatan" value="<?php echo $data['angkatan'] ?>" type="text" placeholder="Isikan Angkatan">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input class="form-control" name="username" value="<?php echo $data['username_mhs'] ?>" type="text" placeholder="Isikan Username">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" name="password" value="<?php echo $data['password_mhs'] ?>" type="password" placeholder="Isikan Password">
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
