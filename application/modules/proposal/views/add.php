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
                <?php echo form_open_multipart('proposal/add', 'role="form" method="post" class="theme-form mega-form"'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Input Data Proposal</h5>
                    </div>
                    <div class="card-body">
                        <!-- <h6>Identitas Proposal</h6> -->
                        <div class="form-group">
                            <label class="col-form-label">Judul Proposal</label>
                            <input class="form-control" name="judul_proposal" type="text" placeholder="Isi Judul Proposal" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Periode Proposal</label>
                            <select class="form-control" name="periode_prop" type="text" placeholder="Isi Periode Proposal" required>
                                <option value="">Pilih Periode Proposal</option>
                                <?php foreach ($periode_list as $periode) : ?>
                                    <option value="<?php echo $periode['kode_thn_akad']; ?>"><?php echo $periode['nama_thn_akad']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Prodi Mahasiswa</label>
                            <select class="form-control" name="prodi_prop" type="text" placeholder="Isi Prodi Mahasiswa" required>
                                <option value="">Pilih Prodi Mahasiswa</option>
                                <?php foreach ($prodi_list as $prodi) : ?>
                                    <option value="<?php echo $prodi['kode_prodi']; ?>"><?php echo $prodi['nama_prodi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">NIM Mahasiswa</label>
                            <input class="form-control" name="nim_prop" type="text" placeholder="Isi NIM Mahasiswa" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pembimbing 1</label>
                            <select class="form-control" name="nik_pembimbing1" required>
                                <option value="">Pilih Pembimbing 1</option>
                                <?php foreach ($pembimbing_list1 as $dosen) : ?>
                                    <option value="<?php echo $dosen['nik_dosen']; ?>"><?php echo $dosen['nama_dosen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Pembimbing 2</label>
                            <select class="form-control" name="nik_pembimbing2" required>
                                <option value="">Pilih Pembimbing 2</option>
                                <?php foreach ($pembimbing_list2 as $dosen) : ?>
                                    <option value="<?php echo $dosen['nik_dosen']; ?>"><?php echo $dosen['nama_dosen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kaprodi</label>
                            <input class="form-control" name="nik_kaprodi" type="text" placeholder="Isi NIK Kaprodi" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="acc_kaprodi" type="hidden" value="0" placeholder="Isi Acc Kaprodi" required>
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
