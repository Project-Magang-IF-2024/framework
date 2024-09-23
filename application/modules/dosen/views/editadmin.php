<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Edit Data dosen</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">dosen</li>
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
                <?php echo form_open_multipart('dosen/edit', 'role="form" method="post" class="theme-form mega-form"'); 
                echo form_hidden('id', $data['id']); // Updated to match your column name
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Edit Data dosen</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <div class="form-group">
                            <label class="col-form-label">NIK Dosen</label>
                            <input class="form-control" name="nik_dosen" value="<?php echo $data['nik_dosen'] ?>" type="text" placeholder="Isikan NIK Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Dosen</label>
                            <input class="form-control" name="nama_dosen" value="<?php echo $data['nama_dosen'] ?>" type="text" placeholder="Isikan Nama Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gelar Depan</label>
                            <input class="form-control" name="gelar_depan" value="<?php echo $data['gelar_depan'] ?>" type="text" placeholder="Isikan Gelar Depan">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gelar Belakang</label>
                            <input class="form-control" name="gelar_belakang" value="<?php echo $data['gelar_belakang'] ?>" type="text" placeholder="Isikan Gelar Belakang">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No KTP</label>
                            <input class="form-control" name="no_ktp" value="<?php echo $data['no_ktp'] ?>" type="text" placeholder="Isikan No KTP">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIDN Dosen</label>
                            <input class="form-control" name="nidn_dosen" value="<?php echo $data['nidn_dosen'] ?>" type="text" placeholder="Isikan NIDN Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NUPTK Dosen</label>
                            <input class="form-control" name="nuptk_dosen" value="<?php echo $data['nuptk_dosen'] ?>" type="text" placeholder="Isikan NUPTK Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gender Dosen</label>
                            <select class="form-control" name="gender_dosen" value="<?php echo $data['gender_dosen'] ?>">
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?>" type="text" placeholder="Isikan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Lahir</label>
                            <input class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'] ?>" type="date">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Alamat Dosen</label>
                            <input class="form-control" name="alamat_dosen" value="<?php echo $data['alamat_dosen'] ?>" type="text" placeholder="Isikan Alamat Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nomer HP Dosen</label>
                            <input class="form-control" name="no_hp_dosen" value="<?php echo $data['no_hp_dosen'] ?>" type="text" placeholder="Isikan Nomer HP Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email Dosen</label>
                            <input class="form-control" name="email_dosen" value="<?php echo $data['email_dosen'] ?>" type="email" placeholder="Isikan email_dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prodi Homebase</label>
                            <select name="prodi_homebase" class="form-control" value="<?php echo $data['prodi_homebase']?>">
                            <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                                <option value="Teknik Kimia">Teknik Kimia</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Akutansi">Akutansi</option>
                                <option value="Pendidikan Bahasa Inggrisi">Pendidikan Bahasa Inggrisi</option>
                                <option value="Pendidikan Guru Sekolah Dasar">Pendidikan Guru Sekolah Dasar</option>
                                <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah</option>
                                <option value="Pendidikan Islam Anak Usia Dini">Pendidikan Islam Anak Usia Dini</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">jabatan fungsi</label>
                            <select name="jabfung" class="form-control" value="<?php echo $data['jabfung']?>">
                            <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Guru Besar">Guru Besar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pangkat</label>
                            <select class="form-control" name="pangkat" value="<?php echo $data['pangkat']?>">
                            <option value="Penata Muda Tk.I">Penata Muda Tk.I</option>
                                <option value="Penata">Penata </option>
                                <option value="Penata Tk.I">Penata Tk.I</option>
                                <option value="Pembina">Pembina</option>
                                <option value="Pembina Tk.I">Pembina Tk.I</option>
                                <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                                <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                                <option value="pembina Utama">pembina Utama</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Golongan</label>
                            <select class="form-control" name="golongan" value="<?php echo $data[golongan]?>">
                            <option value="III/a">III/a</option>
                                <option value="III/b">III/b</option>
                                <option value="III/c">III/c</option>
                                <option value="III/d">III/d</option>
                                <option value="IV/a">IV/a</option>
                                <option value="IV/b">IV/b</option>
                                <option value="IV/c">IV/c</option>
                                <option value="IV/d">IV/d</option>
                                <option value="IV/e">IV/e</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama perguruan tinggi jenjang s1 dosen</label>
                            <input class="form-control" name="univ_s1" value="<?php echo $data['univ_s1'] ?>" type="text" placeholder="Isikan Nama Perguruan tinggi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama program studi jenjang s1 dosen</label>
                            <input class="form-control" name="prodi_s1" value="<?php echo $data['prodi_s1'] ?>" type="text" placeholder="Isikan Nama Program studi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama perguruan tinggi jenjang s2 dosen</label>
                            <input class="form-control" name="univ_s2" value="<?php echo $data['univ_s2'] ?>" type="text" placeholder="Isikan Nama Perguruan tinggi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama program studi jenjang s2 dosen</label>
                            <input class="form-control" name="prodi_s2" value="<?php echo $data['prodi_s2'] ?>" type="text" placeholder="Isikan Nama Program Studi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama perguruan tinggi jenjang s3 dosen</label>
                            <input class="form-control" name="univ_s3" value="<?php echo $data['univ_s3'] ?>" type="text" placeholder="Isikan Nama Perguruan tinggi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama program studi jenjang s3 dosen</label>
                            <input class="form-control" name="prodi_s3" value="<?php echo $data['prodi_s3'] ?>" type="text" placeholder="Isikan Nama Program studi">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Bidang Keahlian dosen</label>
                            <input class="form-control" name="bidang_keahlian" value="<?php echo $data['bidang_keahlian'] ?>" type="text" placeholder="Isikan bidang keahlihan dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jabatan Dosen</label>
                            <select class="form-control" name="jabatan_dosen" value="<?php echo $data['jabatan_dosen']?>">
                            <option vakue="dekan">Dekan</option>
                                <option value="wakil dekan">Wakil Dekan</option>
                                <option value="kaprodi">Kaprodi</option>
                                <option value="sekprodi">SekProdi</option>
                                <option vakue="dosen tetap">Dosen Tetap</option>
                                <option value="dosen luar biasa">Dosen Luar Biasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username Dosen</label>
                            <input class="form-control" name="username_dosen" value="<?php echo $data['username_dosen'] ?>" type="text" placeholder="Isikan Username Dosen">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">password</label>
                            <input class="form-control" name="password_dosen" value="<?php echo $data['password_dosen'] ?>" type="text" placeholder="Isikan Password Dosen">
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
