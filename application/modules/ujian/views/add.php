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
                <?php echo form_open_multipart('ujian/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data Ujian Proposal</h5>
                    </div>
                    <div class="card-body">
                        <!-- <h6>Identitas Proposal</h6> -->
                        <div class="form-group">
                            <label class="col-form-label">Judul Proposal</label>
                            <input class="form-control" name="judulnya_proposal" type="text" placeholder="Isi Judul Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Ujian Proposal</label>
                            <select class="form-control" name="periode_ujian_proposal" type="text" placeholder="Isi Periode Ujian Proposal" required>
                                <option value="">Pilih Periode Ujian Proposal</option>
                                <?php foreach ($periode_list as $periode) : ?>
                                    <option value="<?php echo $periode['id']; ?>"><?php echo $periode['nama_thn_akad']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Ujian Proposal</label>
                            <input class="form-control" name="kode_ujian_prop" type="text" placeholder="Isi Kode Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kode Proposal</label>
                            <input class="form-control" name="kd_proposal" type="text" placeholder="Isi Kode Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIM Ujian Proposal</label>
                            <input class="form-control" name="nim_ujian_proposal" type="text" placeholder="Isi NIM Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_ujian_proposal">Tanggal Ujian Proposal</label>
                            <input class="form-control" name="tgl_ujian_proposal" type="date" placeholder="Isi Tanggal Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Hari Ujian Proposal</label>
                            <select class="form-control" name="hari_ujian_proposal" required>
                                <option value="">Pilih Hari Ujian Proposal</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jam Ujian Proposal</label>
                            <input class="form-control" name="jam_ujian_proposal" type="text" placeholder="Isi Jam Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label for="ruang_ujian_proposal">Ruang Ujian Proposal</label>
                            <input class="form-control" name="ruang_ujian_proposal" type="text" placeholder="Isi Ruang Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">TTD Hadir Mahasiswa</label>
                            <select class="form-control" name="ttd_hadir_mahasiswa" type="text" placeholder="Isi TTD Hadir Mahasiswa" required>
                                <option value="">Pilih TTD Hadir Mahasiswa</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK PBB1 Ujian Proposal</label>
                            <input class="form-control" name="nik_pbb1_ujian_proposal" type="text" placeholder="Isi NIK PBB1 Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIK PBB2 Ujian Proposal</label>
                            <input class="form-control" name="nik_pbb2_ujian_proposal" type="text" placeholder="Isi NIK PBB2 Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Revisi PBB1 Ujian Proposal</label>
                            <input class="form-control" name="revisi_pbb1" type="text" placeholder="Isi Revisi PBB1 Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Revisi PBB2 Ujian Proposal</label>
                            <input class="form-control" name="revisi_pbb2" type="text" placeholder="Isi Revisi PBB2 Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pujian PBB1 Ujian Proposal</label>
                            <input class="form-control" name="revisi_puji1" type="text" placeholder="Isi Pujian PBB1 Ujian Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pujian PBB2 Ujian Proposal</label>
                            <input class="form-control" name="revisi_puji2" type="text" placeholder="Isi Pujian PBB2 Ujian Proposal" required>
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
