<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Input Data Dosen</h3>
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
                <?php echo form_open_multipart('dosen/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data dosen</h5>
                    </div>
                    <div class="card-body">
                        <h6>Identitas Diri</h6>
                        <div class="form-group">
                            <label class="col-form-label">NIK Dosen</label>
                            <input class="form-control" name="nik_dosen" type="text" placeholder="Isikan NIK Dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Dosen</label>
                            <input class="form-control" name="nama_dosen" type="text" placeholder="Isikan Nama Dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gelar Depan</label>
                            <input class="form-control" name="gelar_depan" type="text" placeholder="Isikan Gelar Depan" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gelar Belakang</label>
                            <input class="form-control" name="gelar_belakang" type="text" placeholder="Isikan Gelar Belakang" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No KTP</label>
                            <input class="form-control" name="no_ktp" type="text" placeholder="Isikan No ktp" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIDN Dosen</label>
                            <input class="form-control" name="nidn_dosen" type="text" placeholder="Isikan nidn dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NUPTK Dosen</label>
                            <input class="form-control" name="nuptk_dosen" type="text" placeholder="isikan nuptk_dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Gender Dosen</label>
                            <select class="form-control" name="gender_dosen">
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" type="text" placeholder="Isikan tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Lahir</label>
                            <input class="form-control" name="tanggal_lahir" type="date" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Alamat Dosen</label>
                            <input class="form-control" name="alamat_dosen" type="text" placeholder="Isikan alamat_dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">No Hp Dosen</label>
                            <input class="form-control" name="no_hp_dosen" type="text" placeholder="Isikan no_hp_dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email Dosen</label>
                            <input class="form-control" name="email_dosen" type="email" placeholder="Isikan email_dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prodi Homebase</label>
                            <select name="prodi_homebase" class="form-control" required>
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
                            <select name="jabfung" class="form-control" required>
                                    <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Guru Besar">Guru Besar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pangkat</label>
                            <select class="form-control" name="pangkat" required>
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
                            <select class="form-control" name="golongan" required>
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
                            <label class="col-form-label">Universitas S1</label>
                            <input class="form-control" name="univ_s1" type="text" placeholder="Isikan univ_s1" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Program Studi S1</label>
                            <input class="form-control" name="prodi_s1" type="text" placeholder="Isikan prodi_s1" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Universitas S2</label>
                            <input class="form-control" name="univ_s2" type="text" placeholder="Isikan univ_s2" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Program Studi S2</label>
                            <input class="form-control" name="prodi_s2" type="text" placeholder="Isikan prodi_s2" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Universitas S3</label>
                            <input class="form-control" name="univ_s3" type="text" placeholder="Isikan univ_s3" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Program Studi S3</label>
                            <input class="form-control" name="prodi_s3" type="text" placeholder="Isikan prodi_s3" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Bidang Keahlian</label>
                            <input class="form-control" name="bidang_keahlian" type="text" placeholder="Isikan bidang_keahlian" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jabatan Dosen</label>
                            <select class="form-control" name="jabatan_dosen" required>
                                <option vakue="dekan">Dekan</option>
                                <option value="wakil dekan">Wakil Dekan</option>
                                <option value="kaprodi">Kaprodi</option>
                                <option value="sekprodi">SekProdi</option>
                                <option vakue="dosen tetap">Dosen Tetap</option>
                                <option value="dosen luar biasa">Dosen Luar Biasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input class="form-control" name="username_dosen" type="text" placeholder="Isikan username_dosen" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">PASSWORD</label>
                            <input class="form-control" name="password_dosen" type="text" placeholder="Isikan password_dosen" required>
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
